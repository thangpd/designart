<?php
get_header( 'top2' );


$post           = get_page_by_path( 'about' );
$post_id        = $post->ID;
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$description    = get_field( $prefix_varible . 'description', $post_id, false );
$description    = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

$html_share  = get_html_share( false );
$description = str_replace( '{%HTML_SHARE%}', $html_share, $description );

//    back history
$html_back   = back_page_history( false );
$description = str_replace( '{%BACK_HISTORY%}', $html_back, $description );
// html banner page
$html_banner_page = get_html_banner_page();
$description      = str_replace( '{%BANNER_PAGE%}', $html_banner_page, $description );

//echo $description;
?>
    <section class="about-page about-outline-page">
        <div class="container">

            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">デザイナートについて</div>
                </div>
            </div>

            <div class="wp-tab">
                <div class="wp-scroll-page tab-filter">
                    <div class="show-tabs">Outline</div>
                    <ul class="list-scroll-item">
                        <li>
                            <a class="item-filter active-tab" data-value="about-outline">Outline<i
                                        class="icons fa fa-angle-down" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a class="item-filter" data-value="about-cafegoods">CAFE&GOODS<i
                                        class="icons fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a class="item-filter" data-value="about-program">PROGRAM<i class="icons fa fa-angle-down"
                                                                                        aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a class="item-filter" data-value="about-credit">Credit<i class="icons fa fa-angle-down"
                                                                                      aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <div class="tab-filter-section tab-official-page">
                        <div>

                            <!-- About Outline -->
                            <div class="wp-content show-content" data-value="about-outline">

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">コンセプト<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="block-wrapp">
                                        <div class="row">
                                            <div class="col-left">
                                                <img alt="" class="img-responsive"
                                                     src="<?php echo URL_STATICS; ?>/images/about/img-about-01.png">
                                            </div>
                                            <div class="col-right">
                                                <div class="desc">
                                                    <h3 class="title">東京の街全体がミュージアムになる10日間</h3>
                                                    <p>DESIGNART（デザイナート）は、ジャンルの垣根を超えて、デザインと
                                                        アートを横断するモノやコトの素晴らしさを発信・共有してゆく活動です。
                                                    </p>
                                                    <p>「DESIGNART T OKYO」は、その活動の場として2017 年に始まった、
                                                        毎年秋に開催するデザイン＆アートフェスティバル。世界屈指のミックス
                                                        カルチャー都市である東京を舞台に、世界中からアート、デザイン、イン
                                                        テ リア、ファッション、フードなどさまざまなジャンルのモノやコトが集
                                                        結し 、都内各所で多彩なプレゼンテーションを行います。各展示を回遊
                                                        し て街歩きが楽しめるのも、このイベントの魅力のひとつ。まさに、東京
                                                        の街全体がデザイン＆アートミュージアムになる10 日間です。
                                                    </p>
                                                    <p>過去２年の開催によって、アートやデザインプロダクツを購入し、日常
                                                        的に愛でるという文化が、東京の人々に着実に根付きつつあります。そこで
                                                        ３年目となる今年は、個人ではなく社会全体でアートを支える文化を成熟
                                                        させるための活動をスタートします。
                                                    </p>
                                                    <p>「 1% for Art」は、公共建設の建築費の１% をパブリックアートの制作
                                                        費用に充てるという、欧米諸国や韓国、台湾などで法制化されている
                                                        文化制度です。この制度によって、人々が日常的にアートを鑑賞し、感動で
                                                        きる社会が実現するとともに、アーティストやデザイナーの雇用が創出
                                                        されクリエイティブ産業を活性化させることができます。
                                                    </p>
                                                    <p>DESIGNART TOKYO 2 019 では、日本においてこの制度を実現す
                                                        るための多様なプロジェクトを展開するほか、会期を通じて法制化実現
                                                        のための著名活動なども実施します。
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ./end concept -->

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">ヴィジョン<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="block-wrapp">
                                        <div class="row">
                                            <div class="col-left hidden-col">
                                                <p></p>
                                            </div>
                                            <div class="col-right">
                                                <div class="desc">

                                                    <p>
                                                        <strong>1. 日本を中心としたクリエイティブ産業の活性化</strong><br>
                                                        より多くの人が質の高いものづくりに触れ合い、「価値のある暮らし」という体験の積み重ねをすることがクリエイティブ業界の活性化につながると考えます。フェスティバルは、この時限りの一品を購入できる場としても位置付けています。購入希望者への支援策としての「インテリアローン・
                                                        ショッピングクレジット」の普及活動なども行なっております。
                                                    </p>
                                                    <p><strong>2. 世界の人々が創造的に感化しあうプラットフォームの提供</strong><br>
                                                        ジャンルを問わない国内外の様々なクリエイティブ関係者が交わることで、想像を超えた化学反応が生まれ、新しいプロジェクトへの発展、思いもよらない出会いをボーダレスに繋ぐ環境や機会を提供します
                                                    </p>
                                                    <p>
                                                        <strong>3. 若手デザイナー/アーティストの後押し</strong><br>
                                                        10年後・20年後の文化発展を見据え、
                                                        若手クリエイターが冒険心をもち、独創性のある作品を発表するプラットフォームとして位置付けています。
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- ./end Vision -->

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">開催概要<span class="line-middle"></span>
                                        </h2>

                                    </div>

                                    <div class="brand-wrapp">
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">名称</span></div>
                                            <div class="col-right"><span class="info-text">DESIGNART TOKYO 2019<br>デザイナート トーキョー 2019</span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">会期</span></div>
                                            <div class="col-right"><span
                                                        class="info-text">2019年10月18日(金) 〜10月27日(日)</span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">会場</span></div>
                                            <div class="col-right"><span class="info-text">表参道・外苑前 / 原宿・明治神宮前 / 渋谷・恵比寿 / 代官山・中目黒 / 六本木 / 新宿 / 銀座</span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">規模</span></div>
                                            <div class="col-right"><span class="info-text">120組 / 100箇所以上</span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">主催</span></div>
                                            <div class="col-right"><span class="info-text">DESIGNART 実行委員会</span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">パートナーカントリー</span></div>
                                            <div class="col-right"><span class="info-text">イスラエル</span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">助成</span></div>
                                            <div class="col-right"><span
                                                        class="info-text">公益財団法人東京都歴史文化財団アーツカウンシル東京</span></div>
                                        </div>
                                        <div class="brand-block pd-img">
                                            <div class="col-left"><span class="lb-text">協賛</span></div>
                                            <div class="col-right">
                                                <div class="brand-list">
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="http://www.agb.co.jp" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-asahibuil.png"
                                                                     alt="logo-asahibuil">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="https://www.askul.co.jp/kaisya/"
                                                               target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-askul.png"
                                                                        alt="logo-askul">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="http://www.canadagoose.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-canadagoose.png"
                                                                     alt="logo-canadagoose">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="http://gervasoni.jp/" target="_blank">

                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-gervasoni.png"
                                                                     alt="logo-gervasoni">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">


                                                            <a href="https://www.space-tokyo.co.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-space.png"
                                                                     alt="logo-space">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">

                                                            <a href="https://www.sony.co.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-sony.png"
                                                                     alt="logo-sony">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">


                                                            <a href="https://www.tanseisha.co.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-tanseisha.png"
                                                                     alt="logo-tanseisha">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">


                                                            <a href="https://www.dbrain.co.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-dbrain.png"
                                                                     alt="logo-dbrain">
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">


                                                            <a href="https://www.panasonic.com/jp/home.html"
                                                               target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-panasonic.png"
                                                                     alt="logo-panasonic">
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">

                                                            <a href="https://www.francfranc.co.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-francfranc.png"
                                                                     alt="logo-francfranc">
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="https://www.perrier-jouet.com/ja-jp/"
                                                               target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-perrierjouet.png"
                                                                     alt="logo-perrierjouet">
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">

                                                            <a href="https://www.volvocars.com/jp/about/our-company/aoyama"
                                                               target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-volvostudioaoyama.png"
                                                                     alt="logo-volvostudioaoyama">
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">協力</span></div>
                                            <div class="col-right">
                                                <div class="brand-list font-color-black">
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            AGC 株式会社
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社<br>アマナデザイン
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            AMAN KYOTO
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            B&B Italia Tokyo
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            文喫 六本木
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            ディーン＆デルーカ <br>カフェ
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            ディーゼルジャパン<br>株式会社
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            日本航空株式会社
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            一般社団法人<br>日本ファッション・ウィーク<br>推進機構
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            カリモク家具<br>株式会社
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社 <br>光伸プランニング
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            MATSUMIDORI <br>BREWERY <br>CO., LTD
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            MOIWA RESORTS <br>OPERATION GK
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Moleskine
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社<br>中川ケミカル
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            ネストホテルジャパン<br>株式会社
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            PLUSTOKYO
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            日本仕事百貨
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            スパイラル / <br>株式会社<br>ワコールアートセンター
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社 竹尾
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            東急プラザ銀座
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            WeWork
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社ワールド
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社<br>ワールドプロダクション<br>パートナーズ
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            株式会社<br>ワールドスペース<br>ソリューションズ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">後援</span></div>
                                            <div class="col-right">
                                                <table class="table_col_right_text table_right_text"
                                                       style="white-space:nowrap">
                                                    <tr>
                                                        <td>
                                                            <div class="lb-text-color">イスラエル大使館</div>
                                                        </td>
                                                        <td>
                                                            <div class="lb-text-color">港区</div>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                </table>

                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">後援（サポーティングメディア）</span></div>
                                            <div class="col-right"><a target="_blank"
                                                                      href="https://www.j-wave.co.jp"><img
                                                            src="<?php echo URL_STATICS; ?>/images/about/logo/logo-jwave.png"
                                                            alt="logo-jwave"></a>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">メディアパートナー</span></div>
                                            <div class="col-right">
                                                <div class="brand-list">
                                                <div class="brand-item">
                                                    <div class="pic-wrap">

                                                        <a href="https://www.volvocars.com/jp/about/our-company/aoyama"
                                                           target="_blank">
                                                            <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-volvostudioaoyama.png"
                                                                 alt="logo-volvostudioaoyama">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="http://imhome-style.com" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-imhome.png"
                                                                    alt="logo-imhome">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://theartling.com/en/" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-theartling.png"
                                                                    alt="logo-theartling">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.elle.com/jp/decor/" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-elledecor_designwalk.png"
                                                                    alt="logo-elledecor_designwalk">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.japandesign.ne.jp" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-jdn.png"
                                                                    alt="logo-jdn">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.shotenkenchiku.com" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-shotenkenchiku.png"
                                                                    alt="logo-shotenkenchiku"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.timeout.jp/tokyo/ja" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-timeouttokyo.png"
                                                                    alt="logo-timeouttokyo"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.wwdjapan.com" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-wwdjapan.png"
                                                                    alt="logo-wwdjapan"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.dezeen.com" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-dezeen.png"
                                                                    alt="logo-dezeen"></a>
                                                    </div>
                                                </div>

                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="http://www.tokyoartbeat.com/index.ja"
                                                           target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-tokyoartbeat.png"
                                                                    alt="logo-tokyoartbeat"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.fashionsnap.com" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-fashionsnapcom.png"
                                                                    alt="logo-fashionsnapcom"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://www.pen-online.jp" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-pen.png"
                                                                    alt="logo-pen"></a>
                                                    </div>
                                                </div>
                                                <div class="brand-item">
                                                    <div class="pic-wrap">
                                                        <a href="https://madamefigaro.jp" target="_blank"><img
                                                                    src="<?php echo URL_STATICS; ?>/images/about/logo/logo-figaro.png"
                                                                    alt="logo-figaro"></a>
                                                    </div>
                                                </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="more-detail">

                                    </div>

                                </div><!-- ./end Outline -->

                            </div><!-- ./end About Outline -->
                            <!-- ./end About Outline -->


                            <!-- About Goods -->
                            <div class="wp-content" data-value="about-cafegoods">
                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        オフィシャルカフェ
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="heading-des official_cafe">
                                    <div class="left">
                                        <img src="<?php echo URL_STATICS; ?>/images/official/cafe_2.png"
                                             alt="Aoyama Area" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h3>街歩きで疲れたときに一息入れるならココ</h3><br>
                                        <div class="info">街を自由に歩きながら展示会場を巡るスタイルのDESIGNART TOKYO
                                            2019では、散策に疲れたときにぴったりのオフィシャルカフェをご用意。DEAN&DELUCA
                                            CAFEの青山、Echika表参道、六本木(マーケット除く)、渋谷ストリーム、東京音楽大学中目黒・代官山キャンパスの5軒では、会期中、DESIGNART限定ドリンク「アールグレイ洋ナシネクター」をご提供します。ネクターとは果実をすり潰して作られたジュースのこと。旬の洋ナシに、アールグレイ、バニラ、カルダモンの香りで風味付け。仕上げにザクロを加え、爽やかな酸味を加えています。当ブックレットをご持参の方は各種ドリンクの1サイズアップサービスが受けられます。（サイズ展開のあるドリンクに限る）ひと息つきながら、デザイン・アート談義する場としてご活用ください。


                                        </div>
                                    </div>
                                </div>
                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        店舗一覧
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="shoplist">
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="aoyama-area">
                                                <div class="wp-content-area">
                                                    <div class="title">ディーン＆デルーカ カフェ <span class="sub-title"> 青山</span>
                                                    </div>

                                                    <div class="address">
                                                        住所: 東京都港区北青山 3-2-2 <br/>
                                                        TEL: 03-5413-8748 <br/>
                                                        営業時間: 月-金 8:00 - 23:00 土日祝 8:00 - 22:00 <br/>

                                                        <a href="https://www.deandeluca.co.jp/ddshop/50029"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="jinguu-area">

                                                <div class="wp-content-area">

                                                    <div class="title">ディーン＆デルーカ カフェ Echika <span
                                                                class="sub-title"> 表参道</span></div>

                                                    <div class="address">
                                                        住所: 東京都港区北青山 3‒6‒12 東京メトロ表参道駅　Echika表参道<br/>
                                                        TEL: 03‒5413‒6863<br/>
                                                        営業時間: 月‒金 8:00 ‒ 22:00 土日祝 9:00 ‒ 22:00<br/>

                                                        <a href="https://www.deandeluca.co.jp/ddshop/50012"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">

                                                    <div class="title">ディーン＆デルーカ カフェ <span class="sub-title"> 六本木</span>
                                                    </div>

                                                    <div class="address">
                                                        住所: 東京都港区赤坂9-7-3 東京ミッドタウン B1<br/>
                                                        TEL: 03-5413-3585<br/>
                                                        営業時間：7:00 - 23:00 <br>
                                                        ※マーケット店舗は対象外です。<br/>

                                                        <a href="https://www.deandeluca.co.jp/ddshop/5003/"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">

                                                    <div class="title">ディーン＆デルーカ カフェ <span
                                                                class="sub-title"> 渋谷ストリーム</span>
                                                    </div>

                                                    <div class="address">
                                                        住所: 東京都渋谷区渋谷3-21-3渋谷ストリーム2F<br/>
                                                        TEL: 03-6427-3601<br/>
                                                        営業時間：7:00 - 22:00 <br>

                                                        <a href="https://www.deandeluca.co.jp/ddshop/50044"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">

                                                    <div class="title">ディーン＆デルーカ カフェ <span class="sub-title"> 東京音楽大学 中目黒・代官山キャンパス</span>
                                                    </div>

                                                    <div class="address">
                                                        住所: 東京都目黒区上目黒1-9 東京音楽大学中目黒・代官山キャンパス 3F<br/>
                                                        TEL: 03-6416-3431<br/>
                                                        営業時間：月-金 8:00 - 18:00 土日祝 9:00 - 18:00（不定休） <br>

                                                        <a href="https://www.deandeluca.co.jp/ddshop/50051/"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="pickup-aoyama" class="pickup">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">
                                            期間限定ドリンク
                                            <span class="line-middle"></span>
                                        </h2>
                                    </div>
                                    <ul class="wp-block-pickup">
                                        <li class="item-pickup">
                                            <div class="wp-image img-cafe">
                                                <img src="<?php echo URL_STATICS; ?>/images/official/cafe_1.png" alt=""
                                                     class="img-responsive ">
                                            </div>
                                            <div class="product">
                                                <h2 class="title">デザイナートトーキョー2019限定ドリンク<br>
                                                    アールグレイ洋ナシネクター</h2>
                                                <p class="description">
                                                    Non alcohol <br>SIZE S ¥540(税込)</p>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        オフィシャルグッズ
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="wp-section-goods" id="audio-guide1">
                                    <div class="area-section">
                                        <div class="title-head background-black">まずはオフィシャルガイドブックを持って、DESIGNART TOKYO
                                            2019を楽しもう！
                                        </div>
                                        <div class="wp-content-inner">
                                            <div class="wp-left">
                                                <div class="">
                                                    <img src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew.png"
                                                         alt="" class="img-responsive">
                                                </div>
                                            </div>
                                            <div class="wp-right">
                                                <div class="title">DESIGNART TOKYO 2019 <span
                                                            class="sub-title">公式タブロイド</span>
                                                </div>
                                                <div class="info-area">
                                                    DESIGNART TOKYO 2019のハイライト情報を掲載。<br><br>

                                                    <a href="" target="_blank"> <span
                                                                style="text-decoration: underline;">PDFをダウンロードする</span></a>
                                                </div>
                                                <div class="title">DESIGNART TOKYO 2019 <span class="sub-title">オフィシャルガイドブック</span>
                                                </div>
                                                <div class="info-area">
                                                    展示作品や公式プログラムの特集記事、
                                                    デザイナート誕生に至る発起人インタビューなどを掲載。
                                                    また、展示会場や建築紹介をまとめたマップを同封。
                                                    ガイドブックでデザイナートの楽しみ方が広がります！
                                                    <span style="padding: 8px 0 5px 0; display: block;">設置場所:</span>
                                                    <ul>
                                                        <li>各展示会場 / インフォメーションセンター / オフィシャルカフェなど</li>
                                                    </ul>
                                                    <br><br>
                                                    <a href="" target="_blank"><span
                                                                style="text-decoration: underline;">PDFをダウンロードする</span></a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wp-section-goods">
                                    <div class="area-section">
                                        <div class="title-head background-black">
                                            DESIGNARTロゴが特徴的なオリジナルTシャツ
                                        </div>
                                        <div class="wp-content-inner wp-content-img-left wp-content-img-left-1">
                                            <div class="wp-left">
                                                <div class="">
                                                    <img alt="" class="img-responsive"
                                                         src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew-02.png">
                                                </div>
                                            </div>
                                            <div class="wp-right">
                                                <div class="title-a">DESIGNART TOKYO 2019 <br/><span
                                                            class="sub-title">オフィシャル Tシャツ</span></div>
                                                <div class="info-area-a">
                                                    シンプルにロゴをあしらった今年のオフィシャルT シャツ

                                                    ブラックベースにゴールドのDESIGNART ロゴを大きくあし
                                                    らった、シンプルながらインパクトあるデザインに仕上がった今年の
                                                    オフィシャルT シャツ。
                                                    DESIGNART の発起人でもある川上シュン率いるartless が手
                                                    がけたこのロゴは、黒とゴールドというストイックなカラールールに
                                                    よる洗練に加え、枠が可変式というフレキシビリティの高さも大きな
                                                    特徴です。
                                                    会期中にこのT シャツを着ているスタッフを見かけたら、近隣の
                                                    情報やお困りの点などについてぜひお声がけください。
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wp-section-goods">
                                    <div class="area-section">
                                        <div class="title-head background-black">展示会場の目印はスタイリッシュなフラッグバッグ</div>
                                        <div class="wp-content-inner wp-content-img-left">
                                            <div class="left">
                                                <img src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew-05.png"
                                                     alt="" class="img-responsive">
                                            </div>
                                            <div class="right">
                                                <div class="title-a">DESIGNART TOKYO 2019 <br/><span class="sub-title">オフィシャルフラッグ</span>
                                                </div>
                                                <div class="info-area-a">
                                                    街中に点在するDESIGNARTの展示会場の目印となるのが、オフィシャルフラッグです。
                                                    今年は、ブラックとメタリックゴールドをベースにしたリバーシブル仕様にリニューアル。両方向からの視認性が高まり、会場がさらに見つけやすくなりました。ロゴを取り囲む図形のかたちは５種類あるのもユニーク。制作はサインやディスプレイのプロ集団、光伸プランニングが担当しています。
                                                    なお、昨年まで使用していたフラッグとフラッグスタンドも継続利用。DESIGNART
                                                    が初年度からコンセプトに掲げている持続可能性を体現しています。

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./end About CafeGoods -->


                            <!-- About Program -->
                            <div class="wp-content official program" data-value="about-program">
                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        オフィシャルプログラム
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="aoyama-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class="">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_1.png"
                                                             alt="Aoyama Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART FEATURE 1% for Art EXHIBITION</div>
                                                    <div class="info">
                                                        Design PierはDESIGNART TOKYOとのコラボレーションにより、1％ for
                                                        Artのプログラムとアジア各国のデザインスタジオによる非常に多様で創造的なデザインオブジェクトを展示します。<br>
                                                        <a href="http://designart.jp/designarttokyo2019/exhibitor/designartfeature/"
                                                           target="_blank">MORE INFO</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="jinguu-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class="">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_2.png"
                                                             alt="Roppongi Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">PARTNER COUNTRY ISRAEL</div>
                                                    <div class="info">
                                                        国際的なデザイン業界でも独特のDNAを育んできたイスラエルを、 DESIGNART TOKYO
                                                        2019のパートナーカントリーとしてご招待。<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img-small">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_3.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART GALLERY at TENOHA 代官山</div>
                                                    <div class="info">
                                                        「DESIGNART GALLERY@TENOHA DAIKANYAMA」は、デザインとアートの
                                                        領域を超え、ボーダレスで自由な創造性を追求し続けるクリエイターたちによるグ
                                                        ループエキシビジョンです。
                                                        <br><br>
                                                        Beyond molecular weight<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        FIL<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        「DECO」by Triple A / デザインイメージシート & VONDS RANSEL / 大沼 敦<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        TIMON<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        ハフトデザイン<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        カツキコネクション<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        炭酸デザイン室<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        荒木 宏介<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        タラマンプラス<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_4.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART GALLERY at リビングデザインセンターOZONE</div>
                                                    <div class="info">
                                                        今年で開館25 周年を迎えるリビングデザインセンターOZONE が、DESIGNART
                                                        TOKYO の新エリア新宿にて初参加します。1F
                                                        のギャラリー内では、ヨーロッパより複数のデザイナーやアーティストが各国それぞれの最新作品を展示します。
                                                        <br>
                                                        Creative Lithuania
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        Young Swedish Design
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_4.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART CREATIVE CONFERENCE BRIDGE</div>
                                                    <div class="info">
                                                        「DESIGNART CREATIVE CONFERENCE BRIDGE 」は
                                                        現在、そして来るべき未来に、デザインやアートは何ができるのか、みんなで考え、学び、意見を交換し合う場です。
                                                        <br>
                                                        開催日：10/20(日)<br>
                                                        場所：WeWork Iceberg<br>
                                                        住所：東京都渋谷区神宮前 6-12-1<br>
                                                        お申し込み：<br>
                                                        <a href="https://dat2019-conf.peatix.com/" target="_blank"
                                                           class="noborder">https://dat2019-conf.peatix.com/</a><br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_5.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">OPENING PARTY</div>
                                                    <div class="info">
                                                        誰もが参加できる、みんなでつくるデザインとアートの開幕イベント<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_5.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">CLOSING EVENT</div>
                                                    <div class="info">
                                                        PARTNER COUNTRY ISRAEL X DESIGNART TOKYO<br>
                                                        フェスティバルの終盤を締めくくるイベントでは新設の「DESIGNART AWARD」を発表！<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_6.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">FIVE ARTISTS UNDER THIRTY</div>
                                                    <div class="info">
                                                        デザイン＆アート界の未来を切り拓く５組<br><br>
                                                        チャーリン・チャン<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        阿部憲嗣<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        中野築月・西山愛香<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        ハミッド・シャヒ<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        M&T<br>
                                                        <a href="" target="_blank">MORE INFO</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_7.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">JOIN THE STAMP RALLY</div>
                                                    <div class="info">
                                                        スタンプラリーに参加して、豪華商品をゲット！<br><br>

                                                        1.マップをもらう <br>
                                                        スタンプラリーの台紙がついたDESIGNART T OKYO 2 019 A RE A M AP
                                                        を展示会場やインフォメーションセンターでゲット。<br><br>

                                                        2.スタンプを集めよう<br>
                                                        各展示会場を巡り、マップ裏面の該当箇所にスタンプを押して12 個集めよう。<br><br>

                                                        3.いざ！抽選に参加<br>
                                                        ワールド北青山ビルにあるインフォメーションセンターにて抽選に参加。
                                                        <br><br>

                                                        インフォメーションセンター <br>
                                                        ＠ワールド北青山ビル <br>
                                                        東京都港区北青山3-5-10<br>
                                                        開館10:00-18:00<br>
                                                        会期中無休<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./end About Program -->


                            <!-- About Credit -->
                            <div class="wp-content" data-value="about-credit">
                                <div class="wp-section-area">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">クレジット<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="brand-wrapp">
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">FOUNDERS / 発起人</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Akio Aoki / MIRU DESIGN</p>
                                                    <p class="info-group-item">Shun Kawakami / artless Inc.</p>
                                                    <p class="info-group-item">Mark Dytham / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Astrid Klein / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Hiroshi Koike / NON-GRID / IMG SRC</p>
                                                    <p class="info-group-item">Okisato Nagata / EXS</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">DESIGNART COMMITTEE / </br>
                                                    デザイナート実行委員会</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Kimiaki Tanigawa / Director</p>
                                                    <p class="info-group-item">Akio Aoki / Creative director</p>
                                                    <p class="info-group-item">Rika Yamada / PR Manager</p>
                                                    <p class="info-group-item">Yoko Yamazaki / Knot Japan</p>
                                                    <p class="info-group-item">Takashi Ono</p>
                                                    <p class="info-group-item">Takefumi Yamaguchi</p>
                                                    <p class="info-group-item">Kiyomi Watanabe</p>
                                                    <p class="info-group-item">Sakiko Kimura</p>
                                                    <p class="info-group-item">Kaori Kodama</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">DESIGNART MEMBERS / </br>
                                                    デザイナートメンバー</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Shun Kawakami / artless Inc. / Art
                                                        Director</p>
                                                    <p class="info-group-item">Kanako Ueno / artless Inc. / Designer</p>
                                                    <p class="info-group-item">Yasuyuki Fukuoka LABORATORY inc.</p>
                                                    <p class="info-group-item">Ryohei Sato LABORATORY inc. /
                                                        Designer</p>
                                                    <p class="info-group-item">Hiroshi Koike / NON-GRID, IMG SRC / Web
                                                        Creative Director</p>
                                                    <p class="info-group-item">Takuya Nishi / NON-GRID / Web
                                                        Director</p>
                                                    <p class="info-group-item">Junichi Okamoto / jojodesign Inc. /
                                                        Design & Coding</p>
                                                    <p class="info-group-item">Yukinari Hisayama / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Yumiko Fujiki / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Yuko Yoshikawa / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Wakako Tanjo / MIRU DESIGN</p>
                                                    <p class="info-group-item">Noriko Sasaki / MIRU DESIGN</p>
                                                    <p class="info-group-item">Rika Olivia Sakakibara / MIRU DESIGN</p>
                                                    <p class="info-group-item">Tomoko Kawasaki</p>
                                                    <p class="info-group-item">Keena Yoshida</p>
                                                    <p class="info-group-item">Miho Fujii</p>
                                                    <p class="info-group-item">Mei Iwasaki</p>
                                                    <p class="info-group-item">Rikako Takahashi</p>
                                                    <p class="info-group-item">Mai Okazaki</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">PRESS / プレス</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Ai Yoshida</p>
                                                    <p class="info-group-item">Hitomi Kodaka Rehearsal</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">INTERNATIONAL PR / </br>
                                                    インターナショナルPR</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Martin Webb COMMUNION</p>
                                                    <p class="info-group-item">Atsushi Yamauchi COMMUNION</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">THE OFFICIAL BOOKLETS & TABLOIDS / </br>
                                                    オフィシャルブックレット & タブロイド</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Toshiaki Ishii river / Editor in
                                                        Chief</p>
                                                    <p class="info-group-item">Masato Warita river</p>
                                                    <p class="info-group-item">Taku Kasuya Photographer</p>
                                                    <p class="info-group-item">Tohru Yuasa Photographer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">PHOTOGRAPHERS / フォトグラファー</span>
                                            </div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Keiko Chiba Nac.sa & Partners</p>
                                                    <p class="info-group-item">Futa Moriishi Nac.sa & Partners</p>
                                                    <p class="info-group-item">Donggyu Kim Nac.sa & Partners</p>
                                                    <p class="info-group-item">Kai Kanno Nac.sa & Partners</p>
                                                    <p class="info-group-item">Akira Arai Nac.sa & Partners</p>
                                                    <p class="info-group-item">Sakura Sueyoshi Nac.sa & Partners</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">TRANSLATORS / 翻訳</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Terrance Young</p>
                                                    <p class="info-group-item">Haruki Makio Fraze Craze Inc.</p>
                                                    <p class="info-group-item">Yayoi Morikawa Fraze Craze Inc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">WRITER / <br>  ライター</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Yuto Miyamoto</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">SUPPORTING MEMBERS / </br>
                                                    サポートメンバー</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Gwenael Nicolas</p>
                                                    <p class="info-group-item">Jungo Kanayama</p>
                                                    <p class="info-group-item">Masaki Yokokawa</p>
                                                    <p class="info-group-item">Masamichi Toyama</p>
                                                    <p class="info-group-item">Masatoshi Kumagai</p>
                                                    <p class="info-group-item">Mizuyo Yoshida</p>
                                                    <p class="info-group-item">Tatsuro Sato</p>
                                                    <p class="info-group-item">William To</p>
                                                    <p class="info-group-item">Yoshiko Ikoma</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">EVERLASTING MEMBER / エヴァーラスティングメンバー</span>
                                            </div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Dai Takeuchi</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="more-detail">

                                </div>
                            </div>
                            <!-- ./end About Credit -->

                        </div>
                    </div>


                </div>
            </div><!-- ./end .wp-tab -->

        </div>
    </section>
    <!-- 固定ページ入力ソースここから-->


    <!-- 固定ページ入力ソースここまで-->


    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_contact(); ?>
        </div>
    </div>

    <!-- landing-back-to-top -->
    <div class="wp-back-to-top-wrap">
        <div class="wp-back-to-top top2">
            <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
        </div>
    </div>

    <script src="<?php echo esc_url( URL_STATICS ) ?>/js/officialgoodcafe.js"></script>
    <script !src="">
        jQuery(function ($) {
            $(document).ready(function () {
                $('a[data-demo=item-0]').parent().addClass('current-menu-item');
            });


        })
    </script>
<?php get_footer( 'top2' ) ?>