<?php get_header(); ?>
<main>
  <article>
    <?php get_template_part( 'template-parts/page-banner' ); ?>
    <section class="generic-content">
      <div class="wrapper wrapper--narrow">
        <?php the_content(); ?>
      </div>
    </section>
  </article>
</main>
<?php get_footer(); ?>
