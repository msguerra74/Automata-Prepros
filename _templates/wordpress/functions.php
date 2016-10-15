<?php

// Add Categories and Tags to Pages and Archives
// ---------------------------------------------

function example_theme_add_category_and_tags_to_pages() {
  register_taxonomy_for_object_type( 'post_tag', 'page' );
  register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'example_theme_add_category_and_tags_to_pages' );

function example_theme_add_category_and_tag_to_archives( $wp_query ) {
  // $my_post_array = array( 'post', 'page' );
  if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) ) $wp_query->set( 'post_type', 'any' );
  if ( $wp_query->get( 'tag' ) ) $wp_query->set( 'post_type', 'any' );
}
if ( ! is_admin() ) {
  add_action( 'pre_get_posts', 'example_theme_add_category_and_tag_to_archives' );
}

// Assets
// ------

function example_theme_assets() {

  // Google Fonts

  wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' );

  // CSS

  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array() );

  // JS / jQuery

  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'example_theme_assets' );

// Assets Version String Removal
// -----------------------------

function example_theme_assets_version_string_removal( $src ){
  return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'example_theme_assets_version_string_removal' );
add_filter( 'style_loader_src', 'example_theme_assets_version_string_removal' );

// Body Classes
// ------------

function example_theme_body_classes( $classes ) {

  // No Aside

  if ( ! is_active_sidebar( 'aside' ) ) {
    $classes[] = 'no-aside';
  }

  return $classes;
}
add_filter( 'body_class', 'example_theme_body_classes' );

// Disable Media Comments
// ----------------------

function example_theme_disable_media_comments( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}
add_filter( 'comments_open', 'example_theme_disable_media_comments', 10 , 2 );

// Excerpt Read More
// -----------------

function example_theme_excerpt_read_more( $more ) {
  return ' <span>' . esc_html( '&hellip;' ) . '</span> <a href="' . get_permalink() . '" class="post-excerpt-read-more">' . esc_html( 'Read more' ) . '</a>';
}
add_filter('excerpt_more', 'example_theme_excerpt_read_more');

// JavaScript Detection
// --------------------

function example_theme_javascript_detection() {
  echo "<script>with(document.documentElement){className=className.replace(/\bno-js\b/,'js')}</script>\n";
}
add_action( 'wp_head', 'example_theme_javascript_detection', 0 );

// Lead Paragraph Class
// --------------------

function example_theme_lead_paragraph_class($content){
  return preg_replace( '/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1 );
}
add_filter( 'the_content', 'example_theme_lead_paragraph_class' );

// Prevent Editor Code Stripping
// -----------------------------

function example_theme_prevent_editor_code_stripping($initArray) {
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
}
add_filter('tiny_mce_before_init', 'example_theme_prevent_editor_code_stripping');

// Remove Comment Website Field
// ----------------------------

function example_theme_remove_comment_website_field($fields) {
  unset($fields['url']);
  return $fields;
}
add_filter('comment_form_default_fields','example_theme_remove_comment_website_field');

// Setup
// -----

function example_theme_setup() {

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
      'nav_menu' => 'Nav Menu',
      'social_nav_menu' => 'Social Nav Menu',
      'footer_nav_menu' => 'Footer Nav Menu'
    )
  );
}
add_action( 'init', 'example_theme_setup' );

// Show Custom Image Sizes in Insert Media
// ---------------------------------------

function example_theme_show_custom_image_sizes_in_insert_media( $sizes ) {
  $custom_sizes = array(
    'small' => 'Small',
    'xlarge' => 'X-Large'
  );
  return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'example_theme_show_custom_image_sizes_in_insert_media' );

// Video Container Class
// ---------------------

function example_theme_video_container_class($html, $url, $attr, $post_id) {
  return '<div class="video-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'example_theme_video_container_class', 99, 4);

// Widget Tag Cloud Font Sizes
// ---------------------------

function example_theme_widget_tag_cloud_font_sizes( $args ) {
  $args['format'] = 'list';
  $args['largest'] = .875;
  $args['smallest'] = .875;
  $args['unit'] = 'rem';
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'example_theme_widget_tag_cloud_font_sizes' );

// Widgets
// -------

function example_theme_widgets() {

  // Aside

  register_sidebar(
    array(
      'class' => 'aside',
      'description' => 'Add widgets for the aside area',
      'id' => 'aside',
      'name' => 'Aside',
      'before_widget' => '<div class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );
}
add_action( 'widgets_init', 'example_theme_widgets' );