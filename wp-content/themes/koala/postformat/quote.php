<?php

	/**
	 * POST FORMAT - QUOTE
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-content">
			<ul class="meta">
				<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
				<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
				<li class="pinned"><i class="fa fa-thumb-tack"></i></li>
			</ul>
			<?php echo the_content(); ?>
		</div>
	</article>
