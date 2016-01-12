<?php 

	/**
	 * ERROR 404 TEMPLATE
	 */

	get_header();

?>

	<section class="header header-error">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url(koala_get_header_background());?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<div class="errortitle">
				<h1>404: <?php esc_html_e('Page Not Found', 'koala'); ?></h1>
				<hr>
				<p><?php esc_html_e('The page you were looking for cannot be found, it may have been moved or no longer exists. The search below may help you find the desired page, or you can navigate back to the homepage by clicking ', 'koala'); ?> <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e('here', 'koala'); ?></a>.</p>
			</div>
			<div class="searchfield">
				<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
					<i class="fa fa-search"></i>
					<input type="text" value="" name="s" class="query" placeholder="<?php esc_attr_e('Enter Search Query...', 'koala'); ?>" autocomplete="off">
					<span><?php esc_attr_e('Search', 'koala'); ?></span>
				</form>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>