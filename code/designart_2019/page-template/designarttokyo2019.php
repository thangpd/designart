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
<div class="designart-page font-custom">

    <div class="landing-st">
        <div class="container container2019">
            <div class="heading-title heading-style-01 custom2019">
                <div class="title-wrapp">
                    <h2 class="first-letter first-letter2019"><?php echo translate_text_language('TOKYO TRANSFORMED INTO A MUSEUM') ?></h2>
                    <p class="date2019">2019.10.18 <span>Fri</span> ー 10.27 <span>Sun</span></p>
                    <p class="place2019"><?php echo translate_text_language('Held in Omotesando / Gaienmae / Harajuku・Meiji Jingumae / Shibuya・Ebisu / Daikanyama・Nakameguro / Roppongi / Shinjuku / Ginza') ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-st about">
        <div class="container">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <h2 class="first-letter first-letter-top"><?php echo translate_text_language('Bringing Emotion into Lives') ?></h2>
                    <p><?php echo translate_text_language('"DESIGNART TOKYO" is a design & art festival held every fall. There are many exhibitions to bring together diverse objects and experiences created in crossover fields of art, interior design, fashion, and food from around the globe to be presented on the stages in various locations in Tokyo, one of the world\'s leading mixed culture cities.') ?></p>
<!--                    <div class="btn"><a href="">もっと知る</a></div>-->
                </div>
            </div>
        </div>
    </div>

    <div class="landing-st guide">
        <div class="container container2">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <h2 class="first-letter">DESIGNART GUIDE</h2>
                    <p><?php echo translate_text_language('Everyone can enjoy design & art') ?></p>
                </div>
            </div>

            <div class="item meet">
                <div class="img"></div>
                <div class="circle"><?php echo translate_text_language('Discover<br>Art') ?></div>
                <div class="txt"><?php echo translate_text_language('The 120 groups exhibit their works in the 11 areas in 2019.') ?></div>
                <div class="bt"><a href="<?php echo home_url() ?>/exhibitor/"><?php echo translate_text_language('Exhibition List') ?></a></div>
            </div>

            <div class="item learn">
                <div class="img"></div>
                <div class="circle"><?php echo translate_text_language('Learn<br>Art') ?></div>
                <div class="txt"><?php echo translate_text_language('DESIGNART Conference “BRIDGE” is a platform to learn and exchange opinions about what is happening in the field of art and design.') ?></div>
                <div class="bt"><a href="http://designart.jp/conference2019/" target="_blank"><?php echo translate_text_language('More Info') ?></a></div>
            </div>
        </div>
    </div>


    <?php if ( check_enable( 'event-party' ) ): ?>
        <script>
            var eventParty = [];
            <?php
            $cnt = 0;
            foreach ( $events as $event ) {
                $title         = get_field( $prefix_varible . 'title', $event->ID, '' );
                $area_html = get_field( 'area', $event->ID, '' );
                $date_html        = get_date_post( $event->ID, 'm.j H:i〜' );
                $event_link = get_field( 'more_info', $event->ID, '' );
                $thumbnail =  get_field( 'thumbnail', $event->ID);

                $output = '';
                $output .= 'eventParty['.$cnt.'] = {';
                $output .= 'date:"'.addslashes($date_html).'",';
                $output .= 'title:"'.addslashes($title).'",';
                $output .= 'place:"'.addslashes($area_html).'",';
                $output .= 'thumbnail:"'.addslashes($thumbnail).'",';
                $output .= 'link:"'.addslashes($event_link).'"';
                $output .= '};'."\n";

                echo $output;
                $cnt++;
            }
            ?>
        </script>
        <div class="landing-st event_party">
            <div class="container container2">
                <div class="heading-title heading-style-01">
                    <div class="title-wrapp">
                        <h2 class="first-letter">EVENT&PARTY</h2>
                    </div>
                </div>

                <div class="item">
                    <div class="img">
                        <!--<img src="" alt="">-->
                    </div>
                    <div class="date"><!--00.00 00:00〜--></div>
                    <div class="txt"><!--イベント名@場所--></div>

                </div>
                <div class="prev"></div>
                <div class="next"></div>
            </div>
        </div>

        <script src="<?php echo URL_STATICS; ?>/js/top_event_party.js"></script>
    <?php endif; ?>


    <div class="landing-st info">
        <div class="container">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <h2><?php echo translate_text_language('Early October<br>All program information release!!') ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_contact(); ?>
        </div>
    </div><!-- ./end .contact-st -->

</div>
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
