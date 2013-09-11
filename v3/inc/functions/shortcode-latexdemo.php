<?php
/*
* Code Snippet Shortcode
*/

// WordPress hook
add_shortcode("demo", "demo_init");

function demo_init($atts, $content) {
  
  // Provide default attributes and overide with those given by user
  extract(shortcode_atts(array(
    "title"   => "",                // Give the demo some context (or for later/earlier reference)
    "columns" => "two",             // options: one,two
    "rows"    => 10,                // Customise height of code text box
  ), $atts));

  $output  = "<pre><code>" . strip_tags($content) . "</code></pre>";
  $output .= "<section class='demo-container'>";
  $output .=    "<div class='demo-input'></div>";
  $otuput .=    "<div class='demo-preview'></div>";
  $output .=    "<input class='demo-compile' type='button' name='compile' value='Compile'>";
  $output .= "</section>";

  // Return HTML
  return $output;

}

?>