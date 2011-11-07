<?php get_header(); ?>

<div id="main" role="main" class="grids grid-16">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <span class="difficulty"><?php the_terms( $post->ID, 'Difficulty', '', ', ', '' ); ?></span>
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
          <textarea cols="10" rows="15" placeholder="Enter LaTeX here..."></textarea>
        </div>

        <footer>
          <?php edit_post_link('Edit Equation', '', ''); ?>
        </footer>
      </article>

    <?php endwhile; ?>

  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>

<?php get_footer(); ?>