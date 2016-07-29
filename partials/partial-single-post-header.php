<?php if (is_singular('case-studies')) { ?>

   <div class="post-header-wrapper wrapper">
      <header class="post-header header container" role="banner">
         <a href="#" class="share-btn modal-toggle">
            <i class="share-icon"></i>
         </a>

         <a href="/case-studies/" class="close-post close-btn">
            <i class="close-icon"></i>
         </a>
      </header>
   </div>

<?php } else { ?>

   <div class="post-header-wrapper wrapper">
      <header class="post-header header container" role="banner">
         <a href="#" class="share-btn modal-toggle">
            <i class="share-icon"></i>
         </a>

         <a href="/explore/" class="close-post close-btn">
            <i class="close-icon"></i>
         </a>
      </header>
   </div>

<?php } ?>