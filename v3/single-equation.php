<?php get_header(); ?>

<div id="main" role="main" class="grids grid-16 cf">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <span class="difficulty"><?php the_terms( $post->ID, 'Difficulty', '', ', ', '' ); edit_post_link('Edit Equation', ' - ', ''); ?></span>
        </header>

        <section id="equation" class="left">
          <div id="equation-source">
            <?php the_content(); ?>
          </div>

          <div id="equation-preview"></div>
        </section>

        <div id="equation-input" class="left">
          <label for="equation-area">Enter LaTeX here ... <?php if(get_post_meta( $post->ID, 'equation_comment', true)) echo get_post_meta( $post->ID, 'equation_comment', true ); ?></label>
          <textarea id="equation-area" name="equation-area" cols="10" rows="15"></textarea>
        </div>
      </article>

    <?php endwhile; ?>

  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>

<?php get_footer(); ?>