</div><!-- #content -->
<footer id="footer" class="site-footer">
    <div class="container">
        <nav class="footer-link">
            <ul class="footer-menu">
                <li class="li1"><a
                            href="mailto:info@designart.jp"><?php echo translate_text_language( 'Contact about DESIGNART' ); ?></a>
                </li>
                <li class="li2"><a
                            href="mailto:press@designart.jp"><?php echo translate_text_language( 'Contact about Press' ); ?></a>
                </li>
                <br>
                <li class="li3"><a
                            href="<?php echo site_url( '/privacy-policy/' ); ?>"><?php echo translate_text_language( 'Privacy Policy' ); ?></a>
                </li>
                <li class="li4"><a href="<?php echo network_site_url(); ?>"><?php echo translate_text_language( 'BRAND SITE' ); ?></a></li>
            </ul>
        </nav>


        <div class="copy-text">&copy;DESIGNART. All rights Reserved.</div>
    </div>

    <div class="sp to-exhibitor-wrap">
        <div class="to-exhibitor"><a href="<?php echo home_url() ?>/exhibitor/"><img src="http://designart.sakura.ne.jp/designart_renew_201810/designarttokyo2019/wp-content/themes/designart_2019/statics/images/commons/f_icon.svg" alt=""><?php echo translate_text_language( 'Exhibition List' ); ?></a></div>
    </div>
</footer><!-- #footer -->
</div><!-- #page -->

<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<?php get_google_analytic() ?>
<?php wp_footer(); ?>
</body>
</html>
