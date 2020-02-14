<?php get_header(); ?>
<main>
  <article>
    <?php get_template_part( 'template-parts/page-banner' ); ?>
    <section class="generic-content">
      <?php the_content(); ?>
    </section>
  </article>
</main>
<?php get_footer(); ?>
