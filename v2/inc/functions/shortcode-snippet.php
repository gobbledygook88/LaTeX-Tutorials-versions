<?php
/*
* Code Snippet Shortcode
*/

// WordPress hook
add_shortcode("snippet", "snippet_init");

function snippet_init($atts, $content) {
  
  // Provide default attributes and overide with those given by user
  // extract(shortcode_atts(array(
  //   "" => ""
  // ), $atts));

  $content = preg_replace('/^\s+/', "hubbub", $content);

  $output  = "<pre><code>" . strip_tags($content) . "</code></pre>";

  // Return HTML
  return $output;

}

?>