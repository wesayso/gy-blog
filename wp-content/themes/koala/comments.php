<?php
 
	/**
	 * COMMENTS TEMPLATE
	 */

?>

	<?php if(comments_open() != false): ?>

	<section class="post-comments">

		<a class="commentanchor" id="comments"></a>

		<div class="post-footer-header">
			<h3><i class="fa fa-comment-o"></i><?php esc_html_e('Comments', 'koala'); ?></h3>
		</div>

		<div class="comments-main">

			<?php

				if('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
					die (esc_html__('Please do not load this page directly.', 'koala'));
				}

				if(post_password_required()){
					return;
				}

			?>

			<?php if(have_comments()): ?>

				<ul class="commentwrap">
					<?php wp_list_comments('type=comment&callback=koala_comment_format'); ?>
				</ul>

				<?php previous_comments_link() ?>
				<?php next_comments_link() ?>

			 <?php else : ?>
				<?php if(comments_open()): ?>
					
					<div class="commentwrap">
						<div class="notification nocomments"><i class="fa fa-info"></i> <?php esc_html_e('There are currently no comments.', 'koala'); ?></div>
					</div>

				<?php endif; ?>
			<?php endif; ?>

			<?php

				if(comments_open()){
					$args = array(
						'id_form'           => 'commentform',
						'id_submit'         => 'submit',
						'title_reply'       => '',
						'title_reply_to'    => '<div class="notification"><i class="fa fa-comments-o"></i>' . esc_html__('Leave a Reply to', 'koala') . ' %s' . '</div>',
						'cancel_reply_link' => esc_html__('Cancel Reply', 'koala'),
						'label_submit'      => esc_html__('Post Comment', 'koala'),
						'comment_field' =>  '<textarea placeholder="' . esc_attr__('Add your comment here', 'koala') . '..." name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea>',
						'comment_notes_after' => '',
						'comment_notes_before' => '',
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' =>
								'<input type="text" placeholder="' . esc_attr__('Name', 'koala') . ' ' . ( $req ?  '(' . esc_attr__('Required', 'koala') . ')' : '') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',
							'email' =>
								'<input type="text" placeholder="' . esc_attr__('Email', 'koala') . ' ' . ( $req ? '(' . esc_attr__('Required', 'koala') . ')' : '') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',
							'url' =>
								'<input type="text" placeholder="' . esc_attr__('Website URL', 'koala') . '" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="1" />'
							)
						)

					);
					comment_form($args);
				}

			?>

		</div>

		<?php get_template_part('layouts/footer'); ?>

	</section>

<?php endif; ?>