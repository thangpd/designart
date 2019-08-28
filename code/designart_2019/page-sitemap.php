<?php
	get_header('top2');
?>

<section class="site-map-page padding-tb-50">
	<div class="container">
				
		<div class="heading-title heading-style-01 padding-tb-50">		
			<div class="title-wrapp">
				<div class="first-letter">Site map</div>
				<h2 class="title case-1">Site map</h2>
			</div>
		</div>

		<div class="sitemap font-weight-auto">
			<ul class="first">
				<li>
					<a href="#">DESIGNART TOKYO 2018 TOP</a>
					<ul class="second">
						<li><a href="#"><?php echo translate_text_language('news') ?></a></li>
						<li class="has-child">
							<a href="#"><?php echo translate_text_language('about designart') ?></a>
							<ul class="third">
								<li><a href="<?php echo home_url() ?>/official/#official-cafe">
										offical cafe</a></li>
								<li><a href="<?php echo home_url() ?>/official/#official-goods">offical goods</a></li>
								<li><a href="<?php echo home_url() ?>/official/#official-program">program</a></li>
								<li><a href="<?php echo home_url() ?>/official/#official-other">special support</a></li>
							</ul>
						</li>
						<li><a href="<?php echo home_url() ?>/exhibitor/"><?php echo translate_text_language('exhibitor') ?></a></li>
						<li><a href="<?php echo home_url() ?>/event-party/"><?php echo translate_text_language('event &amp; party') ?></a></li>
						<li class="has-child c-3">
							<a href="#"><?php echo translate_text_language('access') ?></a>
							<ul class="third">
								<li><a href="<?php echo home_url() ?>/access/"><?php echo translate_text_language('access to exhibit area') ?></a></li>
								<li><a href="<?php echo home_url() ?>/access/exhibitorguide/"><?php echo translate_text_language('exhibition guide') ?></a></li>
								<li><a href="<?php echo home_url() ?>/access/architecture/"><?php echo translate_text_language('architecture guide') ?></a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="landing-st contact-st">
			<div class="container">
				<?php get_html_contact(); ?>
			</div>
    	</div>

		

	</div>
</section>



<?php get_html_banner_page(false) ?>

<div class="wp-back-to-top top2 show">
	<span class="line"></span>
	<span class="text">TOP</span>
</div>

<script !src="">
    jQuery(function ($) {
        $(document).ready(function(){
            $('a[data-demo=item-1]').parent().addClass('current-menu-item');
        });
    })
</script>
<?php
	get_footer('top2');
?>
