</div><!-- #content -->

<footer id="footer" class="ds-ldpage-footer site-footer">
    <div class="container">
        <nav class="footer-link">
            <ul class="footer-menu">
                <li><a href="mailto:info@designart.jp">contact us</a></li>
                <li><a href="<?php echo site_url('/top-privacy-policy/'); ?>">privacy policy</a></li>
            </ul>
        </nav>
        <div class="social-list">
            <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a>
            <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="copy-text">&copy;DESIGNART. All rights Reserved.</div>
    </div>
</footer>

<!-- <footer id="colophon" class="site-footer">
    <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'designart' ) ); ?>"><?php
            /* translators: %s: CMS name, i.e. WordPress. */
            printf( esc_html__( 'Proudly powered by %s', 'designart' ), 'WordPress' );
            ?></a>
        <span class="sep"> | </span>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf( esc_html__( 'Theme: %1$s by %2$s.', 'designart' ), 'designart', '<a href="http://underscores.me/">Underscores.me</a>' );
        ?>
    </div>
</footer> -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo URL_STATICS;?>/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS;?>/js/loader.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
<?php get_google_analytic(); ?>
</body>
</html>
