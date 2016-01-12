<?php

	/**
	 * POST FORMAT - IMAGE
	 */
	
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-style-banner'); ?>>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" class="overlay">
				<span><i class="fa fa-caret-right"></i><?php esc_html_e('Read Article', 'koala'); ?></span>
			</a>
			<div class="post-featured-image" style="background-image:url('<?php echo esc_url(ecko_get_first_image()); ?>');"></div>
			<?php koala_get_category(); ?>
		</div>
		<div class="post-content">
			<?php koala_get_category(); ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<hr>
			<p class="excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 230, '...'); ?></p>
			<ul class="meta">
				<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
				<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
				<li class="comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="pinned"><i class="fa fa-thumb-tack"></i></li>
				<li class="readmore"><a href="<?php the_permalink(); ?>"><i class="fa fa-chevron-circle-right"></i><?php esc_html_e('Read More...', 'koala'); ?></a></li>
			</ul>
		</div>
	</article>
