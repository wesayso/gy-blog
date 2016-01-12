<?php

	/**
	 * POST FORMAT - VIDEO
	 */
	
	$post_image = null;
	if(has_post_thumbnail()){
		$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single');
		$post_image = $post_image[0];
	}
	
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail">
			<?php 
				$content = do_shortcode(apply_filters('the_content', $post->post_content));
				$media = get_media_embedded_in_content($content);
				if(isset($media[0])){ echo balanceTags($media[0]); }
			?>
		</div>
		<div class="post-content">
			<?php koala_get_category(); ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<hr>
			<p class="excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 260, '...'); ?></p>
			<ul class="meta">
				<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
				<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
				<li class="comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="pinned"><i class="fa fa-thumb-tack"></i></li>
				<li class="readmore"><a href="<?php the_permalink(); ?>"><i class="fa fa-chevron-circle-right"></i><?php esc_html_e('Read More...', 'koala'); ?></a></li>
			</ul>
		</div>
	</article>