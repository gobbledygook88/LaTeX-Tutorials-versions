<?php get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <span class="author">by <?php the_author() ?></span>
        </header>
        <?php 
          
          // Post values
          $title     = get_the_title($post->ID);
          
          // Google Visualisation API URL
          $urlGoogle = "http://chart.apis.google.com/chart?cht=tx&chl=";

          // Formatted post content
          $content   = get_the_content();
          $noTags    = strip_tags($content);
          $tex       = rawurlencode($noTags);
        
          echo "<img src='" . $urlGoogle . $tex . "' alt='" . $title . "' />";

        ?>
        <footer>
          <?php the_tags('Tags: ', ', ', '<br />'); ?> 
          Posted in <?php the_category(', ') ?>
          | <?php edit_post_link('Edit', '', ' | '); ?>
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