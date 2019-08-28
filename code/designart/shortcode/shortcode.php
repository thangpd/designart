<?php

function get_conference_list( $args, $content ) {
	/*
		$args ['post_id']
	*/

	/*data conference posttype
		date
		time_list
			time_from
			time_to
			entry_button arr
			panelist

			en_title
			en_description
			jp_title
			jp_description
			cn_title
			cn_description
	*/
	$config = array(
		'conference_list' => '',
		'style'           => 'style-1',
		'prefix_varible'  => 'jp_',
	);
	$data   = array_merge( $config, $args );
	$prefix_varible='';
	extract( $data );

	$conference_list = json_decode( urldecode( $data["conference_list"] ) );

	switch ( $data['style'] ) {
		case 'style-1':
			$format_html_head = '<div class="bookmark-list st-list">
                <div class="row desc">';
			$format_html_body = '<div class="program-list">
                ';
			break;
		case 'style-2':
			$format_html_head = '<div class="st-list-item"><h4 class="st-list-item-title">【開催日】</h4><ul class="pl-list">';
			$format_html_body = '';
			break;
	}


	if ( is_array( $conference_list ) ):
		foreach ( $conference_list as $val ) {

			$date_conference = get_field( 'date', $val->ID );
			$date_conference = substr( $date_conference, 0, - 5 );
			$time_list       = get_field( 'time_list', $val->ID );

			$dt     = strtotime( $date_conference );
			$en_day = date( "D", $dt );


			$array_date_en = array(
				'Sun' => 0,
				'Mon' => 1,
				'Tue' => 2,
				'Wed' => 3,
				'Thu' => 4,
				'Fri' => 5,
				'Sat' => 6
			);

			$array_date_jp = array( 0 => '日', 1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金', 6 => '土' );

			/*'日', 1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金', 6 => '土' */
			$jp_date = $array_date_jp[ $array_date_en[ $en_day ] ];

			/**/
			$chaos_date = array( 'jp_date' => $jp_date, 'date' => $en_day );


			switch ( $data['style'] ) {

				case 'style-1':
					$format_html_head .= '<div class="st-list-col col-sm-6">
                        <div class="st-list-item">';
					$format_html_head .= '<h4 class="st-list-item-title">【' . $date_conference . '(' . $chaos_date[$prefix_varible."date"] . ')】</h4>';

					$format_html_head .= '<ul class="pl-list has-arrow">';


					$format_html_body .= '<div class="program-list-item">';

					$format_html_body .= '<div class="date title">' . str_replace( '/', '.', $date_conference ) . '<small>(' . strtoupper( $chaos_date[$prefix_varible."date"] ) . ')</small></div>';


					foreach ( $time_list as $time ) {
						$time_from    = $time['time_from'];
						$time_to      = $time['time_to'];
						$title        = $time[ $prefix_varible . 'title' ];
						$entry_button = $time['entry_button'];
						$description  = $time[ $prefix_varible . 'description' ];
						$pane_list    = urlencode( json_encode( $time['panelist'] ) );


						$format_html_head .= '<li><a href="#' . strtolower( $chaos_date[$prefix_varible."date"] ) . str_replace( ":", "", $time_from ) . '" class="bookmark"><time>' . $time_from . '</time> ~   「' . strtoupper( $title ) . '」</a></li>';

						$format_html_body .= '<div id="' . strtolower( $chaos_date[$prefix_varible."date"] ) . str_replace( ":", "", $time_from ) . '" class="program-detail">';


						$format_html_body .= '

						<div class="program-detail-header">
							<div class="time-banner title">
								<span class="time mr-20"><time>' . $time_from . '~' . $time_to . '</time></span>
								<span>「' . $title . '」</span>
							</div>
							<p class="presentation mb-0">' . $description . '</p>
							
							
							
						</div>';

						$format_html_body .= '<div class="program-detail-body px-20">';
						$format_html_body .= '<div class="title mb-20">panelist</div>';
						$format_html_body .= do_shortcode( '[pane_list panelist="' . $pane_list . '"]' );


						if ( ! empty( $entry_button ) ) {
							$format_html_body .= '<a class="btn btn-entry" href="' . $entry_button['url'] . '">' . $entry_button['title'] . ' ></a>';
						}

						$format_html_body .= '<!--day la dau--></div>';
						$format_html_body .= '<!--day la dau--></div>';

					}


					$format_html_head .= '</ul>';

					$format_html_head .= '</div>';

					$format_html_head .= '</div>';

					$format_html_body .= '</div>';

					break;
				case 'style-2':

					$format_html_head .= '<li><span class="lb-txt">' . $date_conference . '(' . $chaos_date[$prefix_varible."date"] . ') : ';

					foreach ( $time_list as $time ) {
//						echo '<pre>';
//						print_r( $time );
//						echo '</pre>';
						$time_from    = ! empty( $time['time_from'] ) ? $time['time_from'] : '';
						$time_to      = $time['time_to'];
						$title        = $time[ $prefix_varible . 'title' ];
						$entry_button = $time['entry_button'];
						$description  = $time[ $prefix_varible . 'description' ];
						$pane_list    = urlencode( json_encode( $time['panelist'] ) );


						$format_html_head .= $time_from . '・';


					}
					$format_html_head = mb_substr( $format_html_head, 0, - 1 );
					$format_html_head .= '</span></li>';

					break;
			}
		}
	endif;
//	echo '<pre>';
//	print_r( $format_html_head );
//	print_r( $format_html_body );
//	echo '</pre>';
	switch ( $data['style'] ) {
		case 'style-1':
			$format_html_head .= '</div>
            </div>';
			$format_html_body .= '</div>
            ';
			$res              = $format_html_head . $format_html_body;
			break;
		case 'style-2':
			$res = $format_html_head . '<!--pl-list--></ul><!--st-list-item--></div>';
			break;
	}

	return $res;


}

add_shortcode( 'conference_list', 'get_conference_list' );
function get_pane_list( $args, $content ) {
	/*
	**@array:$args['panelist']
	*/

	/*data conference posttype
		company
		position
		image
		link_list (array)
			link
		description
		jp_description
		cn_description
	*/
	$config = array(
		'panelist' => '',
	);
	$data   = array_merge( $config, $args );

	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );
	$panelist       = json_decode( urldecode( $data['panelist'] ) );

	$res = '';

	$format_html = '<div class="panelist">';
	if ( ! empty( $panelist ) ) {

		foreach ( $panelist as $val ) {
			$format_html .= '<div class="item">';
//			echo '<pre>';
//			print_r( $val->pane );
//			echo '</pre>';

			$title       = $val->pane->post_title;
			$company    = get_field( 'company', $val->pane->ID );
			$position    = get_field( 'position', $val->pane->ID );
			$image       = get_field( 'image', $val->pane->ID );
			$link_list        = get_field( 'link_list', $val->pane->ID );
			$description = get_field( $prefix_varible . 'description', $val->pane->ID );
//			echo '<pre>';
//			print_r( $title );
//			print_r( $image );
//			print_r( $link );
//			print_r( $description );
//			echo '</pre>';
			$format_html .= '<div class="f-blc-img"><img src="' . $image . '" alt="image" class="img-res"></div>';
			$format_html .= '<div class="name mb-10"><span class="text-uppercase">' . $title . '</span><span class="mb-hide">/</span><span class="company">'.$company.'</span><span>' . $position . '</span></div>';
			$format_html .= ' <div class="f-blc-content">
                                        <div class="description">' . $description . '</div>';
			if ( ! empty( $link_list ) ) {

				foreach($link_list as $link){

				$format_html .= '<div><a class="link" target="_blank" href="' . $link['link']["url"] . '">' . $link['link']['title'] . '</a></div>';

				}
			}
			$format_html .= '</div>';


			$format_html .= '</div>';

		}
//		echo '<pre>';
//		print_r( $prefix_varible );
//		echo '</pre>';


	}
	$format_html .= '</div>';
	$res         = $format_html;

	return $res;


}

add_shortcode( 'pane_list', 'get_pane_list' );

function get_custom_field_image($post_id){
    echo "okokokok";
//    die;
//    $image = get_field('image');
//    if( !empty($image) ): ?>
<!---->
<!--        <img src="--><?php //echo $image['url']; ?><!--" alt="--><?php //echo $image['alt']; ?><!--" />-->
<!---->
<!--    --><?php //endif;

}
//add_filter('get_cfi','get_custom_field_image');
add_shortcode('shortcode_img_2','get_custom_field_image');