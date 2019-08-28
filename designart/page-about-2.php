<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package designart
 */


get_header( 'teaser' );
$redirect_url = $_SERVER['REDIRECT_URL'];
$reg          = '/(.*)\/(.*)\/$/';
preg_match( $reg, $redirect_url, $maths );
$post = get_page_by_path( $maths[2], OBJECT, 'page' );

if ( ! empty( $post ) ) {
	$post_id        = $post->ID;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	$description = get_field( $prefix_varible . 'description', $post_id, false );

	$description = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

	$html_share_top = get_html_share_top( $post->ID, false );
	$description    = str_replace( '{%HTML_SHARE_TOP%}', $html_share_top, $description );
	$home_url=home_url();
	$description    = str_replace( '{%HOME_URL%}', $home_url, $description );


	//echo $description;
	// echo apply_filters('the_content', $description);
?>

      	<!-- Chị code ở đây -->
          	<div class="about-2">
				<section class="wp-block-title">
					<div class="logo">
						<img src="<?php echo URL_STATICS; ?>/images/commons/img-logo-black-top-left.png">
					</div>
					<div class="content-wrapper">
						<h1 class="title">DESIGNART TOKYO 2019</h1>
						<p class="quote">感動を、すべての人々に</p>
						<p class="description pc">DESIGNART TOKYOは感動をもたらすデザイン・アートが世界から集結し、
							<br>
							誰でも分かち合うことができるデザイン＆アートフェスティバル。
							<br>
							この秋、東京の街全体がミュージアムに変貌を遂げる！</p>
						<p class="description sp">DESIGNART TOKYOは感動をもたらすデザイン・アートが
							<br>世界から集結し、誰でも分かち合うことができる
							<br>デザイン＆アートフェスティバル。
							<br>この秋、東京の街全体がミュージアムに変貌を遂げる！</p>
						<p class="period-time">2019年10月18日(金)～ 10月27日(日)
						</p>
						<p class="tags pc">表参道・外苑前 / 原宿・明治神宮前 / 渋谷・恵比寿 / 代官山・中目黒 / 六本木 / 新宿 / 銀座
							<br>
							全11エリアで開催！
							</p>
						<p class="tags sp">表参道・外苑前 / 原宿・明治神宮前 / 渋谷・恵比寿 /
							<br> 代官山・中目黒 / 六本木 / 新宿 / 銀座
							<br>全11エリアで開催！
						</p>
						<a href="http://designart.jp/designarttokyo2018/report/" class="btn-time">2018年の開催レポート >
							
						</a>
					</div>
					<div class="language">
						<a href="#">JP</a>
						<a href="#">EN</a>
					</div>
					<div class="social-icon">
						<a href="https://www.facebook.com/designart.jp" class="link-social">
							<i class="fa fa-facebook-f"></i>
						</a>
					</div>
					<div class="social-icon email">
						<a href="https://docs.google.com/forms/d/1G7kooNwsfEfr_vWsorzQ8nvXIxT1F6l9wsm_viJXrJ4/viewform?fbclid=IwAR1tWSZBsy5tJA11s61kU8IoAbAc2U3Uyj6QhSAsq3tqeuiGBlDpFLPmHe8&edit_requested=true" class="link-social">
						<i class="fa fa-envelope"></i>
						</a>
					</div>
				</section>
				<section class="wp-block-infor pc">
					<div class="wp-block-infor-left">
						<div class="description">
							<p class="title-left">DESIGNARTは日本のものづくりや文化の発展を目指して</p>
							公共建築費の1%をパブリックアートの費用に充てる文化制度「1% for Art」を推進しています。
							<br>
							多くの人がアートと気軽に触れ合える社会の実現に向けて、署名活動にご協力をお願いいたします。
                        </div>
						<button class="wp-btn">
                            <a href="http://chng.it/nqtT5RK5VX" target="_blank">
                                <p class="des sp"> 日本のものづくりや文化の発展を目指して</p>
                                1% For Art
                                <div class="icon">
                                <img src="<?php echo URL_STATICS; ?>/images/icon-button.png" class="black">
                                <img src="<?php echo URL_STATICS; ?>/images/icon.png" class="black-hover">
                                </div>
                            </a>
						</button>
					</div>
					<div class="wp-block-infor-right">
						<div class="description">
							DESIGNART TOKYO 2019 出展者エントリー受付中
							<br>
							<p class="time">エントリー締切：2019年4月26日(金)</p>
						</div>
						<div class="btn-right">
							<button class="wp-btn">
                                <a href="http://designart.jp/entry2019/" target="_blank">
                                    <p class="des sp"> DESIGNART TOKYO 2019エントリー受付中</p>
                                        出展要項
                                        <div class="icon">
                                            >
                                        </div>
                                </a>
							</button>
						</div>
					</div>
				</section>
            </div>
           






	<?php
	//echo $description;
	// echo apply_filters('the_content', $description);

}
?>
    <script !src="">
        ;(function ($) {
            function gotoLanguageurl(languagle_change, home_url, full_link) {
                if (full_link == undefined) {
                    full_link = window.location.href;
                }

                if (languagle_change != undefined) {
                    full_link = full_link.replace(new RegExp('\/en($|\/)', 'g'), '/');
                    full_link = full_link.replace(new RegExp('\/cn($|\/)', 'g'), '/');
                    full_link = full_link.replace(home_url, home_url + '/' + languagle_change);
                }
                if (full_link.match(/\/$/) == null) {
                    full_link += '/';
                }
                return full_link;
            }

            $(document).on('click', '.language a', function () {
                var languagle='<?= $language?>';
                var languagle_change = $(this).data("val");
                jCookies.set('language', languagle_change, 1);

                var txt = $('#custome-multi-languagle li a[data-val="' + languagle + '"]').text();
                $(this).parents(".language-dropdown ").find(".btn-lang").text(txt);
                window.location = gotoLanguageurl(languagle_change, '<?=$home_url?>');
            })
        })(jQuery);

    </script>

<?php
get_footer( 'teaser' );
?>
