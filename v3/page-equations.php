<?php
/*
*	Template Name: Equations
*/

get_header();

?>

<div id="main" role="main" class="grids grid-16">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  
    <?php the_content(); ?>
  
  </article>
  <?php endwhile; endif; ?>

  <?php

    // Grab all equations and display in difficulty order
    $diff_arr = array('easy', 'medium', 'hard');
    $diff_arr_size = count($diff_arr);

    for( $i=0; $i<$diff_arr_size; $i++ ) {

      // Store difficulty for repeated reference
      $diff     = $diff_arr[$i];
      $diff_cap = ucfirst($diff);

      echo "<div class='grid-5'>";
        echo "<h5>" . $diff_cap . "</h5>";
          echo "<ul>";

      // Query arguments
      $args = array(
        'post_type'      => 'equation',
        'difficulty'     => $diff,
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title'
      );
      $wp_query = new WP_Query( $args );

      while( $wp_query->have_posts() ) : $wp_query->the_post();
        echo "<li>";
          echo "<a href=" . get_permalink() . ">";
            the_title();
          echo "</a>";
        echo "</li>";
      endwhile;

      // Reset query
      wp_reset_query();

      // Close list section container
        echo "</ul>";
      echo "</div>";

    }
    
  ?>

</div>

<?php get_footer(); ?>