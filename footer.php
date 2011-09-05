	<footer>
		<p>
			<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a>
	    	<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	    </p>
	</footer>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/jquery-1.4.2.min.js"><\/script>')</script>


	<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js") ?>
	<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/script.js") ?>

	<!--[if lt IE 7 ]>
	  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/dd_belatedpng.js") ?>
	<![endif]-->

	<script>
		var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
	 	(function(d, t) {
	  		var g = d.createElement(t),
	      	s = d.getElementsByTagName(t)[0];
	  		g.async = true;
	  		g.src = '//www.google-analytics.com/ga.js';
	  		s.parentNode.insertBefore(g, s);
	 	})(document, 'script');
	</script>

	<?php wp_footer(); ?>

</body>
</html>
