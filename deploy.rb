#!/usr/bin/env ruby

require 'bundler/inline'

gemfile true do
  source 'https://rubygems.org'
  gem 'sshkit'
end

require 'sshkit'
require 'sshkit/dsl'

YAML.load(File.read("./circle.yml"))['machine']['environment'].each {|k,v| ENV[k] = v } if ENV['LOCAL_ENV']

deploy_host = "harbrdev@harbrdev.net:2222"
home_path   = "/home/harbrdev"

ssh_git_path = File.join(home_path, "ssh-git.sh")
ssh_pkey_path = File.join(home_path, ".ssh/harbrdev_deploy_rsa.pub")

www_path  = "public_html"
subdomain = ENV.fetch('SUBDOMAIN')
theme_path = ENV.fetch('THEME_PATH')

github_user     = "harbrco"
github_remote   = "origin"

github_project  = ENV.fetch('GITHUB_PROJECT')
github_branch   = ENV.fetch('GITHUB_BRANCH')

githup_repo_url = "git@github.com:#{github_user}/#{github_project}.git"

deploy_path = File.join(home_path, www_path, subdomain, theme_path)

on [deploy_host] do |host|
  error("'#{ssh_git_path}' does not exist.")  && exit(1) unless test("[ -f #{ssh_git_path} ]")
  error("'#{ssh_pkey_path}' does not exist.") && exit(1) unless test("[ -f #{ssh_pkey_path} ]")

  with git_ssh: ssh_git_path, pkey: ssh_pkey_path do
    execute :mkdir, "-p #{deploy_path}"
    within deploy_path do

      if test("[ -z $(ls -A #{deploy_path}) ]") # deploy_path is empty
        execute :git, "clone #{githup_repo_url} ."
      else
        if test("[ -d #{deploy_path}/.git ]") # deploy_path/.git directory exists
          # no-op the deploy_path has already been cloned.
        else
          error "The path '#{deploy_path}' is not empty and is not under git source control."
          exit 1
        end
      end

      execute :git, "fetch --prune"
      execute :git, "checkout #{github_remote}/#{github_branch}"
      execute :git, "reset --hard #{github_remote}/#{github_branch}"

      info "Finished deployment:"
      info capture(:git, 'log -1')
    end
  end
end