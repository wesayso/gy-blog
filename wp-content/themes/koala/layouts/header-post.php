<?php 

	/**
	 * SINGLE TEMPLATE
	 */

	$koala_postheader_meta = get_post_meta($post->ID, 'koala_postheader', true);

	$header_class = "";
	switch($koala_postheader_meta){
		case "postheader-cover":
			$header_class = "header-post";
			break;
		case "postheader-banner":
			$header_class = "header-post-small";
			break;
	}

	if($header_class !== ""){

		$post_image = null;
		if(has_post_thumbnail()){
			$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
			$post_image = $post_image[0];
		}

?>

	<section class="header <?php echo esc_attr($header_class); ?>">
		<?php include(locate_template('layouts/top-bar.php')); ?>
		<div class="background post-slider-background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
		<div class="shadow"></div>
		<div class="wrapper-body">
			<section class="post-title post-title-header">
				<?php koala_get_category(); ?>
				<h1 itemprop="name headline"><?php the_title(); ?></h1>
				<hr>
				<ul class="meta">
					<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
					<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
					<li class="comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%'); ?></a></li>
				</ul>
			</section>
			<div class="scrolltocontent">
				<i class="fa fa-angle-double-down"></i>
			</div>
		</div>
	</section>

<?php } ?>