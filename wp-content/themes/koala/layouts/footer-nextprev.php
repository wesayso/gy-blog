<?php 

	/**
	 * FOOTER - NEXT / PREV POST
	 */

	if(is_single()){

	$previous_post = get_previous_post();
	$next_post = get_next_post();

?>

	<section class="nextprev">
		<div class="wrapper-body">
			
			<?php if(!empty($previous_post)){
				$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'opengraph');
			?>
			<a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" class="nextprev-post previous">
				<?php if($thumb_url != ""){ ?>
				<div class="post-thumbnail">
					<div class="background" style="background-image:url('<?php echo esc_url($thumb_url[0]); ?>');"></div>
				</div>
				<?php } ?>
				<div class="info">
					<span><?php esc_html_e('Previous Post', 'koala'); ?></span>
					<h4><?php echo esc_html(get_the_title($previous_post->ID)); ?></h4>
				</div>
			</a>
			<?php } ?>

			<?php if(!empty($next_post)){
					$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'opengraph');
			?>
			<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nextprev-post next">
				<?php if($thumb_url != ""){ ?>
				<div class="post-thumbnail">
					<div class="background" style="background-image:url('<?php echo esc_url($thumb_url[0]); ?>');"></div>
				</div>
				<?php } ?>
				<div class="info">
					<span><?php esc_html_e('Next Post', 'koala'); ?></span>
					<h4><?php echo esc_html(get_the_title($next_post->ID)); ?></h4>
				</div>
			</a>
			<?php } ?>

		</div>
	</section>

<?php } ?>