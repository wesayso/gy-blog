<?php 

	/**
	 * INDEX - GRID
	 */

	$grid_posts = koala_get_grid_posts();

	if(count($grid_posts) > 0){

		$post_count = 0;

?>

	<section class="post-grid">

		<?php
			foreach($grid_posts as $post){
			setup_postdata($post); 
			$post_count++;
			$post_image = null;
			$koala_postfeature_meta = get_post_meta($post->ID, 'koala_postfeature', true);
			if(has_post_thumbnail()){
				$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
				$post_image = $post_image[0];
			}
		?>
		<section class="post <?php if($post_count == 1) echo "post-featured post-double"; if($koala_postfeature_meta == "postfeature-postgridfeatured") echo " post-featured"; ?>">
			<div class="background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
			<div class="shadow"></div>
			<div class="post-content">
				<?php koala_get_category(); ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<hr>
				<p class="excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 260, '...'); ?></p>
				<ul class="meta">
					<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
					<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
				</ul>
			</div>
		</section>
		<?php } ?>

	</section>

<?php
	
	}

	wp_reset_postdata();

?>