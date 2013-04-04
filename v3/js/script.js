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
      input     = $("#equation-input"),
      original  = $("#equation-original"),
      compile   = $("#equation-compile"),
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

  // Activate In Fields jQuery Plugin
  $("#equation-input label").inFieldLabels();

  // Show original button
  original.click(function() {
    preview.hide();
    $("#equation-answer").hide();
    source.show();
  });

  // Compile equation button
  compile.click(function() {
    source.hide();
    $("#equation-answer").hide();
    preview.show();
  });

  // Generate new equation button
  generate.click(function() {
    window.location = "/";
  });

  var kkeys = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
  var kidx = 0;
  $(document).keydown(function(e) {
    if(e.keyCode === kkeys[kidx++]) {
      if(kidx === kkeys.length) {
        $(document).unbind('keydown', arguments.callee);
        input.append('<input id="equation-check" type="button" name="check" value="Show Answer">');

        // Answer button
        $("#equation-check").click(function(e) {
          source.hide();
          preview.hide();
          $("#equation-answer").show();
        });
      }
    } else { kidx = 0; }
  });

})(jQuery);