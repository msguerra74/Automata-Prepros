<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <!-- Developed by Developer Name | http://developer-website.com -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <a href="#content-container" class="skip-link show-on-focus"><?php echo esc_html( 'Skip to content' ); ?></a>
    <div class="header-container">
      <header class="header" role="banner">
        <div class="header-info">
          <div class="header-title">
            <?php
            if ( is_front_page() ) : ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
            else : ?>
              <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            endif; ?>
          </div>
          <?php
          if ( get_bloginfo( 'description' ) ) : ?>
            <div class="header-description">
              <p><?php echo get_bloginfo( 'description' ); ?></p>
            </div>
          <?php
          endif; ?>
        </div>
      </header>
      <?php
      if ( has_nav_menu( 'nav_menu' ) ) : ?>
        <nav class="nav" role="navigation">
          <?php
          wp_nav_menu(
            array(
              'container' => 'ul',
              'menu_class' => 'nav-menu',
              'menu_id' => 'nav-menu',
              'theme_location' => 'nav_menu'
            )
          ); ?>
        </nav>
      <?php
      endif; ?>
    </div>
    <div class="nav-toggle">
      <a href="#nav-menu"><?php echo esc_html( 'Menu' ); ?></a>
    </div>
    <?php
    if ( has_post_thumbnail() ) :
      get_template_part( 'template-parts/content', 'feature' );
    endif; ?>