  <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/script.js") ?>
  <?php if( is_home() ) versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/home-ajax.js"); ?>

  <!--[if lt IE 7 ]>
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/dd_belatedpng.js") ?>
  <![endif]-->

  <script>
    var _gaq = [['_setAccount', 'UA-24583920-3'], ['_trackPageview']];
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
