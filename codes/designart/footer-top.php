</div><!-- #content -->

<footer id="footer" class="ds-ldpage-footer site-footer">
    <div class="container">
        <nav class="footer-link">
            <ul class="footer-menu">
                <li><a href="mailto:info@designart.jp">contact us</a></li>
                <li><a href="<?php echo site_url( '/top-privacy-policy/' ); ?>">privacy policy</a></li>
            </ul>
        </nav>
        <div class="social-list">
            <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i
                        class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i
                        class="fa fa-facebook-official"></i></a>
            <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i
                        class="fa fa-instagram"></i></a>
        </div>
        <div class="copy-text">&copy;DESIGNART. All rights Reserved.</div>
    </div>
</footer>

<?php

/*get post page if empty*/

if ( empty( $post ) || ! isset( $post->post_name ) ) {
	$redirect_url = $_SERVER['REDIRECT_URL'];
	$reg          = '/(.*)\/(.*)\/$/';
	preg_match( $reg, $redirect_url, $maths );
	$post = get_page_by_path( $maths[2], OBJECT, 'page' );
	$post = get_post( $post->ID );
}
?>


</div>
</footer> -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    jQuery(function ($) {
		<?php
		if(! is_front_page()){
		?>
        // // Hàm scroll to section add class
        var section = $('.section'),
            nav_bar = $('.ds-header-black'),
            nav_bar_height = nav_bar.height();

        var site_url = '<?php echo site_url(); ?>';
        $(window).on('scroll', function () {
            var scroll_top = $(this).scrollTop();
            section.each(function () {
                var top = $(this).offset().top - nav_bar_height,
                    bottom = top + $(this).height();
                if (scroll_top >= top && scroll_top <= bottom) {
                    nav_bar.find('.anchor_scroll').removeClass('active-link');
                    nav_bar.find('a[href="#' + $(this).attr('id') + '"]').addClass('active-link');
                } else {
                    nav_bar.find('.anchor_scroll').removeClass('active-link');
                    nav_bar.find('a[id="mn-<?= $post->post_name ?>"]').addClass('active-link');
                }
            });
        });
		<?php
		}

		?>
        //click scroll to section
        $(document).on('click', '.anchor_scroll', function (e) {
            console.log($(this).attr('href'));
            if ($(this).attr('href') === '#contact' || $(this).attr('href') === '#report') {
                e.preventDefault();
                $('.anchor_scroll').removeClass('active-link');
                $(this).addClass('active-link');
                var attr = $(this).attr("href");
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top
                }, 1350, 'easeInOutExpo');
            } else {
				<?php
				if(!preg_match( '#artist-brand#', $_SERVER['REQUEST_URI'] )):

				?>
                window.location.href = site_url + '/' + $(this).attr('href');
				<?php endif; ?>
            }
        });
        // slick slider
        /*$('.slide-top').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            cssEase: 'linear',
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
        });*/
        // Open Menu
        $(document).on('click', '.ds-header-black #nav-icon-open', function (e) {
            e.preventDefault();
            $(this).parents('.site-header').addClass('menu-mb-active');
            $('.header-main').append('<div class="menu-backdrops"></div>');
        });
        // Click item close menu
        if ($(window).width() <= 767) {
            $(document).on('click', '.items-black-header li .anchor_scroll', function (e) {
                e.preventDefault();
                $(this).parents('.site-header').removeClass('menu-mb-active');
                $('.menu-backdrops').remove();
            });
        }


        //Bookmark to section program detail
        $(document).on('click', '.bookmark', function (e) {
            e.preventDefault();
            var attr = $(this).attr("href");

            if ($(window).width() >= 1000) {
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top - nav_bar_height
                }, 1350, 'easeInOutExpo');
            } else {
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top - nav_bar_height - 90
                }, 1350, 'easeInOutExpo');
            }
        });

    });
    window.addEventListener('DOMContentLoaded', function () {
        var html = document.getElementsByTagName('html');
        console.log(html);
        html[0].classList.remove('loading');
        var element = document.getElementById("pageCover");
        element.parentNode.removeChild(element);

    });
</script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/js/loader.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
<?php get_google_analytic(); ?>
</body>
</html>
