    <footer class="footer-section" role="contentinfo">
      <?php
      if ( is_active_sidebar( 'footer-modules' ) ) : ?>
        <div class="footer-modules-container">
          <div class="footer-modules">
            <?php
            dynamic_sidebar( 'footer-modules' ); ?>
          </div><!-- /.footer-modules -->
        </div><!-- /.footer-modules-container -->
      <?php
      endif; ?>
      <div class="footer-container">
        <div class="footer">
          <div class="footer-info">
            <p><?php echo esc_html( '&copy; ' ), date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          </div><!-- /.footer-info -->
        </div><!-- /.footer -->
      </div><!-- /.footer-container -->
    </footer><!-- /.footer-section -->
    <?php
    wp_footer(); ?>
  </body>
</html>