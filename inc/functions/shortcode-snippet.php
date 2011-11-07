<?php
/*
* Code Snippet Shortcode
*/

// WordPress hook
add_shortcode("snippet", "snippet_init");

function snippet_init($atts, $content) {
  
  // Provide default attributes and overide with those given by user
  extract(shortcode_atts(array(
    "" => ""
  ), $atts));

  $output  = "<pre><code>";
  $output .= $content;
  $output .= "</code></pre>";

  // Return HTML
  return $output;

}

?>