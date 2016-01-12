<?php 

	/**
	 * SINGLE TEMPLATE
	 */

	$koala_postheader_meta = get_post_meta($post->ID, 'koala_postheader', true);

	if($koala_postheader_meta == "postheader-standard" || $koala_postheader_meta == ""){

?>

	<section class="post-title post-title-standard">
		<?php koala_get_category(); ?>
		<h1 itemprop="name headline"><?php the_title(); ?></h1>
		<ul class="meta">
			<li class="author"><a href="<?php ecko_get_author_url(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
			<li class="date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
			<li class="comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number('0', '1', '%'); ?></a></li>
		</ul>
		<hr>
	</section>


<?php } ?>