<?php 

	/**
	 * INDEX - SLIDER
	 */

	$slider_posts = koala_get_slider_posts();

	if(count($slider_posts) > 0){

?>

	<section class="post-slider">	
		<span class="previous-post"><i class="fa fa-chevron-left"></i></span>
		<div class="post-slider-container">

			<?php
				foreach($slider_posts as $post){
				setup_postdata($post); 
				$post_image = null;
				if(has_post_thumbnail()){
					$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
					$post_image = $post_image[0];
				}
			?>
			<article class="post-slider-post" data-background="<?php echo esc_url($post_image); ?>">
				<?php koala_get_category(); ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<hr>
				<p class="excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 320, '...'); ?></p>
				<ul class="meta">
					<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
					<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
					<li class="comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%'); ?></a></li>
				</ul>
			</article>
			<?php } ?>

		</div>
		<span class="next-post"><i class="fa fa-chevron-right"></i></span>
	</section>

<?php
	
	}

	wp_reset_postdata();

?>