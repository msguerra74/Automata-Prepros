    <footer class="footer" role="contentinfo">
      <div class="footer-info">
        <?php
        if ( has_nav_menu( 'footer_nav_menu' ) ) :
          wp_nav_menu(
            array(
              'container' => 'ul',
              'menu_class' => 'footer-nav-menu',
              'theme_location' => 'footer_nav_menu'
            )
          );
        endif; ?>
        <?php
        if ( has_nav_menu( 'social_nav_menu' ) ) :
          wp_nav_menu(
            array(
              'container' => 'ul',
              'menu_class' => 'social-nav-menu',
              'theme_location' => 'social_nav_menu'
            )
          );
        endif; ?>
        <p><?php echo esc_html( '&copy; ' ), date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <script>
      window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;ga('create','UA-xxxxxxxx-x','auto');ga('send','pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  </body>
</html>