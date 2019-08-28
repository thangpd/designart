</div><!-- #content -->
<footer id="footer" class="site-footer">
    <div class="container">
        <nav class="footer-link">
            <ul class="footer-menu">
                <li class="li1"><a
                            href="mailto:info@designart.jp"><?php echo translate_text_language( 'Contact us' ); ?></a>
                </li>
                <!--<li><a href="<?php /*echo home_url('#'); */ ?>"><?php /*echo translate_text_language('Site Map'); */ ?></a></li>
                -->
                <li class="li2"><a
                            href="<?php echo site_url( '/privacy-policy/' ); ?>"><?php echo translate_text_language( 'Privacy Policy' ); ?></a>
                </li>
                <li class="li3"><a href="<?php echo network_site_url(); ?>">BRANDSITE TOP</a></li>
            </ul>
        </nav>
		<?php get_html_banner_page_footer( true ) ?>
        <div class="copy-text">&copy;DESIGNART. All rights Reserved.</div>
    </div>
</footer><!-- #footer -->
</div><!-- #page -->

<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<?php get_google_analytic() ?>
<?php wp_footer(); ?>
</body>
</html>
