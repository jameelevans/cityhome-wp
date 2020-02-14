<?php
//Action to enqueue scripts and styles
add_action('wp_enqueue_scripts', 'cityhome_files');

//Action to make css styles available to login screen
add_action('login_enqueue_scripts', 'cityhome_login_css');

//Action to add custom theme features
add_action('after_setup_theme', 'cityhome_features');

//Filter to change login logo link to home page
add_filter('login_headerurl', 'cityhome_url');

//Filter to replace WP logo with site title name on login screen
add_filter('login_headertitle', 'cityhome_login_title');

//Action to add custom logo theme support
add_action( 'after_setup_theme', 'cityhome_custom_logo_setup' );


//Enqueue scripts and styles
function cityhome_files() {
  wp_enqueue_script('main-cityhome-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700');
  wp_enqueue_style('cityhome_main_styles', get_stylesheet_uri());
  wp_localize_script('main-cityhome-js', 'cityhomeData', array(
    'root_url' => get_site_url()
  ));
}

//Add defer to scripts
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('main-cityhome-js');

   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

//Makes login logo link to home page
function cityhome_url() {
  return esc_url(site_url('/'));
}

//Make css styles available to login screen
function cityhome_login_css() {
  wp_enqueue_style('cityhome_main_styles', get_stylesheet_uri());
  }

//Replace WP logo with site title nmae on login screen
function cityhome_login_title() {
  return get_bloginfo('name');
}

//Custom logo theme support
function cityhome_custom_logo_setup() {
    $defaults = array(
        'height'      => 43,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'City Home Inspections', 'Serving Southeast Wisconsin Since 1998' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}

//Custom theme features
function cityhome_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('bannerLogo', 600, 143, true);
  add_image_size('pageBanner', 1500, 350, true);
  add_image_size('resourceImage', 1600, 1066, true);
}

//Register widget area
function cityhome_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Reviews Section', 'cityhome' ),
		'id'            => 'reviews-section',
		'description'   => esc_html__( 'Add widgets here.', 'cityhome' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'cityhome_widgets_init' );

//Banner function
function pageBanner($args = NULL) {

  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['photo']) {
    if (get_the_post_thumbnail_url()) {
      $args['photo'] = get_the_post_thumbnail_url();
    } else {
      $args['photo'] = get_theme_file_uri('/images/get-home-inspection.jpg');
    }
  }

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
      <h1 class="headline headline--home-banner t-center"><?php echo $args['title'] ?></h1>
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p class="page-banner--breadcrumbs-single">','</p>' );
        }
        get_template_part('template-parts/share-button');
      ?>

  </div>
<?php }
