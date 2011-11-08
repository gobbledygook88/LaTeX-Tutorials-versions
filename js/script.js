/*
*   script.js
*
* - Equation Live Preview scripts
* - Generate new equation
* - In Fields jQuery plugin activation
*
*/
(function($) {
  
  // Cache DOM elements & constants
  var textarea  = $("#equation-area"),
      preview   = $("#equation-preview"),
      generate  = $("#equation-generate"),
      urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=",
      urlCogs   = "http://www.codecogs.com/png.latex?",
      value;

  textarea.keyup(function() {
    
    // User input
    value = textarea.val();

    if( value ) {
      
      preview.html("<img src='" + urlCogs + encodeURIComponent(value) + "' />");

    }
    else {
      
      preview.empty();

    }

  });

  // Activate In Fields jQuery Plugin
  $("#equation-input label").inFieldLabels();

})(jQuery);

















