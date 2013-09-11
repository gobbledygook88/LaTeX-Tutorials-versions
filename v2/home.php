<?php get_header(); ?>

<div id="main" role="main" class="cf">
  
  <?php

    // Query database for random equation
    $args = array(
      "post_type" => "equation",
      "posts_per_page" => 1,
      "orderby" => "rand"
    );
    $wp_query = new WP_Query( $args );

    // Once a random equation has been found, display it
    while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <span class="difficulty"><?php the_terms( $post->ID, 'Difficulty', '', ', ', '' ); ?> <?php edit_post_link('Edit Equation', ' - ', ''); ?></span>
        </header>

        <section id="equation" class="left">
          <div id="equation-source">
            <?php 
              
              // Post values
              $title     = get_the_title($post->ID);
              
              // Google Visualisation API URL
              $urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=";
              // CodeCogs URL
              $urlCogs   = "http://www.codecogs.com/png.latex?";

              // Formatted post content
              $content   = get_the_content();
              $noTags    = strip_tags($content);
              $tex       = rawurlencode($noTags);
            
              echo "<img src='" . $urlCogs . $tex . "' alt='" . $title . "' />";

            ?>
          </div>

          <div id="equation-preview"></div>
        </section>

        <div id="equation-input" class="left">
          <label for="equation-area">Enter LaTeX here ... <?php if(get_post_meta( $post->ID, 'equation_comment', true)) echo get_post_meta( $post->ID, 'equation_comment', true ); ?></label>
          <textarea id="equation-area" name="equation-area" cols="10" rows="15"></textarea>
          <input id="equation-generate" type="button" name="generate" value="New Equation">
        </div>
      </article>

    <?php endwhile; ?>

</div>

<?php get_footer(); ?>