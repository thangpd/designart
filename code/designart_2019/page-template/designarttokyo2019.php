<?php /* Template Name: DesignArt2019*/ ?>
<?php
get_header( 'top2' );
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

//get id front page
$frontpage_id = get_option( 'page_on_front' );

$news = get_posts( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'order'          => 'date',
	'orderby'        => 'DESC',
) );

$exhibitors = get_posts( array(
	'post_type'      => 'exhibitor',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'orderby'        => 'rand'
//    'orderby'    => ['post_modified' => 'desc'],
) );

$events = get_posts( array(
	'post_type'      => 'event-party',
	'posts_per_page' => 4,
	'order'          => 'ASC',
	'orderby'=>'post_date',
	'post_status'    => array( 'future' )
) );

if ( empty( $events ) ) {
	$events = get_posts( array(
		'post_type'      => 'event-party',
		'posts_per_page' => 4,
		'order'          => 'DESC',
	) );
}
$prefix_varible_slider = get_prefix_languagle( $language, "-" );

//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider"]' );
echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider-2019"]' );
?>
<section>
    <div class="banner-top">
        <div class="content">
            <h1 class="title-h1">DESIGN & ART
                <span>into emotions</span></h1>
            <div class="banner-top-sub">DESIGNART TOKYO 2019
                <p>2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p> </div>
        </div>
        <button class="banner-top-btn">
            <span class="arrow"><img src="<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png"></span>
            <div class="content">
                <div class="date">2019.10.18</div>
                <div class="desc dt-block">表参道・外苑前を中心に全11エリアで開催！東京の街全体がアートになる。</div>
                <div class="desc mb-block">表参道・外苑前 を中心に全11エリアで開催！</div>
            </div>
            <span class="arrow"><img src="<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png"></i></span>
        </button>
    </div>
</section>
<section class="container">
    <div class="banner-center">
        <h2 class="title-h2">TOKYO TRANSFORMED <br>
            INTO A MUSEUM</h2>
        <p class="text-32">東京の街全体がミュージアムになる10日間</p>
        <p class="text-35">2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p>
        <p class="text-28">表参道・外苑前、原宿・明治神宮前、渋谷・恵比寿、代官山・中目黒、六本木、新宿、銀座 で開催</p>
    </div>
</section>
<section class="container-black">
    <div class="banner-bottom container">
        <span class="about">ABOUT</span>
        <h4 class="title-h4">
            BRINGING EMOTION
            <span>INTO LIVES <span class="mb-block">感動を、すべての人々に</span></span>
        </h4>
        <p class="text-18 dt-block">感動を、すべての人々に</p>
        <p class="text-20">「DESIGNART TOKYO」は、毎年秋に開催するデザイン＆アートフェスティバルです。世界屈指のミックスカルチャー都市である東京を舞台に、世界中からアート、インテリア、ファッション、テクノロジーなどさまざまなジャンルのモノやコトが集結し、都内各所で多彩な作品を発表していきます。</p>
        <a href="#" class="text-38 more dt-block">more <span><img src="<?php echo URL_STATICS; ?>/images/top/arrow-item.png"></span></a>
    </div>
</section>
<section class="container">
    <div class="main-content">
        <h3 class="title-h3">DESIGNART GUIDE</h3>
        <p class="text-28 sub-title">EVERYONE CAN ENJOY<br>
            DESIGN & ART</p>
        <div class="steps">
            <div class="step-item step-1">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">01.</span>
                        <span>DISCOVER ART</span>
                    </div>
                    <div class="sub-title">アートに出会う
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS; ?>/images/top/discoverart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-18">2019年は120組、11エリアで作品を展示します。</p>
                    <div class="link-group">
                        <a href="#" class="link-step">
                            <div class="left">
                                <div class="text-38">exhibition list</div>
                                <div class="text-20">展示作品一覧</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS; ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                        <a href="#" class="link-step">
                            <div class="left">
                                <div class="text-38">guide map</div>
                                <div class="text-20">展示マップ</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS; ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="step-item step-2">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">02.</span>
                        <span>LEARN ART</span>
                    </div>
                    <div class="sub-title">アートを学ぶ
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS; ?>/images/top/learnart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">デザイナートカンファレンス「BRIDGE」は、アート<br>
                        とデザインの視点から今、社会で起きている変化につ<br>
                        いて考え学び意見を交換し合う場です。</p>
                    <div class="link-group">
                        <a href="#" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS; ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>EVENT & PARTY</span>
                    </div>
                </div>
                <div class="img-wrapper img-slick">
                    <img src="<?php echo URL_STATICS; ?>/images/top/eventandparty.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">10.18 19:00〜</p>
                    <p class="text-24"> OPENING PARTY DESIGNART <br> TOKYO 2019 @ ワールド北青山</p>
                </div>
            </div>
            <div class="step-item step-3">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">03.</span>
                        <span>BY ART</span>
                    </div>
                    <div class="sub-title">アートを買う
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS; ?>/images/top/buyart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">デザイナートで展示されているアート作品は一部を除<br>いて全て購入可能です。</p>
                </div>
            </div>
            <div class="step-item step-slick mb-110">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>OFFICIAL CAFE <br> & GOODS</span>
                    </div>
                </div>
                <div class="img-wrapper img-slick mb-230">
                    <img src="<?php echo URL_STATICS; ?>/images/top/cafeandgood.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16 cs-mb"> 展示巡りに役立つオフィシャルガイドブック</p>
                    <div class="link-group">
                        <a href="#" class=" more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS; ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="wp-back-to-top-wrap">
    <div class="wp-back-to-top top top2">
        <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
    </div>
</div>



<?php get_footer( 'top2' ); ?>

<script type="text/javascript">
    /* Add current menu
--------------------------------------------------*/


    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo=item-0]').parent().addClass('current-menu-item');
        });
    })

    ;(function ($) {
        var url = $(location).attr('href');
        if (url) {
            $('body').addClass('body-white');
        }
        // $.each($('#primary-menu li'), function (index) {
        //     $(this).find('a').attr('data-demo', 'item-'+index);
        // })
    })(jQuery);
</script>
