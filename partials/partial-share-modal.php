<?php if (is_singular('case-studies')) { ?>
   <?php $featBg = get_field('featured_full_width'); ?>
<?php } else { ?>
   <?php $featBg = get_field('hero_background_image'); ?>
<?php } ?>

<div class="modal" style="background-image: url(<?php echo $featBg; ?>);">
   <div class="modal-overlay"></div>
   <a href="#" class="close-share-modal close-btn modal-toggle">
      <i class="close-icon"></i>
   </a>
   <div class="share-modal modal-wrapper modal-transition vAlign">
      <h3>Share</h3>
      <h1><?php the_title(); ?></h1>
      <ul class="social-links">
         <li class="addthis-link">
            <a target="_blank" href="http://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=<?php the_permalink(); ?>" rel="nofollow" class="btn btn--uline">Facebook</a>
         </li>
         <li class="addthis-link">
            <a target="_blank" href="http://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=<?php the_permalink(); ?>" rel="nofollow" class="btn btn--uline">Twitter</a>
         </li>
         <li class="addthis-link">
            <a target="_blank" href="http://api.addthis.com/oexchange/0.8/forward/pinterest_share/offer?url=<?php the_permalink(); ?>" rel="nofollow" class="btn btn--uline">Pinterest</a>
         </li>
         <li class="addthis-link">
            <a href="mailto:?subject=Look at this website&body=Hi, I found this article and thought you might like it: <?php the_permalink(); ?>" class="btn btn--uline">Email</a>
         </li>
      </ul>
   </div>
</div>