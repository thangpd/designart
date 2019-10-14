</div><!-- #content -->
<?php
$class = get_key_languagle();
?>
<footer id="footer" class="site-footer <?php echo ! empty( $class ) ? $class : 'jp'; ?>">
    <div class="container">
        <nav class="footer-link">
            <div class="footer-cols row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-6 footer-col">
                            <img src="<?php echo URL_STATICS; ?>/images/top/arrow-footer.png" alt=""/>
                            <ul class="footer-col-1">
                                <li>
                                    <a href="<?php echo translate_text_language( 'https://docs.google.com/forms/d/e/1FAIpQLSdSWZa58t587HPY5JoP-GwW527z2rXhn0KNNfM2iTN_Ki1F8g/viewform' ) ?>
                                    " class="title text-30">
										<?php echo translate_text_language( 'mail magazine' ) ?>


                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-18">
										<?php echo translate_text_language( 'Annual activities of' ) ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-16">
										<?php echo translate_text_language( 'DESIGNART will be informed through press release.' ) ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-6 footer-col">
                            <img src="<?php echo URL_STATICS; ?>/images/top/arrow-footer.png" alt=""/>
                            <ul class="footer-col-2">
                                <li>
                                    <a href="<?php echo translate_text_language('https://docs.google.com/forms/d/e/1FAIpQLScRG7lZN5jodO08ZABtdpsJGk-kdvNMPOVMLytlDJYVzdc3dQ/viewform') ?>" class="title text-30">
                                        press
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-18">
										<?php echo translate_text_language( 'Press registration from here</a></li>' ) ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 footer-col">
                            <ul class="footer-col-3">
                                <li>
                                    <a href="#" class="title text-20">
                                        CONTACT
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@designart.jp" class="text-20">
                                        about DESIGNART
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:press@designart.jp" class="text-20">
                                        about Press
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 footer-col">
                            <ul class="footer-col-4">
                                <li>
                                    <a href="<?php echo translate_text_language('http://designart.jp/designarttokyo2019/en/privacy-policy/') ?>" class="title text-20">
                                        PRIVACY POLICY
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo translate_text_language('http://designart.jp/en/') ?>" class="title text-20">
                                        BRAND SITE
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <ul class="footer-menu">-->
            <!--                <li class="li1"><a-->
            <!--                            href="mailto:info@designart.jp">-->
			<?php //echo translate_text_language( 'Contact about DESIGNART' ); ?><!--</a>-->
            <!--                </li>-->
            <!--                <li class="li2"><a-->
            <!--                            href="mailto:press@designart.jp">-->
			<?php //echo translate_text_language( 'Contact about Press' ); ?><!--</a>-->
            <!--                </li>-->
            <!--                <br>-->
            <!--                <li class="li3"><a-->
            <!--                            href="--><?php //echo site_url( '/privacy-policy/' ); ?><!--">-->
			<?php //echo translate_text_language( 'Privacy Policy' ); ?><!--</a>-->
            <!--                </li>-->
            <!--                <li class="li4"><a href="--><?php //echo network_site_url(); ?><!--">-->
			<?php //echo translate_text_language( 'BRAND SITE' ); ?><!--</a></li>-->
            <!--            </ul>-->
        </nav>


        <div class="copy-text">©DESIGNART. All rights Reserved.</div>
    </div>
    <div class="row btn-footer">
        <div class="sp to-exhibitor-wrap first col-xs-6">
            <div class="to-exhibitor"><a href="<?php echo home_url() ?>/exhibitor/"><?php echo translate_text_language('exhibition list') ?></a></div>
        </div>
        <div class="sp to-exhibitor-wrap last col-xs-6">
            <div class="to-exhibitor"><a
                        href="https://www.google.com/maps/d/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397678%2C139.72963319999997&z=13"><?php echo translate_text_language('guide map') ?></a>
            </div>
        </div>
    </div>
</footer><!-- #footer -->
</div><!-- #page -->

<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php get_google_analytic() ?>
<?php wp_footer(); ?>
</body>
</html>
