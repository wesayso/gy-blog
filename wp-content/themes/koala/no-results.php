<?php
 
	/**
	 * NO-RESULTS TEMPLATE
	 */

?>

	<section class="post-list">

		<?php if(is_search()){ ?>

			<div class="notification"><i class="fa fa-info"></i> <?php esc_html_e('No Result', 'koala'); ?>: <?php esc_html_e('Please try another search query.', 'koala'); ?></div>

		<?php }else{ ?>

			<div class="notification"><i class="fa fa-info"></i> <?php esc_html_e('No Result', 'koala'); ?>: <?php esc_html_e('Please try another query.', 'koala'); ?></div>

		<?php } ?>

	</section>