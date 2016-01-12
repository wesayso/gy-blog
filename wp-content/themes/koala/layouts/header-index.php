<?php

	/**
	 * HEADER - INDEX
	 */

	if(koala_header_has_posts()){

?>

	<section class="header header-frontpage">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url(koala_get_slider_background());?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			
			<?php get_template_part('layouts/index-slider'); ?>
	
			<?php 
				if(is_front_page() && !is_paged()){
					get_template_part('layouts/index-grid'); 
				}
			?>

		</div>
	</section>

<?php } ?>