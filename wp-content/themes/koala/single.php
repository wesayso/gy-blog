<?php 

	/**
	 * SINGLE TEMPLATE
	 */

	get_header();

?>

	<?php while(have_posts()) : the_post(); ?>
	
		<?php get_template_part('layouts/header-post'); ?>

		<section class="page-content">
			<div class="wrapper-body">
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('page-main'); ?>>

					<?php get_template_part('layouts/header-post-inline'); ?>
					
					<section class="post-contents">

						<?php the_content(); ?>

						<div class="post-numbers">
							<?php wp_link_pages(); ?>
						</div>
						
						<?php get_template_part('layouts/post-footer'); ?>

					</section>

					<?php get_template_part('layouts/author-profile'); ?>

					<?php get_template_part('layouts/post-related'); ?>

					<?php comments_template('', true); ?>

				</div>

				<?php get_template_part('sidebar'); ?>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>