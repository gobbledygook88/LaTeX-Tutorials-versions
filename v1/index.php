<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main">
      <section id="eqns">
      	<div id="originaleqn">
      		<?php 
      			$array = array(
					"orderby" => "rand",
					"post_type" => "post",
					"post_status" => "publish",
					"posts_per_page" => 1
				);
				query_posts($array);
				while(have_posts()) : the_post();
					// Post values
					$title     = get_the_title($post->ID);
					$permalink = get_permalink();
					$titleAttr = the_title_attribute(array('before' => 'Permanent Link to ', 'after' => '', 'echo' => 0 ));
					
					$category  = get_the_category();
					$catName   = $category[0]->cat_name;
					$catLink   = get_category_link($category[0]->cat_ID);
					
					// Google Visualisation API URL
				    $urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=";
				    // CodeCogs URL
				    $urlCogs   = "http://www.codecogs.com/png.latex?";
					
					// Formatted post content
					$content   = get_the_content();
					$noTags    = strip_tags($content);
					$tex       = rawurlencode($noTags);
					
					// Format post data
					$eqnhtml   = "<header>";
				    $eqnhtml  .= 	"<h2><a href='" . $permalink . "' rel='bookmark' title='" . $titleAttr . "'>" . $title ."</a></h2>";
				    $eqnhtml  .= 	"<p><a href='" . $catLink . "' title='Difficulty'>" . $catName . "</a></p>";
				    $eqnhtml  .= "</header>";
				    //$eqnhtml  .= "<div id='preimage'><img src='" . $urlCogs . $tex . "' alt='" . $title . "' /></div>";
				    $eqnhtml  .= "<div id='preimage'>\[" . $noTags . "\]</div>";
				endwhile;
				wp_reset_query();
				echo $eqnhtml;
      		?>
      	</div>
        <div id="viewarea">
          <h2>Your equation</h2>
          <div id="renderarea"></div>
        </div>
      </section>
      
      <section id="inputarea">
        <textarea id="usereqn"></textarea>
        <input id="generate" type="button" name="generate" value="New Equation">
      </section>
</div>

<?php get_footer(); ?>