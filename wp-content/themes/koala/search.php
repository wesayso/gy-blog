<?php 

	/**
	 * SEARCH TEMPLATE
	 */

	get_header(); 

	global $wp_query;

?>

	<section class="header header-search">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url(koala_get_header_background());?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<div class="searchfield">
				<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
					<i class="fa fa-search"></i>
					<input type="text" value="" name="s" class="query" placeholder="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off">
					<span class="submit"><?php esc_attr_e('Search', 'koala'); ?></span>
				</form>
				<div class="results">
					(<?php echo esc_html($wp_query->post_count); ?> <?php esc_attr_e('Results', 'koala'); ?>)
				</div>
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