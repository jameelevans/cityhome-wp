<div class="page-banner">
  <h1><?php the_title(); ?></h1>
  <?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<p class="page-banner--breadcrumbs">','</p>' );
    }
    get_template_part('template-parts/share-button');
  ?>
</div>
