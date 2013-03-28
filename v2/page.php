<?php get_header(); ?>

<div id="main" role="main" class="grids grid-16">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  
    <?php the_content(); ?>

    <?php
      $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
      $pages = array();
      foreach ($pagelist as $page) {
         $pages[] += $page->ID;
      }

      $current = array_search($post->ID, $pages);
      $prevID  = $pages[$current-1];
      $nextID  = $pages[$current+1];
    ?>

    <nav id="page-navigation" class="cf">
      <?php if ( !empty($prevID) ) { ?>
      <div class="left">
        <a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">&laquo; <?php echo get_the_title($prevID); ?></a>
      </div>
      <?php }
      if ( !empty($nextID) ) { ?>
      <div class="right">
        <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?> &raquo;</a>
      </div>
      <?php } ?>
    </nav>

  </article>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<div>', '</div>'); ?>

</div>

<?php get_footer(); ?>
