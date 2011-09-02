// DOM ready
$(document).ready(function() {
	// Objects
	var urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=",
		urlCogs   = "http://www.codecogs.com/png.latex?",
		target    = $("#renderarea"),
		input     = $("textarea#usereqn"),
		value;
		
	var QUEUE = MathJax.Hub.queue;  // shorthand for the queue
	
	// Textarea user input
	input.keyup(function() {
		// Target area
		value  = input.val();
		// Preprocess TeX
		value = "\\[" + value + "\\]";
		
		if(value) {
			//target.html("<img src='" + urlCogs + encodeURIComponent(value) + "' />");
			target.html(value);
			MathJax.Hub.Queue(["Typeset", MathJax.Hub, "renderarea"]);
		}
		else {
			target.empty();
		}
	});
	
	// New equation button
	$("input#generate").click(function() {
		window.location = "/";
	});
});