/*
*   script.js
*
* - Equation Live Preview scripts
* - Generate new equation
* - In Fields jQuery plugin activation
*
*/
;(function($) {
  
  // Cache DOM elements & constants
  var textarea  = $("#equation-area"),
      source    = $("#equation-source"),
      preview   = $("#equation-preview"),
      answer    = $("#equation-answer"),
      original  = $("#equation-original"),
      compile   = $("#equation-compile"),
      check     = $("#equation-check"),
      generate  = $("#equation-generate"),
      urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=",
      urlCogs   = "http://www.codecogs.com/png.latex?",
      value;

  textarea.keyup(function() {
    // User input
    value = textarea.val();

    if( value ) { preview.html("<img src='" + urlCogs + encodeURIComponent(value) + "' />"); }
    else { preview.empty(); }
  });

  // Hide preview box on load
  preview.hide();

  // Activate In Fields jQuery Plugin
  $("#equation-input label").inFieldLabels();

  // Show original button
  original.click(function() {
    preview.hide();
    answer.hide();
    source.show();
  });

  // Compile equation button
  compile.click(function() {
    source.hide();
    answer.hide();
    preview.show();
  });

  // Answer button
  check.click(function() {
    source.hide();
    preview.hide();
    answer.show();
  });

  // Generate new equation button
  generate.click(function() {
    window.location = "/";
  });

})(jQuery);