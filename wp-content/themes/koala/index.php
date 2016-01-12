<?php 

	/**
	 * INDEX TEMPLATE
	 */

	get_header();

?>

	<?php get_template_part('layouts/header-index'); ?>

	<section class="page-content">
		<div class="wrapper-body">
			
			<div class="page-main">
				
				<?php get_template_part('layouts/postlist'); ?>

			</div>

			<?php get_template_part('sidebar'); ?>

		</div>
	</section>

<?php get_footer(); ?>