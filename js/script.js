/*
* Equation Live Preview scripts
*/
(function() {
  
  // Cache DOM elements & constants
  var textarea  = $("#equation-input").find("textarea"),
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

  generate.onClick(function() {
    


  });

})(jQuery);

















