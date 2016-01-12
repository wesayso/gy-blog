<?php 

	/**
	 * ARCHIVE TEMPLATE
	 */

	get_header(); 

?>

	<section class="header header-category">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url(koala_get_header_background());?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<div class="categorytitle">
				<h1>
					<i class="fa fa-clock-o"></i>
					<?php 
						if(is_day()){ 
							esc_html(the_time('F jS, Y'));
						}elseif(is_month()){ 
							esc_html(the_time('F, Y')); 
						}elseif(is_year()){ 
							esc_html(the_time('Y')); 
						};
					?>
				</h1>
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