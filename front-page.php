<?php get_header(); ?>
<main role="main">
  <article>
    <section id="start-here" class="home-banner full-width-split group" data-matching-link="#start-here-link">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <div class="slider">
            <?php
              $homepageSlides = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'slide'
              ));
              while ($homepageSlides -> have_posts()) {
                $homepageSlides -> the_post(); ?>
                <div class="slider-wrapper">
                  <h2 class="headline headline--home-banner t-center"><?php the_field('slide_title'); ?></h2>
                  <p><?php the_field('slide_description'); ?></p>
                  <p class="t-center no-margin"><a href="<?php the_field('slide_link'); ?>" class="btn btn--white-outline">Learn More</a></p>
                </div>
             <?php }
             wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
        <?php
          $bannerLogo = get_field('banner_logo');
          ?>
          <div class="banner-logo">
            <img src="<?php echo $bannerLogo['url']; ?>" alt="<?php echo $bannerLogo['alt']; ?>">
          </div>
          <div class="banner-logo--description">
            <p><?php echo get_bloginfo('description'); ?></p>
          <p>
            <?php
            if ( wp_is_mobile() ) {
              echo '<a title="Call City Home Inspections to schedule an appointment in Milwaukee, Waukesha, Racine or anywhere in Southeast Wisconsin now" href="tel:414-703-7913"><i class="icon icon-phone"></i>&nbsp;&nbsp;Call Us Now</a>';
            }else{
              echo '<i class="icon icon-phone"></i>&nbsp;&nbsp;414-403-7913';
            }
             ?>
            <br />
            <a class="open-modal" title="Email City Home Inspections to schedule an appointment in Milwaukee, Waukesha, Racine or anywhere in Southeast Wisconsin now" href="mailto:cityhomeinspec9847@gmail.com">
              <i class="icon icon-bolt"></i>&nbsp;&nbsp;Request Inspection Online</a><br />
              <?php
              if ( wp_is_mobile() ) {
                echo '<a href="mailto:cityhomeinspec9847@gmail.com"><i class="icon icon-envelope"></i>&nbsp;&nbsp;Email Us Now</a>';
              }else{
                echo '<a class="banner-logo--description--email" href="mailto:cityhomeinspec9847@gmail.com"><i class="icon icon-envelope"></i>&nbsp;&nbsp;cityhomeinspec9847@gmail.com</a>';
              }
               ?>
          </p>
          </div>
        </div>
      </div>
      <a class="btn btn--white-round nav-link" href="#whats-included"><i class="icon icon-down"></i></a>
      <?php get_template_part('template-parts/share-button'); ?>
    </section>
    <section id="whats-included" class="page-section whats-included"  data-matching-link="#whats-included-link">
      <div class="includes-section-wrapper">
          <div class="wrapper wrapper--no-padding-until-large">
            <h2 class="headline--large">OUR HOME INSPECTIONS INCLUDE</h2>
            <div class="row row--equal-height-at-large row--t-padding generic-content-container">
              <div class="row__large-4">
                <div class="includes-wrapper">
                  <div class="includes">
                    <a class="includes--circle" href="<?php echo site_url('/whats-included'); ?>">
                      <span class="icon icon-shield"></span>
                      <span class="includes--circle__line"></span>
                    </a>
                    <h3>Certified Expert Inspector</h3>
                    <p>Our expert inspector has over 20 years of home inspection experience while serving southeast Wisconsin.</p>
                    <a class="btn btn--white-outline" href="<?php echo site_url('/whats-included'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
              <div class="row__large-4">
                <div class="includes-wrapper">
                  <div class="includes">
                    <a class="includes--circle" href="<?php echo site_url('/whats-included'); ?>">
                      <span class="icon icon-home-alt"></span>
                      <span class="includes--circle__line"></span>
                    </a>
                    <h3>Interior &amp; Exterior Elements</h3>
                    <p>We inspect your entire home from the foundation to the roof looking for damage, defects or any condition that leads to any functional concerns</p>
                    <a class="btn btn--white-outline" href="<?php echo site_url('/whats-included'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
              <div class="row__large-4">
                <div class="includes-wrapper includes--last">
                  <div class="includes">
                    <a class="includes--circle" href="<?php echo site_url('/whats-included'); ?>">
                      <span class="icon icon-reports"></span>
                      <span class="includes--circle__line"></span>
                    </a>
                    <h3>On Site Reports</h3>
                    <p>Home inspection reports are issued the same day on site</p>
                    <a class="btn btn--white-outline" href="<?php echo site_url('/whats-included'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section id="resources" class="page-section featured-resources"  data-matching-link="#resources-link">
      <div class="wrapper wrapper--no-padding-until-large">
        <h2 class="headline--large__black">FEATURED RESOUCES</h2>
        <div class="row row--equal-height-at-large row--t-padding generic-content-container">
          <?php
            $resources = new WP_Query(array(
              'posts_per_page' => 3
            ));
            while ($resources -> have_posts()) {
              $resources -> the_post();
              get_template_part('template-parts/featured-resources');
            }
           wp_reset_postdata();
          ?>
        </div>
        <p class="t-center"><a href="<?php echo site_url('/resources'); ?>" class="btn btn--blue-outline">View All Resources</a></p>
      </div>
    </section>
  </article>
</main>
<?php get_footer(); ?>
