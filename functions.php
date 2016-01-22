<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
   External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
   Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
   $content_width = 900;
}

if (function_exists('add_theme_support'))
{
   // Add Menu Support
   add_theme_support('menus');

   // Add Thumbnail Theme Support
   add_theme_support('post-thumbnails');
   add_image_size('large', 700, '', true); // Large Thumbnail
   add_image_size('medium', 250, '', true); // Medium Thumbnail
   add_image_size('small', 120, '', true); // Small Thumbnail
   add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

   // Enables post and comment RSS feed links to head
   add_theme_support('automatic-feed-links');

   // Localisation Support
   load_theme_textdomain('html5blank', get_template_directory() . '/languages');

   // Add WooCommerce Support
   add_theme_support('woocommerce');
}

/*------------------------------------*\
   Functions
\*------------------------------------*/


// Gravity Forms - custom AJAX loading spinner
add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );
/**
 * Changes the default Gravity Forms AJAX spinner.
 *
 * @since 1.0.0
 *
 * @param string $src  The default spinner URL.
 * @return string $src The new spinner URL.
 */
function tgm_io_custom_gforms_spinner( $src ) {
   return get_template_directory_uri() . '/img/icons/loading.gif';
}


// HTML5 Blank navigation
function html5blank_nav()
{
   wp_nav_menu(
   array(
      'theme_location'  => 'header-menu',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
      )
   );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
   if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', get_template_directory_uri() . "/js/libs/jquery.js", array(), '2.1.3');
      wp_enqueue_script('jquery');
      wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/min/scripts-min.js', array(), '1.0.0', false); // Custom scripts - "true" loads scripts in footer
      wp_enqueue_script('html5blankscripts'); // Enqueue it!
   }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
   if (is_page('pagenamehere')) {
      wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array(), '1.0.0'); // Conditional script(s)
      wp_enqueue_script('scriptname'); // Enqueue it!
   }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
   wp_register_style('html5blank', get_template_directory_uri() . '/css/site.css', array(), '1.0', 'all');
   wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
   register_nav_menus(array( // Using array to specify more menus if needed
      'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
      'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
      'blog-cat-menu' => __('Blog Category Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
   ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
   $args['container'] = false;
   return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
   return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
   return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
   global $post;
   if (is_page()) {
      $classes[] = sanitize_html_class($post->post_name);
   } elseif (is_singular()) {
      $classes[] = sanitize_html_class($post->post_name);
   }

   return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
   // Define Sidebar Widget Area 1
   register_sidebar(array(
      'name' => __('Widget Area 1', 'html5blank'),
      'description' => __('Description for this widget-area...', 'html5blank'),
      'id' => 'widget-area-1',
      'before_widget' => '<div id="%1$s" class="%2$s widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
   ));

   // Define Sidebar Widget Area 2
   register_sidebar(array(
      'name' => __('Widget Area 2', 'html5blank'),
      'description' => __('Description for this widget-area...', 'html5blank'),
      'id' => 'widget-area-2',
      'before_widget' => '<div id="%1$s" class="%2$s widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
   ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
   global $wp_widget_factory;
   remove_action('wp_head', array(
      $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
      'recent_comments_style'
   ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
   global $wp_query;
   $big = 999999999;
   echo paginate_links(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages,
      'prev_text' => 'Newer Posts',
      'next_text' => 'Older Posts'
   ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
   return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
   return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
   global $post;
   if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
   }
   if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
   }
   $output = get_the_excerpt();
   $output = apply_filters('wptexturize', $output);
   $output = apply_filters('convert_chars', $output);
   $output = '<p>' . $output . '</p>';
   echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
   global $post;
   return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
   return false;
}

// Shorten Post Titles in blog feed
function ShortenText($text) { // Function name ShortenText
  $chars_limit = 30; // Character length
  $chars_text = strlen($text);
  $text = $text." ";
  $text = substr($text,0,$chars_limit);
  $text = substr($text,0,strrpos($text,' '));

  if ($chars_text > $chars_limit)
    { $text = $text."..."; } // Ellipsis
    return $text;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
   return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
   $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
   return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
   $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
   $avatar_defaults[$myavatar] = "Custom Gravatar";
   return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
   if (!is_admin()) {
      if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
         wp_enqueue_script('comment-reply');
      }
   }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
   $GLOBALS['comment'] = $comment;
   extract($args, EXTR_SKIP);

   if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
   } else {
      $tag = 'li';
      $add_below = 'div-comment';
   }
?>
   <!-- heads up: starting < for the html tag (li or div) in the next line: -->
   <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
   <?php if ( 'div' != $args['style'] ) : ?>
   <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
   <?php endif; ?>
   <div class="comment-author vcard">
   <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
   <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
   </div>
<?php if ($comment->comment_approved == '0') : ?>
   <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
   <br />
<?php endif; ?>

   <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
      <?php
         printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
      ?>
   </div>

   <?php comment_text() ?>

   <div class="reply">
   <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   </div>
   <?php if ( 'div' != $args['style'] ) : ?>
   </div>
   <?php endif; ?>
<?php }

/*------------------------------------*\
   Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_case_studies'); // Add our Case Studies Custom Post Type
add_action('init', 'create_post_type_project_proposals'); // Add our Project Proposals Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
   Custom Post Types
\*------------------------------------*/

// Create Case Studies Post Type
function create_post_type_case_studies() {
   register_taxonomy_for_object_type('category', 'case-studies'); // Register Taxonomies for Category
   register_taxonomy_for_object_type('post_tag', 'case-studies');
   register_post_type('case-studies', // Register Custom Post Type
   array(
      'labels' => array(
         'name' => __('Case Studies', 'caseStudies'), // Rename these to suit
         'singular_name' => __('Case Study', 'caseStudies'),
         'add_new' => __('Add New', 'caseStudies'),
         'add_new_item' => __('Add New Case Study', 'caseStudies'),
         'edit' => __('Edit', 'caseStudies'),
         'edit_item' => __('Edit Case Study', 'caseStudies'),
         'new_item' => __('New Case Study', 'caseStudies'),
         'view' => __('View Case Studies', 'caseStudies'),
         'view_item' => __('View Case Study', 'caseStudies'),
         'search_items' => __('Search Case Studies', 'caseStudies'),
         'not_found' => __('No Case Studies found', 'caseStudies'),
         'not_found_in_trash' => __('No Case Studies found in Trash', 'caseStudies')
      ),
      'public' => true,
      'hierarchical' => false, // If true, allows your posts to behave like Hierarchy Pages
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => array(
         'title',
         'editor',
         'excerpt',
         'thumbnail'
      ), // Go to Dashboard Custom HTML5 Blank post for supports
      'can_export' => true, // Allows export in Tools > Export
      'taxonomies' => array(
         //'category'
      ) // Add Category and Post Tags support
   ));
}
function case_study_taxonomy() {
   register_taxonomy(
      'case_study_type',
      'case-studies',
      array(
         'hierarchical' => true,
         'label' => 'Case Study Type',
         'query_var' => true
      )
   );
}
add_action( 'init', 'case_study_taxonomy' );


// Create Project Proposals Post Type
function create_post_type_project_proposals() {
   register_taxonomy_for_object_type('category', 'project-proposals'); // Register Taxonomies for Category
   register_taxonomy_for_object_type('post_tag', 'project-proposals');
   register_post_type('project-proposals', // Register Custom Post Type
   array(
      'labels' => array(
         'name' => __('Project Proposals', 'projectProposals'), // Rename these to suit
         'singular_name' => __('Project Proposal', 'projectProposals'),
         'add_new' => __('Add New', 'projectProposals'),
         'add_new_item' => __('Add New Project Proposal', 'projectProposals'),
         'edit' => __('Edit', 'projectProposals'),
         'edit_item' => __('Edit Project Proposal', 'projectProposals'),
         'new_item' => __('New Project Proposal', 'projectProposals'),
         'view' => __('View Project Proposals', 'projectProposals'),
         'view_item' => __('View Project Proposal', 'projectProposals'),
         'search_items' => __('Search Project Proposals', 'projectProposals'),
         'not_found' => __('No Project Proposals found', 'projectProposals'),
         'not_found_in_trash' => __('No Project Proposals found in Trash', 'projectProposals')
      ),
      'public' => true,
      'hierarchical' => false, // If true, allows your posts to behave like Hierarchy Pages
      'has_archive' => true,
      'menu_position' => 5,
      'menu_icon' => '',
      'supports' => array(
         'title',
         'editor',
         'excerpt',
         'thumbnail'
      ), // Go to Dashboard Custom HTML5 Blank post for supports
      'can_export' => true, // Allows export in Tools > Export
      'taxonomies' => array(
         //'category'
      ) // Add Category and Post Tags support
   ));
}
function project_proposal_taxonomy() {
   register_taxonomy(
      'project_proposal_type',
      'project-proposals',
      array(
         'hierarchical' => true,
         'label' => 'Project Proposal Type',
         'query_var' => true
      )
   );
}
add_action( 'init', 'project_proposal_taxonomy' );

// Custom icon for Project Proposal menu item in admin sidebar
function add_menu_icons_styles(){
?>

<style>
#adminmenu .menu-icon-project-proposals div.wp-menu-image:before {
  content: '\f112';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


// Customize password protection form text
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<p>To view your proposal, please enter your password below:</p>" ) . '
    <label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" placeholder="PASSWORD" size="20" maxlength="20" /><div class="submit-button"><input class="btn btn--uline" type="submit" name="Submit" value="' . esc_attr__( "View Proposal" ) . '" /><span class="span-after"></span></div>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );



// remove "protected" text from protected post titles
add_filter('protected_title_format', 'blank');
function blank($title) {
   return '%s';
}

/*------------------------------------*\
   ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
   return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
   return '<h2>' . $content . '</h2>';
}




/*------------------------------------*\
   WooCommerce Functions
\*------------------------------------*/

// Main Shop Wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
   echo '<div id="main" class="main-content section isWhite">';
   echo '<div class="container">';
}

function my_theme_wrapper_end() {
   echo '</div><!-- /.container -->';
   echo '</div><!-- /.main-content -->';
}


// Change Breadcrumb menu
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
   return array(
      'delimiter'   => ' &#47; ',
      'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
      'wrap_after'  => '</nav>',
      'before'      => '',
      'after'       => '',
      'home'        => _x( 'Shop', 'breadcrumb', 'woocommerce' ),
   );
}

add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
   return '/shop/';
}


// Remove Sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


// Main Shop Page = = = = = = =

// Remove breadcrumbs on Shop landing
add_filter('woocommerce_before_main_content', 'shop_home_breadcrumb_remove');
function shop_home_breadcrumb_remove() {
   if ( is_shop() ) {
      remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
   }
}

// Remove sort option dropdown
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Add Price to main shop loop & remove Title, Price, Add to Cart button
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);



// Single Product Page = = = = = = =

// Reorder Product Summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);

add_action('woocommerce_simple_add_to_cart', 'ajax_non_variation_atc', 10);
function ajax_non_variation_atc() {
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
   add_action('woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30);
}


// Gray out out-of-stock variations
add_filter( 'woocommerce_variation_is_active', 'grey_out_variations_when_out_of_stock', 10, 2 );
function grey_out_variations_when_out_of_stock( $grey_out, $variation ) {
   if ( ! $variation->is_in_stock() )
      return false;
   return true;
}


// Always show 'add to cart' on variable products
add_action( 'woocommerce_before_add_to_cart_button', function(){
    // start output buffering
    ob_start();
} );

add_action( 'woocommerce_before_single_variation', function(){
    // end output buffering
    ob_end_clean();
    // output custom div
    echo '<div class="single_variation_wrap_custom">';
} );



// Change "Add to cart" button text
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
   return __( 'Add to Bag', 'woocommerce' );
}


// Remove Tabs, Reviews, Related, Upsales, etc
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



// Cart Page = = = = = = =

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// Show variation data for cart page
function get_variation_data_from_variation_id( $item_id ) {
    $_product = new WC_Product_Variation( $item_id );
    $variation_data = $_product->get_variation_attributes();
    $variation_detail = woocommerce_get_formatted_variation( $variation_data, true );  // this will give all variation detail in one line
    // $variation_detail = woocommerce_get_formatted_variation( $variation_data, false);  // this will give all variation detail one by one
    return $variation_detail; // $variation_detail will return string containing variation detail which can be used to print on website
    // return $variation_data; // $variation_data will return only the data which can be used to store variation data
}



// Checkout Page = = = = = = =

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

// Change order submit button text
add_filter( 'woocommerce_order_button_text', create_function( '', 'return "Checkout";' ) );

?>
