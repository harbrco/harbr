<!-- loop through posts - exclude latest post, cause it's the hero/featured post -->
<?php $wp_query = new WP_Query( 'posts_per_page=10&offset=1' ); ?>

<?php if ( $wp_query->have_posts() ) : ?>

   <?php $categories = get_categories();
   foreach($categories as $category) {
      if (in_category( 'industry' )) { $catClass = 'isIndustry'; }
      if (in_category( 'wallpapers' )) { $catClass = 'isWallpapers'; }
      if (in_category( 'internal' )) { $catClass = 'isInternal'; }
      if (in_category( 'lifestyle' )) { $catClass = 'isLifestyle'; }
   } ?>

   <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('section group'); ?>>
         <div class="col span_8_of_12">
            <div class="post-main hoverZoomFade card card--sq">
               <div class="background-image" style="background-image: url(<?php the_field('feature_image') ?>);">
               </div>
               <div class="inner vAlign vAlign-abs">
                  <h3 class="clrPop"><?php the_category(); ?></h3>

                  <a href="<?php the_permalink(); ?>" class="post-title">
                     <h2><?php the_title(); ?></h2>
                  </a>

                  <div class="post-meta">
                     <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span> &nbsp;<span class="clrPop">•</span>&nbsp; <span class="date"><?php the_time('F jS'); ?></span>
                  </div>
               </div>
            </div>
         </div>

         <div class="col span_4_of_12">
            <div class="two-squares section group">
               <div class="text-square isSecondary col span_6_of_12">
                  <div class="inner vAlign vAlign-abs">
                     <?php if (in_category( 'industry' )) { ?>
                        <p class="pull-quote">“<?php the_field('pull_quote'); ?>”</p>
                     <?php } elseif (in_category( 'wallpapers' )) { ?>
                        <p class="design-by">Design By:</p>
                        <p class="designer-info"><?php the_field('wallpaper_designer_name'); ?>, <?php the_field('wallpaper_designer_company'); ?></p>
                     <?php } ?>
                  </div>
               </div>
               <div class="image-square col span_6_of_12" style="background-image: url(<?php the_field('small_image'); ?>);">
               </div>
            </div>
         </div>

      </article>

   <?php endwhile; ?>

   <?php get_template_part('pagination'); ?>

   <?php wp_reset_postdata(); ?>

<?php else : ?>

   <article>
      <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
   </article>

<?php endif; ?>