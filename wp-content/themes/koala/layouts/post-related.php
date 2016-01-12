<?php 

	/**
	 * POST - RELATED
	 */

	global $post;

	$related_posts = ecko_get_related_posts($post->ID, 3, true, true);
	$related_posts_count = count($related_posts);

	if($related_posts_count > 0){

?>

	<section class="post-related post-related-count-<?php echo esc_attr($related_posts_count); ?>">
		<div class="post-footer-header">
			<h3><i class="fa fa-newspaper-o"></i><?php esc_html_e('Related Articles', 'koala'); ?></h3>
		</div>

		<?php
			foreach($related_posts as $post){
			setup_postdata($post); 
			$post_image = null;
			if(has_post_thumbnail()){
				$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'sidebar');
				$post_image = $post_image[0];
			}
		?>
		<a href="<?php the_permalink(); ?>" class="post-related-post">
			<div class="background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
			<div class="info">
				<?php koala_get_category(true); ?>
				<h5><?php the_title(); ?></h5>
			</div>
		</a>
		<?php } ?>

	</section>

<?php 

	} 

	wp_reset_postdata();

?>