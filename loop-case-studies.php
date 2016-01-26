<!-- Convert HEX to RGB -->
<?php
   function hex2rgb($hex) {
      $hex = str_replace("#", "", $hex);

      if(strlen($hex) == 3) {
         $r = hexdec(substr($hex,0,1).substr($hex,0,1));
         $g = hexdec(substr($hex,1,1).substr($hex,1,1));
         $b = hexdec(substr($hex,2,1).substr($hex,2,1));
      } else {
         $r = hexdec(substr($hex,0,2));
         $g = hexdec(substr($hex,2,2));
         $b = hexdec(substr($hex,4,2));
      }
      $rgb = array($r, $g, $b);
      return implode(",", $rgb); // returns the rgb values separated by commas
      //return $rgb; // returns an array with the rgb values
   }

   $rgb = hex2rgb($brandColor);
?>

<?php
$args = array(
   'post_type' => 'case-studies'
);
$caseStudiesQuery = new WP_Query( $args ); ?>
<?php if ( $caseStudiesQuery->have_posts() ) : ?>
   <!-- the loop -->
   <?php while ( $caseStudiesQuery->have_posts() ) : $caseStudiesQuery->the_post(); ?>

      <?php $brandColor = get_field('brand_color'); ?>

      <?php
         global $post;
         $post_slug=$post->post_name;
      ?>

      <article class="section post-hero hero view-post-cta big-cta isDarkGray <?php echo $post_slug; ?>" style="background-color: #<?php echo $brandColor; ?>;">
         <div class="section-heading">
            <h3 class="clrPop">Case Study</h3>
            <span class="divWave"></span>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <a href="<?php the_permalink(); ?>" class="btn btn--uline">View Case Study</a>
         </div>

         <div class="hero-highlight-image" style="background-image: url(<?php the_field('hero_highlight_image') ?>);">
         </div>

         <!-- Scroll Down Button -->
         <a href="#" class="downArrow next-post-section"></a>
      </article>

   <?php endwhile; ?>
   <!-- end of the loop -->

   <?php get_template_part('pagination'); ?>

   <?php wp_reset_postdata(); ?>

<?php else: ?>
<?php endif; ?>