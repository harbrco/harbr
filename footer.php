   <?php if(!is_page('home')) { ?>
      <!-- footer -->
      <!-- <footer class="footer" role="contentinfo">

         <div class="footer-social">
            <ul>
               <li class="fb"><a href="#">Fb</a></li>
               <li class="twt"><a href="#">Twt</a></li>
               <li class="gplus"><a href="#">G+</a></li>
            </ul>
         </div>

         <div class="footer-copyright">
            <p class="copyright">&copy; <?php //echo date('Y'); ?> <?php //bloginfo('name'); ?> - All rights reserved</p>
         </div>

      </footer> -->
      <!-- /footer -->
   <?php } ?>

   <div class="fancy-positioner">
      <div id="fancyWrap" class="">
         <a href="javascript:parent.$.fancybox.close();" class="close-share-modal close-btn modal-toggle">
            <i class="close-icon"></i>
         </a>
      </div>
   </div>

      <?php wp_footer(); ?>

      <!-- analytics -->
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-44833211-1', 'harbr.co');
        ga('send', 'pageview');
      </script>

   </body>
</html>
