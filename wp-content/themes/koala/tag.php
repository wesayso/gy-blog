<?php
 
	/**
	 * TAG TEMPLATE
	 */

	get_header();

	$background_image = (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url(get_query_var('tag_id')) != "" ? z_taxonomy_image_url(get_query_var('tag_id')) : koala_get_header_background());

?>

	<section class="header header-category">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url($background_image); ?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<div class="categorytitle">
				<h1><i class="fa fa-tags"></i><?php esc_html(single_tag_title()); ?></h1>
			</div>
		</div>
	</section>

	<section class="page-content">
		<div class="wrapper-body">
			
			<div class="page-main">
				<?php get_template_part('layouts/postlist'); ?>
			</div>

			<?php get_template_part('sidebar'); ?>

		</div>
	</section>
	
<?php get_footer(); ?>