<?php get_header(); ?>
<main>
  <article>
    <div class="page-banner">
      <h1>Resources</h1>
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p class="page-banner--breadcrumbs">','</p>' );
        }
        get_template_part('template-parts/share-button');
      ?>
    </div>
    <div class="generic-content">
      <section id="resources" class="featured-resources">
        <div class="wrapper wrapper--no-padding-until-large">
          <p>Take the time to review some of our featured home inspection resources</p>
          <div class="row row--equal-height-at-large generic-content-container">
            <?php
              $resources = new WP_Query(array(
                'posts_per_page' => -1
              ));
              while ($resources -> have_posts()) {
                $resources -> the_post();
                get_template_part('template-parts/featured-resources');
              }
             wp_reset_postdata();
            ?>
          </div>
        </div>
      </section>
    </div>
  </article>
</main>
<?php get_footer(); ?>
