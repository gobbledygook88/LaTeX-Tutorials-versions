<?php
/*
* Documentation Table of Contents Shortcode
*/

// WordPress hook
add_shortcode("toc", "toc_init");

function toc_init($atts) {
  
  // Allow access to current post data
  global $post;

  $ID = $post->ID;

  // Provide default attributes and overide with those given by user
  $args = shortcode_atts(array(
    "sort_column" => "menu_order",
    "sort_order" => "",
    "exclude" => "",
    "exclude_tree" => "",
    "inlcude" => "",
    "depth" => 0,
    "child_of" => $ID,
    "title_li" => "",
    "echo" => 0,

  ), $atts);

  $output  = "<h5>Table of Contents</h5>";
  $output .= "<ol>";
  $output .= 	wp_list_pages( $args );
  $output .= "</ol>";

  // Return HTML
  return $output;

}

?>