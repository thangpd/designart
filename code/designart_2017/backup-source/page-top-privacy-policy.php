<?php get_header('top') ?>
<div class="privacy-page black access-page padding-tb-50">
	<div class="container">
        <!-- title -->
		<div class="heading-title heading-style-01 padding-tb-50">
			<div class="title-wrapp">
				<h2 class="title-privacy">Privacy Policy</h2>
			</div>
		</div>
		<!-- description -->
		<div class="description-privacy">
			<p>DESIGNART実行委員会では、個人情報を適切に管理するため、以下のプライバシーポリシーを定め、運用いたします。</p>
			<p>1．個人情報の収集について <br />個人情報の収集は、本人に利用目的をあらかじめお知らせし、ご了解を得た上で、その目的の達成に必要な範囲で実施いたします。</p>
			<p>2．個人情報の利用および提供について <br /> 収集した個人情報は、本人の了解を得た場合、個人を識別あるいは特定できない状態に加工して利用する場合、法令等により提供を求められた場合を除き、本来の利用目的の範囲を超えて利用いたしません。また、法令等による場合を除き、本人の許可なく、その情報を第3者に提供いたしません。</p>
			<p>3．個人情報の適正管理について <br />収集した個人情報は、正確かつ最新の状態に保ち、漏えい、紛失、破壊、改ざん及び不正なアクセスを防止することに努めます。</p>
			<p>4．委託先の監督<br /> 個人情報の利用を含む業務を第３者に委託する場合、委託先へ個人情報の厳重管理を義務付け、監督いたします。</p>
			<p>5．個人情報の確認・修正等について 個人情報について<br />本人による開示が求められた場合には、速やかに内容を確認し、対応いたします。また、内容が事実でないなどの理由で訂正を求められた場合も、調査し適切に対応いたします。</p>
			<p>6．法令の遵守と個人情報保護の仕組みの改善<br /> 当委員会は、個人情報の保護に関する日本の法令、その他の規範を遵守するとともに、上記の各項目の見直しを適宜行い、個人情報保護の仕組みの継続的な改善を図ります。<br />個人情報の利用目的 <br /></p>
			<p>当委員会は、DESIGNARTに関する情報のご案内、いただいたお問い合わせへの対応に必要な範囲内で個人情報を利用いたします。</p>
		</div>
		<div class="heading-title heading-style-02">
			<h2 class="title upper-text color-primary"> CONTACT US<span class="line-middle"></span></h2>
		</div>
		<div class="box-info last">
			<p class="color-primary">DESIGNART実行委員会総合窓口</p>
			<p class="last">〒150-0011<br>住所: 東京都渋谷区神南4-2-34<br>TEL 03-1111-1111<br>info@designart.jp</p>
		</div>
	</div>
</div>
<section id="contact" class="section contact-area section-4 ">
	<div class="wp-bg-skew wp-padding">
		<div class="wp-ds-ldpage">
			<div class="wp-block-contact landing-st contact-st">
				<div class="title first">Contact</div>
				<div class="text-center group-btn">
					<a href="#" class="btn btn-bg black">Contact about DESIGNART <i class="icons fa fa-angle-right"></i></a>
					<a href="#" class="btn btn-bg black">Contact about Press <i class="icons fa fa-angle-right"></i></a>
				</div>
                <?php $url_page = get_url_page(); ?>
				<div class="text-center padding-tb-30">
					<div class="title second">Share</div>
					<div class="social-list">
		                <a target="_blank" href="https://twitter.com/home?status=<?php echo $url_page ?>" class="social-item"><i class="fa fa-twitter"></i></a>
		                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_page ?>" class="social-item"><i class="fa fa-facebook-official"></i></a>
		                <a target="_blank" href="https://plus.google.com/share?url=<?php echo $url_page ?>" class="social-item"><i class="fa fa-google-plus"></i></a>
		            </div>
				</div>
				<div class="landing-st logo-st">
			        <figure>
			            <img src="<?php echo URL_STATICS; ?>/images/about/label-ontrip-bold.png" alt="" class="img-responsive">
			            <figcaption class="name">Official App</figcaption>
			        </figure>
			        <figure>
			            <img src="<?php echo URL_STATICS; ?>/images/about/book-lista.png" alt="" class="img-responsive">
			            <figcaption class="name">BookLista</figcaption>
			        </figure>
			    </div>
			</div> 
		</div>
	</div>
</section>
<?php get_footer('top') ?>