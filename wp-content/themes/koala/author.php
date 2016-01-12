<?php 

	/**
	 * AUTHOR TEMPLATE
	 */

	get_header(); 

?>

	<section class="header header-author">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url(koala_get_header_background());?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<?php get_template_part('layouts/author-profile'); ?>
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