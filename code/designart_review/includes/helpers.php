<?php

function get_banner( $preText, $Text ) {
	?>
    <div class="banner-block-custom">
        <a href="#" id="back-page">back</a>
        <div class="block-banner">
            <h3><span><?php echo $preText ?></span><?php echo $Text ?></h3>
        </div>
    </div>

    <style>
        .banner-block-custom #back-page {

        }

        .banner-block-custom .block-banner {
            color: #626262;
            text-align: center;
            padding: 40px 0;
        }

        .banner-block-custom .block-banner span {
            font-size: 85px;
            color: #c3a384;
        }
    </style>
	<?php
}

function get_prefix_languagle( $languagle = "", $after_text = "" ) {
	switch ( $languagle ) {
		case "en":
			return "";
		case "cn":
			return "cn" . $after_text;
		default:
			return "jp" . $after_text;

	}
}

function generate_select_languagle() {
	$languagle = get_key_languagle();
	?>
    <div class="language-dropdown dropdown" id="custome-multi-languagle" data-current="<?php echo $languagle ?>"
         data-home="<?php echo home_url(); ?>">
        <span class="lb-text">language:</span>
        <a href="javascript:void(0)" class="btn btn-lang dropdown-toggle" data-toggle="dropdown">English</a>
        <ul class="dropdown-menu">
            <li class="current"><a href="javascript:void(0)" data-val="">日本語</a></li>
            <li><a href="javascript:void(0)" data-val="en">English</a></li>
        </ul>

    </div>
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

            if ($('#custome-multi-languagle').length > 0) {
                var languagle = $('#custome-multi-languagle').attr('data-current');
                var home_url = $('#custome-multi-languagle').attr('data-home');
                $('#custome-multi-languagle .dropdown-menu li').removeClass("current");
                $('#custome-multi-languagle').find('a[data-val="' + languagle + '"]').parents("li").addClass('current');
                var txt = $('#custome-multi-languagle li.current a[data-val="' + languagle + '"]').text();
                // alert(txt);
                $(".language-dropdown .btn-lang").text(txt);
                console.log("current languagle: " + languagle);
                $(document).on('click', '.language-dropdown .dropdown-menu a', function () {
                    var languagle_change = $(this).data("val");

                    jCookies.set('language', languagle_change, 1);

                    var txt = $('#custome-multi-languagle li a[data-val="' + languagle + '"]').text();
                    $(this).parents(".language-dropdown ").find(".btn-lang").text(txt);
                    window.location = gotoLanguageurl(languagle_change, home_url);
                })
            }
        })(jQuery);

    </script>
	<?php
}

function get_key_languagle() {
	if ( isset( $_SERVER['REDIRECT_URL'] ) ) {
		$redirect_url = get_request_url();
		$reg          = '/(.*)\/(en)\/(.*)/';
		$res          = '';
		if ( preg_match( $reg, $redirect_url ) ) {
			$res = 'en';
		}

		$reg = '/(.*)\/(cn)\/(.*)/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$res = 'cn';
		}
		if ( ! defined( 'DOING_AJAX' ) ) { /* it's an AJAX call */
			set_transient( 'key_language', $res, 3600 );
		}
	}
	if ( defined( 'DOING_AJAX' ) ) {
		$res = get_transient( 'key_language' );
	}

	return $res;
}

function set_key_languagle( $languagle = "" ) {
	$language = update_option( 'mutil_language', $languagle );

	return $language;
}

add_action( 'wp_ajax_set_languagle_by_ajax', 'set_languagle_by_ajax' );
function set_languagle_by_ajax() {
	if ( isset( $_POST['languagle'] ) ) {
		$languagle = $_POST['languagle'];
		set_key_languagle( $languagle );
	}
}

function get_date_post( $post_id, $format = '' ) {
	$languagle    = get_key_languagle();
	$kekLanguagle = get_prefix_languagle( $languagle, "" );
	if ( empty( $format ) ) {
		switch ( $kekLanguagle ) {
			case 'jp':
				$format = 'Y年n月j日';
				break;
			case 'cn':
				$format = 'Y年n月j日';
				break;
			default:
				$format = 'M. j, Y';
				break;
		}
	}

	$pfx_date = get_the_date( $format, $post_id );

	return $pfx_date;
}


function dateDifference( $date_1, $date_2 ) {
	$datetime1 = date_create( $date_1 );
	$datetime2 = date_create( $date_2 );

	$interval = date_diff( $datetime1, $datetime2 );

	return $interval->format( '%a' );

}

function compare_date_from_current_date( $y_m_d, $compare_date ) {
//if post date <=3 day return NEW label;
	$compare_date --;
	$date1         = date( 'Y-m-d', strtotime( $y_m_d ) );
	$current_date1 = date( 'Y-m-d', time() );
	$diff_day      = dateDifference( $date1, $current_date1 );
	if ( $diff_day <= $compare_date ):
		return true;
	else:
		return false;
	endif;

}

function translate_text_language( $text ) {
	global $cfg_text_translate;
	$languagle = get_key_languagle();
	$key       = get_prefix_languagle( $languagle, "" );

	if ( isset( $cfg_text_translate[ $text ][ $key ] ) ) {
		return $cfg_text_translate[ $text ][ $key ];
	}

	return $text;
}

function back_page_history( $is_echo = true, $class = '' ) {
	$html = '<div class="clear-padding-btn-move back-page-history ' . $class . '"><a href="' . home_url() . '/designarttokyo2018/' . '" class="btn btn-move"><span class="icon-txt"><i class="fa fa-angle-left"></i></span> back</a></div>';
	if ( empty( $is_echo ) ) {
		return $html;
	}
	echo $html;
}

function take_value_array( $key, $arr, $default = "" ) {
	$value = $default;
	if ( isset( $arr[ $key ] ) ) {
		$value = $arr[ $key ];
	}

	return $value;
}


function numPage( $total, $limit ) {
	$num = intval( $total / $limit );
	if ( ( $total % $limit ) == 0 ) {
		$num = $num;

		return $num;
	}

	return $num + 1;
}


//process flow

$custom_page_name = '';
$custom_page      = array();
add_filter( 'template_include', 'custom_page_template', 99 );
function custom_page_template( $template ) {
	global $custom_page;
	global $custom_page_name;
	global $cfg_data_meta;
	if ( isset( $_SERVER['REDIRECT_URL'] ) ) {
		$redirect_url = get_request_url();
		$redirect_url = rtrim( $redirect_url, '//' );

		if ( preg_match( '/^\/en$/', $redirect_url ) ||
		     preg_match( '/^\/cn$/', $redirect_url ) ||
		     preg_match( '/^\/$/', $redirect_url ) ) {
			$custom_page_name = 'DESIGNART | TOP';

			if ( preg_match( '/designarttokyo2018/', home_url() ) ) {
				$custom_page_name = 'DESIGNART2018 | TOP';

				return get_template_directory() . '/page-template/designart2018.php';
			}

			return get_template_directory() . '/page-top.php';
		}

		$reg = '/\/(exhibitor)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | EXHIBITOR';
			$custom_page      = get_page_by_path( 'exhibitor', OBJECT, 'page' );
//            if (isset($cfg_data_meta['archive-exhibitor'])) {
//                $custom_page = $cfg_data_meta['archive-exhibitor'];
//            }
			return get_template_directory() . '/page-template/archive-exhibitor.php';
		}
		$reg = '/(access\/exhibitorguide)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | EXHIBITOR GUIDE';
			$custom_page      = get_page_by_path( 'exhibitor', OBJECT, 'page' );
//            if (isset($cfg_data_meta['archive-exhibitor'])) {
//                $custom_page = $cfg_data_meta['archive-exhibitor'];
//            }
			return get_template_directory() . '/page-template/archive-exhibitorguide.php';
		}

		$reg = '/\/(event-party)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | EVENT & PARTY';
			$custom_page      = get_page_by_path( 'event-party', OBJECT, 'page' );
//            if (isset($cfg_data_meta['archive-event-party'])) {
//                $custom_page = $cfg_data_meta['archive-event-party'];
//            }
			return get_template_directory() . '/page-template/archive-event-party.php';
		}

		$reg = '/(access\/architecture)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | ARCHITECTURE';
			$custom_page      = get_page_by_path( 'architecture', OBJECT, 'page' );
//            if (isset($cfg_data_meta['architecture'])) {
//                $custom_page = $cfg_data_meta['architecture'];
//            }
			return get_template_directory() . '/page-template/archive-achitecture.php';
		}

		$reg = '/\/(news)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | NEWS';
			$custom_page      = get_page_by_path( 'news', OBJECT, 'page' );
//            if (isset($cfg_data_meta['archive-news'])) {
//                $custom_page = $cfg_data_meta['archive-news'];
//            }
			return get_template_directory() . '/page-template/news.php';
		}


		$reg = '/\/(artist&brand)|(artist&brand\/)|(artist&brand?(.*))$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | Artist & Brand';
			$custom_page      = get_page_by_path( 'artist-brand', OBJECT, 'page' );
//            if (isset($cfg_data_meta['architecture'])) {
//                $custom_page = $cfg_data_meta['architecture'];
//            }
			return get_template_directory() . '/page-template/artist-brand.php';
		}

		$reg = '/\/(news)\/page\/(.*)$/';
		if ( preg_match( $reg, $redirect_url ) ) {
			$custom_page_name = 'DESIGNART2018 | NEWS';
			if ( isset( $cfg_data_meta['archive-news'] ) ) {
				$custom_page = $cfg_data_meta['archive-news'];
			}

			return get_template_directory() . '/page-template/news.php';
		}

		$reg = '/\/(exhibitor)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = $maths[2];
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'exhibitor' );
				$custom_page_name = 'DESIGNART2018 | EXHIBITOR | ' . $maths[2];
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/page-template/single-exhibitor.php';
				}
			}
		}
		$reg = '/access\/(exhibitorguide)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = $maths[2];
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'exhibitorguide' );
				$custom_page_name = 'DESIGNART2018 | EXHIBITOR GUIDE| ' . $maths[2];
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/page-template/single-exhibitorguide.php';
				}
			}
		}

		$reg = '/\/(news)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = preg_replace( '/^news-/', '', $maths[2] );
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'post' );
				$custom_page_name = 'DESIGNART2018 | NEWS | ' . $custom_page->post_title;
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/single.php';
				}
			}
		}

		$reg = '/(access\/architecture)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = $maths[2];
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'architecture' );
				$custom_page_name = 'DESIGNART2018 | ARCHITECTURE | ' . $maths[2];
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/page-template/single-architecture.php';
				}
			}
		}

		$reg = '/\/(event-party)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = $maths[2];
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'event-party' );
				$custom_page_name = 'DESIGNART2018 | EVENT & PARTY | ' . $maths[2];
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/page-template/single-event-party.php';
				}
			}
		}

		$reg = '/\/(artist-brand)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			$custom_page_name = '';
			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = $maths[2];
				$custom_page      = get_page_by_path( $custom_page_name, OBJECT, 'artist-brand' );
				$custom_page_name = 'DESIGNART2018 | Artist & Brand | ' . $maths[2];
				if ( isset( $custom_page ) ) {
					return get_template_directory() . '/page-template/single-artist-brand.php';
				}
			}
		}

		$reg = '/(.*)\/(.*)$/';
		if ( preg_match( $reg, $redirect_url, $maths ) ) {
			if ( isset( $maths[2] ) && $maths[2] == 'designarttokyo2018' ) {
				$custom_page_name = 'DESIGNART2018 | TOP';

				return get_template_directory() . '/page-template/designart2018.php';
			}


			if ( isset( $maths[2] ) && ! empty( $maths[2] ) ) {
				$custom_page_name = 'DESIGNART2018 | ' . strtoupper( $maths[2] );
			}
		}

	} else {
		$custom_page_name = 'DESIGNART | TOP';
	}

	return $template;
}

add_filter( 'pre_get_document_title', 'custom_title_site' );
function custom_title_site( $title ) {
	global $custom_page_name;
	if ( isset( $custom_page_name ) && ! empty( $custom_page_name ) ) {
		return $custom_page_name;
	}

	return $title;
}

function get_news_permalink( $post_id ) {
	$home            = get_home_url() . '/';
	$post_url        = get_permalink( $post_id );
	$post_custom_url = str_replace( $home, $home . 'news/news-', $post_url );

	return $post_custom_url;
}

function get_news_black_permalink( $post_id ) {
	return get_news_permalink( $post_id );
}

function get_previous_post_id( $post_id ) {
	global $post;
	$oldGlobal     = $post;
	$post          = get_post( $post_id );
	$previous_post = get_previous_post();
	$post          = $oldGlobal;
	if ( '' == $previous_post ) {
		return 0;
	}

	return $previous_post->ID;
}

function get_next_post_id( $post_id ) {
	global $post;
	$oldGlobal = $post;
	$post      = get_post( $post_id );
	$next_post = get_next_post();
	$post      = $oldGlobal;
	if ( '' == $next_post ) {
		return 0;
	}

	return $next_post->ID;
}

function get_request_url() {
	if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {
		$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$home_url    = get_home_url();
		$pattern     = str_replace( '/', '\/', $home_url );
		if ( preg_match( '/^' . $pattern . '(.*)/', $current_url, $maths ) ) {
			if ( isset( $maths[1] ) ) {
				return $maths[1];
			}
		}
	}

	return '';
}

function get_url_page() {
	$current_url = get_home_url();
	if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {
		$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	return $current_url;
}


function get_html_share( $is_echo = true ) {
	$url_page = get_url_page();
	$html     = '<div class="share-infotext-center padding-tb-30"><div class="heading-title heading-style-01"><div class="title-wrapp"><div class="first-letter">' . translate_text_language( 'share' ) . '</div><h2 class="title case-4">' . translate_text_language( 'share' ) . '</h2></div></div><div class="social-list"><a href="https://twitter.com/home?status=' . $url_page . '" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a><a href="https://www.facebook.com/sharer/sharer.php?u=' . $url_page . '" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a><a href="https://plus.google.com/share?url=' . $url_page . '" target="_blank" class="social-item"><i class="fa fa-google-plus"></i></a></div></div>';
	if ( $is_echo ) {
		echo $html;
	} else {
		return $html;
	}
}

function get_html_contact( $is_echo = true ) {
	$html = '
	<div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <div class="first-letter">' . translate_text_language( 'contact' ) . '</div>
                    <h2 class="title case-5">' . translate_text_language( 'contact' ) . '</h2>
                </div>
            </div>
            <div class="text-center group-btn">
                <a href="mailto:info@designart.jp" class="btn btn-bg yellow ">' . translate_text_language( "Contact about DESIGNART" ) . '</a>
                <a href="mailto:press@designart.jp" class="btn btn-bg yellow ">' . translate_text_language( "Contact about Press" ) . '</a>
            </div>
	
	';
	if ( $is_echo ) {
		echo $html;
	} else {
		return $html;
	}
}

function get_category_post( $post_id, $taxonomy, $fill = 'all' ) {
	$categorys = get_the_terms( $post_id, $taxonomy );
	if ( ! empty( $categorys ) ) {
		$cat_obj = $categorys[0];

		switch ( $fill ) {
			case 'all':
				return $cat_obj;
			default:
				if ( isset( $cat_obj->{$fill} ) ) {
					return $cat_obj->{$fill};
				}
		}
	}

	return '';
}

function get_url_image_event_cat( $slug ) {
	switch ( $slug ) {
		case 'event':
			return URL_STATICS . '/images/event-party/event.jpg';
		case 'party':
			return URL_STATICS . '/images/event-party/party.jpg';
		default:
			return '';
	}
}

function get_html_back_to_top( $is_echo = true ) {
	$link_top = home_url() . '/designart2018';
	$html     = '<div class="text-center"><a href="' . $link_top . '" class="btn btn-line black "><i class="icons fa fa-angle-left"></i> BACK to TOP</a></div>';
	if ( ! $is_echo ) {
		return $html;
	}
	echo $html;
}

function get_link_official_coffee( $key_id, $is_echo = true ) {
	$link = home_url() . '/officialgoodcafe/#' . $key_id;
	if ( ! $is_echo ) {
		return $link;
	}
	echo $link;
}

function get_link_access( $tab, $id, $is_echo = true ) {
	$link = home_url() . '/access/#tab=' . $tab . '#' . $id;
	if ( ! $is_echo ) {
		return $link;
	}
	echo $link;
}

function get_meta_language() {
//    $languagle = get_key_languagle();
//    switch ($languagle) {
//        case 'en':
//            $meta = 'en-US';
//            break;
//        default:
//            $meta = 'ja';
//            break;
//    }
	$meta = 'ja';

	return $meta;
}

function get_meta_acf() {
	global $post, $custom_page;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	$page = $post;
	if ( isset( $custom_page ) && ! empty( $custom_page ) ) {
		$page = $custom_page;
	}
	$page = (array) $page;

	if ( ! empty( $page ) ) {
		$post_id = - 1;
		if ( isset( $page['ID'] ) ) {
			$post_id = $page['ID'];
		}
		$metas = array(
			'title'       => '',
			'description' => '',
			'keywords'    => ''
		);

		if ( isset( $page['post_title'] ) ) {
			$metas['title'] = $page['post_title'];
		}

		//        meta_description
		$meta_description = get_field( $prefix_varible . 'meta_description', $post_id, '' );
		if ( isset( $page['meta_description'] ) ) {
			$meta_description = $page['meta_description'];
		}
		if ( ! empty( $meta_description ) ) {
			$metas['description'] = $meta_description;
		}

		//        meta_keywords
		$meta_keywords = get_field( $prefix_varible . 'meta_keywords', $post_id, '' );
		if ( isset( $page['meta_keywords'] ) ) {
			$meta_keywords = $page['meta_keywords'];
		}
		if ( ! empty( $meta_keywords ) ) {
			$metas['keywords'] = $meta_keywords;
		}

		foreach ( $metas as $key => $value ) {
			if ( ! empty( $value ) ) {
				echo '<meta name="' . $key . '" content="' . $value . '">';
			}
		}
	}
}

// <a href="%2$s" class="btn btn-bg black capti-text">
function get_html_information_post() {
//    $term = get_term_by('slug', 'information', 'category');
	$term           = 1;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );
	$html           = '';
	if ( ! empty( $term ) ) {
		$format    = '<section id="information" class="section information-area section-3 section-info-new-top ">
<!--             <div class="wp-btn wp-btn-top">
                <a href="/designart-review/news-black" class="btn btn-bg black capti-text">
                    ' . translate_text_language( '7x' ) . '
                    <i class=" icons fa fa-angle-right"></i>
                </a>
            </div> -->
            <div class="wp-ds-ldpage">
                <div class="wp-block-information">
                    <div class="title">Information</div>
                    <ul class="wp-list-infor">
                      %1$s
                    </ul>
                    <div class="wp-btn">
                        <a href="/news" class="btn btn-bg black capti-text">
                            More Info
                            <i class=" icons fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>';
		$infos     = get_posts( array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 5,
//            'tax_query' => array(
//                array(
//                    'taxonomy' => $term->taxonomy,
//                    'field' => 'term_id',
//                    'terms' => $term->term_id,
//                )
//            ),
			'orderby'        => [ 'post_modified' => 'desc' ],
		) );
		$html_item = '';
		foreach ( $infos as $info ) {
			$info_id    = $info->ID;
			$info_title = get_field( $prefix_varible . 'title', $info_id );
			$info_date  = get_date_post( $info_id );
			$cat        = get_category_post( $info->ID, 'category' );
			$html_item  .= '<li>
                        <span class="date">' . $info_date . '</span>
                        <span class="category mobile">' . $cat->name . '</span>
                        <a href="' . get_news_black_permalink( $info_id ) . '" class="text">' . $info_title . '</a>
                        <span class="category pc">' . $cat->name . '</span>
                    </li>';
		}
		$html = sprintf( $format, $html_item, home_url() . '/news' );
	}

	return $html;
}

function get_google_analytic() {
	?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-97706927-1', 'auto');
        ga('send', 'pageview');
    </script>
	<?php
}

function get_html_banner_page( $is_echo = '' ) {
	$html = '<div class="landing-st logo-st"><figure><a href="' . home_url() . '/official/#tab=official-goods#audio-guide2"><img src="' . URL_STATICS . '/images/about/label-ontrip-bold.png" alt="" class="img-responsive"></a><figcaption class="name"><a href="' . home_url() . '/official/#tab=official-goods#audio-guide2">AUDIO GUIDE</a></figcaption></figure><figure><a href="' . home_url() . '/official/#tab=official-goods#audio-guide1"><img src="' . URL_STATICS . '/images/about/book-lista.png" alt="" class="img-responsive"></a><figcaption class="name"><a href="' . home_url() . '/official/#tab=official-goods#audio-guide1">OFFICIAL BOOK</a></figcaption></figure></div>';
	if ( ! empty( $is_echo ) ) {
		echo $html;
	}

	return $html;
}

function get_html_banner_page_footer( $is_echo = '' ) {
	$html = '<div class="landing-st logo-st">
	<figure><a href="' . home_url() . '/official/#tab=official-goods#audio-guide2"><img src="' . URL_STATICS . '/images/about/label-ontrip-no-border.png" alt="" class="img-responsive"></a><figcaption class="name"></figcaption></figure>
	<figure><a href="' . home_url() . '/official/#tab=official-goods#audio-guide1"><img src="' . URL_STATICS . '/images/about/book-lista-no-border.png" alt="" class="img-responsive"></a><figcaption class="name"></figcaption></figure>
	</div>';
	if ( ! empty( $is_echo ) ) {
		echo $html;
	}

	return $html;
}

function check_enable( $key ) {
	global $cfg_disable;
	if ( in_array( $key, $cfg_disable ) ) {
		return false;
	}

	return true;
}

function get_html_information_center() {
	?>

    <div class="heading-title heading-style-02">
        <h2 class="title upper-text color-primary"> INFORMATION CENTER<span class="line-middle"></span></h2>
    </div>
    <div class="box-info last">
        <div class="item">
            <p class="color-primary">スパイラル</p>
            <p class="last">〒107-0062　東京都港区南青山5-6-23</p>
            <a href="#tab=accessaccess-shibuya-area" class="color-primary">Google Mapで場所を見る ></a>
        </div>
        <div class="item">
            <p class="color-primary">ワールド 北青山ビル</p>
            <p class="last">〒107-0062 東京都港区南青山2-15-19 <span></span>402 </p>
            <a href="#tab=accessaccess-shibuya-area" class="color-primary">Google Mapで場所を見る ></a>
        </div>
    </div>
	<?php
}

function getHtmlCountdown( $post_id ) {
	$dateCountDown = get_field( 'countdown', $post_id, false );
	$day           = 0;
	if ( preg_match( '/^(\d{4})(\d{2})(\d{2})$/', $dateCountDown, $matches ) ) {
		$fm          = $matches[1] . '/' . $matches[2] . '/' . $matches[3];
		$timeCurrent = strtotime( $fm ) - time();
		$day         = intval( $timeCurrent / ( 24 * 60 * 60 ) );
		$day         = ( $day > 0 ) ? $day : 0;
	}

	return '<span class="days">' . $day . '</span>';
}

/*EXHIBITOR*/
function get_category_exhibitor( $get_the_term, $format = '' ) {
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );
	$res            = '';
    die;
	if ( empty( $format ) ) {
		$format = '<a class="category" href="#%1$s">%2$s<i
                class="fas fa-angle-down"></i></a>';
	}
	$cat_list_html = '';
	if ( ! empty( $get_the_term ) ) {
		foreach ( $get_the_term as $vl_term ) {
			$cat_name      = translate_category_name( $vl_term, $prefix_varible );
			$cat_list_html .= sprintf( $format,
				$vl_term->slug,
				$cat_name );
		}
	}
	if ( ! empty( $cat_list_html ) ) {
		$res = $cat_list_html ;
	}


	return $res;

}


/*END EXHIBITOR*/
/*EXHIBITORGUIDE*/
function translate_category_name( $term, $prefix_varible ) {

	$cat_name = '';
	/*requied
	taxonomy custom_taxonomy-cat has afc field: jp_slug
	*/
	if ( ! empty( $prefix_varible ) ) {
		/*jp*/
		$cat_name = get_field( $prefix_varible . 'slug', $term );
	} else {
		/*en*/
		$cat_name = $term->name;
	}
	if ( empty( $cat_name ) && ! empty( $prefix_varible ) ) {
		/*empty(jp_name)*/
		$cat_name = $term->name;
	}

	return $cat_name;
}

function get_category_exhiguide( $get_the_term, $format = '' ) {
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );
	$res            = '';


	if ( empty( $format ) ) {
		$format = '<ul class="exhibitor-cat-list">%1$s</ul>';
	}
	$cat_list_html = '';
	if ( ! empty( $get_the_term ) ) {
		foreach ( $get_the_term as $vl_term ) {
			$cat_name      = translate_category_name( $vl_term, $prefix_varible );
			$cat_list_html .= '<li class="exhibitor-cat-list">
                                    ' . $cat_name . '
                                    </li>';
		}
	}
	if ( ! empty( $cat_list_html ) ) {
		$res = sprintf( $format, $cat_list_html );
	}


	return $res;

}

function render_exhibitorguid_post( $posts ) {

	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	?>
    <div class="blogs-list">
	<?php
	foreach ( $posts as $index => $post ) {
		$post_id   = $post->ID;
		$post_link = get_permalink( $post_id );
		$title     = get_field( $prefix_varible . 'title', $post_id );

		$cat_of_post   = get_the_terms( $post_id, $post->post_type . '-cat' );
		$cat_list_html = get_category_exhiguide( $cat_of_post );
		echo '	<div class="blog-item">
                                        ' . $cat_list_html . '
                                        <h3 class="title">
                                            <a href="' . $post_link . '" class="link">' . $title . '</a>
                                        </h3>
                                        <a class="more-info-exhibitorguide" href="' . $post_link . '">more info</a>
					                </div>';


	}
	?>
    </div><?php
}


function pagination_custom_posttype( $page_current, $maxpage ) {

	?>
    <div class="pagination-wrapp">
        <nav class="navigation pagination">
			<?php
			echo paginate_links( array(
				'prev_text' => 'Prev',
				'next_text' => 'Next',
				'current'   => $page_current,
				'total'     => $maxpage,
				'base'      => '%_%',
				'format'    => '?paged=%#%',
			) );
			?>
        </nav>
    </div>
	<?php
}

if ( ! function_exists( '' ) ) //Ajax load post
{
	add_action( 'wp_ajax_ajax_load_exhibitorguide_post', 'ajax_load_exhibitorguide_post_func' );
}
add_action( 'wp_ajax_nopriv_ajax_load_exhibitorguide_post', 'ajax_load_exhibitorguide_post_func' );
function ajax_load_exhibitorguide_post_func() {
	$paged      = isset( $_POST['paged'] ) ? intval( $_POST['paged'] ) : '';
	$paged      = ! empty( $paged ) ? $paged : 1;
	$cat_filter = isset( $_POST['cat_filter'] ) ? $_POST['cat_filter'] : '';

	$cat_filter = urlencode( json_encode( $cat_filter ) );

	wp_json_encode( do_shortcode( '[exhibitor_guide_list page_current="' . $paged . '" cat_filter="' . $cat_filter . '"]' ) );


	die();
}


/*EXHIBITORGUIDE*/


