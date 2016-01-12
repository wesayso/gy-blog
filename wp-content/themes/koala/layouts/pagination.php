<?php 

	/**
	 * PAGINATION
	 */
	
	if ($wp_query->max_num_pages > 1){

?>

	<nav class="pagination">
		<div class="wrapper-body">
			<?php previous_posts_link('<span class="sub"><i class="fa fa-chevron-left"></i></span><span class="main">' . esc_html__('Newer Posts', 'koala') . '</span>'); ?>
			<?php ecko_paging_nav(); ?>
			<?php next_posts_link('<span class="main">' . esc_html__('Older Posts', 'koala') . '</span><span class="sub"><i class="fa fa-chevron-right"></i></span>'); ?>
		</div>
	</nav>

<?php }elseif(!is_404()){ ?>

	<div class="notification noresults"><i class="fa fa-info"></i> <?php esc_html_e('No More Results', 'koala'); ?></div>

<?php } ?>