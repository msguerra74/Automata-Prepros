<?php

// Add Categories and Tags to Pages and Archives
// ---------------------------------------------

function automata_add_category_and_tags_to_pages() {
  register_taxonomy_for_object_type( 'post_tag', 'page' );
  register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'automata_add_category_and_tags_to_pages' );

function automata_add_category_and_tag_to_archives( $wp_query ) {
  // $my_post_array = array( 'post', 'page' );
  if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) ) $wp_query->set( 'post_type', 'any' );
  if ( $wp_query->get( 'tag' ) ) $wp_query->set( 'post_type', 'any' );
}
if ( ! is_admin() ) {
  add_action( 'pre_get_posts', 'automata_add_category_and_tag_to_archives' );
}


// Assets
// ------

function automata_assets() {
  // Google Fonts
  wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' );

  // CSS
  // wp_enqueue_style( 'style', get_stylesheet_uri() ); // Enqueue style.css if needed
  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array() );

  // JS / jQuery
  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'automata_assets' );


// Assets Version String Removal
// -----------------------------

function automata_assets_version_string_removal( $src ){
  return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'automata_assets_version_string_removal' );
add_filter( 'style_loader_src', 'automata_assets_version_string_removal' );


// Body Classes
// ------------

function automata_body_classes( $classes ) {
  // No Aside

  if ( ! is_active_sidebar( 'aside' ) ) {
    $classes[] = 'no-aside';
  }
  return $classes;
}
add_filter( 'body_class', 'automata_body_classes' );


// Disable Media Comments
// ----------------------

function automata_disable_media_comments( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}
add_filter( 'comments_open', 'automata_disable_media_comments', 10 , 2 );


// Excerpt Read More
// -----------------

function automata_excerpt_read_more( $more ) {
  return ' <span>' . esc_html( '&hellip;' ) . '</span> <a href="' . get_permalink() . '" class="post-excerpt-read-more">' . esc_html( 'Read more' ) . '</a>';
}
add_filter('excerpt_more', 'automata_excerpt_read_more');


// JavaScript Detection
// --------------------

function automata_javascript_detection() {
  echo "<script>with(document.documentElement){className=className.replace(/\bno-js\b/,'js')}</script>\n";
}
add_action( 'wp_head', 'automata_javascript_detection', 0 );


// Lead Paragraph Class
// --------------------

function automata_lead_paragraph_class($content){
  return preg_replace( '/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1 );
}
add_filter( 'the_content', 'automata_lead_paragraph_class' );


// Prevent Editor Code Stripping
// -----------------------------

function automata_prevent_editor_code_stripping($initArray) {
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
}
add_filter('tiny_mce_before_init', 'automata_prevent_editor_code_stripping');


// Remove Comment Website Field
// ----------------------------

function automata_remove_comment_website_field($fields) {
  unset($fields['url']);
  return $fields;
}
add_filter('comment_form_default_fields', 'automata_remove_comment_website_field');


// Responsive Embed Class
// ---------------------

function automata_responsive_embed_class($html, $url, $attr, $post_id) {
  return '<div class="responsive-embed">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'automata_responsive_embed_class', 99, 4);


// Setup
// -----

function automata_setup() {
  // Feed Links
  add_theme_support( 'automatic-feed-links' );

  // HTML5
  add_theme_support( 'html5',
    array(
      'caption',
      'comment-form',
      'comment-list',
      'gallery',
      'search-form'
    )
  );

  // Post Formats
  add_theme_support( 'post-formats',
    array(
      'aside',
      'audio',
      'chat',
      'gallery',
      'image',
      'link',
      'quote',
      'status',
      'video'
    )
  );

  // Post Thumbnails
  add_image_size( 'small', 640 );
  add_image_size( 'xlarge', 1440 );
  add_theme_support( 'post-thumbnails' );
  update_option( 'large_size_h', 0 );
  update_option( 'large_size_w', 1200 );
  update_option( 'medium_size_h', 0 );
  update_option( 'medium_size_w', 1024 );
  update_option( 'thumbnail_size_h', 160 );
  update_option( 'thumbnail_size_w', 160 );

  // Title Tag
  add_theme_support( 'title-tag' );

  // Remove Unwanted Head Components
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'wp_generator' );

  // Menus
  register_nav_menus(
    array(
      'header_top_nav_menu' => 'Header Top Nav Menu',
      'header_nav_menu' => 'Header Nav Menu',
      'social_nav_menu' => 'Social Nav Menu'
    )
  );

  // Set the content width based on the theme's design and stylesheet.
  if ( ! isset( $content_width ) ) {
  	$content_width = 1200;
  }
}
add_action( 'init', 'automata_setup' );


// Show Custom Image Sizes in Insert Media
// ---------------------------------------

function automata_show_custom_image_sizes_in_insert_media( $sizes ) {
  $custom_sizes = array(
    'small' => 'Small',
    'xlarge' => 'X-Large'
  );
  return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'automata_show_custom_image_sizes_in_insert_media' );


// Widget Tag Cloud Font Sizes
// ---------------------------

function automata_widget_tag_cloud_font_sizes( $args ) {
  $args['format'] = 'list';
  $args['largest'] = .875;
  $args['smallest'] = .875;
  $args['unit'] = 'rem';
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'automata_widget_tag_cloud_font_sizes' );


// Widgets
// -------

function automata_widgets() {
  // Header Modules
  register_sidebar(
    array(
      'class' => 'header-modules',
      'description' => 'Add widgets for the header modules area',
      'id' => 'header-modules',
      'name' => 'Header Modules',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );

  // Main Modules
  register_sidebar(
    array(
      'class' => 'main-modules',
      'description' => 'Add widgets for the main modules area',
      'id' => 'main-modules',
      'name' => 'Main Modules',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );

  // Aside Modules
  register_sidebar(
    array(
      'class' => 'aside-modules',
      'description' => 'Add widgets for the aside modules area',
      'id' => 'aside-modules',
      'name' => 'Aside Modules',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );

  // Modules
  register_sidebar(
    array(
      'class' => 'modules',
      'description' => 'Add widgets for the modules area',
      'id' => 'modules',
      'name' => 'Modules',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
);

  // Footer Modules
  register_sidebar(
    array(
      'class' => 'footer-modules',
      'description' => 'Add widgets for the footer modules area',
      'id' => 'footer-modules',
      'name' => 'Footer Modules',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );
}
add_action( 'widgets_init', 'automata_widgets' );