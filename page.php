<?php get_header(); ?>

<div id="main" role="main" class="grids grid-16">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  
    <?php the_content(); ?>

    <nav>
      <div><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </nav>
  </article>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

</div>

<?php get_footer(); ?>
