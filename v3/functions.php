<?php

/*
*   Includes
*/
// Custom Post Types
include($GLOBALS["TEMPLATE_RELATIVE_URL"]."inc/functions/custom-post-type-equation.php");
// Shortcodes
include($GLOBALS["TEMPLATE_RELATIVE_URL"]."inc/functions/shortcode-snippet.php");
include($GLOBALS["TEMPLATE_RELATIVE_URL"]."inc/functions/shortcode-toc.php");

// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();

// Custom Menu
add_action("init", "main_menu_init");
function main_menu_init() {
  register_nav_menu("main_menu", __("Main Menu"));
}

// Register + enqueue javascript files
add_action( 'wp_enqueue_scripts', 'my_load_javascript_files' );
function my_load_javascript_files() {
  wp_register_script( 'my-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true );
  wp_register_script( 'my-scripts', get_template_directory_uri() . '/js/script.js', array('my-plugins'), '1.0', true );
 
  wp_enqueue_script( 'my-scripts' );
}

// Deregister scripts and stylesheets when not used
add_action( 'wp_print_scripts', 'my_deregister_javascript' );
function my_deregister_javascript() {
  // Contact Form 7
  if ( !is_page('Contact') ) {
    wp_deregister_script( 'contact-form-7' );
  }

  // Collabpress
  if( !is_admin() ) {
    wp_deregister_script( 'collabpress_frontend_scripts' );
  }
}
add_action( 'wp_print_styles', 'my_deregister_styles' );
function my_deregister_styles() {
  // Contact Form 7
  if ( !is_page('Contact') ) {
    wp_deregister_style( 'contact-form-7' );
  }

  // Collabpress
  if( !is_admin() ) {
    wp_deregister_style( 'collabpress_frontend_styles' );
  }
}

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}