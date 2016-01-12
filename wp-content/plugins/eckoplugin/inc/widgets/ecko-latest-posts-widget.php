<?php

	/*-----------------------------------------------------------------------------------*/
	/* LATEST POSTS WIDGET
	/*-----------------------------------------------------------------------------------*/

	class ecko_widget_latest_posts extends WP_Widget{

		function __construct(){
			parent::__construct(
				'ecko_widget_latest_posts', 
				'Ecko Latest Posts', 
				array('description' => 'Display the latest blog posts.')
			);
		}

		public function widget($args, $instance){
			global $post;
			$active_post = 0;
			if(is_single()){ $active_post = $post->ID; }
			$ecko_latest_posts = array(
				'numberposts' 	=> $instance['postcount'],
				'meta_key'    	=> '_thumbnail_id',
				'post__not_in' 	=> array($active_post)
			);
			if(!isset($instance['allformats'])){
				$ecko_latest_posts['tax_query'] = array(
					array(
						'taxonomy' 	=> 'post_format',
						'field' 	=> 'slug',
						'terms' 	=> array( 
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video'
						),
						'operator' 	=> 'NOT IN'
					)
				);
			}
			$ecko_latest_posts = get_posts($ecko_latest_posts);
			if(count($ecko_latest_posts) > 0){ ?>
				<section class="widget latestposts">
					<?php if($instance['title'] != ''){ ?>
						<h3 class="widget-title"><?php echo esc_html($instance['title']); ?></h3>
						<hr>
					<?php }
						foreach($ecko_latest_posts as $post) : setup_postdata($post); 
							$ecko_thumb_id = get_post_thumbnail_id();
							$ecko_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
							$ecko_category = get_the_category();
					?>
						<article class="post">
							<div class="top">
								<a href="<?php esc_url(the_permalink()); ?>" class="thumbnail">
									<i class="fa fa-link"></i>
									<span style="background-image:url('<?php echo esc_url($ecko_thumb_url[0]); ?>');"></span>
								</a>
								<div class="info">
									<?php 
										if($ecko_category){
											echo '<a href="' . esc_url(get_category_link($ecko_category[0]->term_id)) . '" class="button rounded grayoutline tiny category">' . esc_html($ecko_category[0]->name) . '</a> ';
										} 
									?>
									<h5 class="title"><a href="<?php esc_url(the_permalink()); ?>"><?php if(mb_strlen(get_the_title()) > 50) { echo esc_html(mb_substr(get_the_title(), 0, 50)) . "..."; } else { esc_html(the_title()); } ?></a></h5>
									<section class="meta">
										<span class="posted"><?php esc_html_e('Posted', ECKO_PLUGIN_ID); ?> </span>
										<span class="author"><span><?php esc_html_e('by', ECKO_PLUGIN_ID); ?></span> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID'))); ?>"><img src="//0.gravatar.com/avatar/<?php echo esc_attr(md5(get_the_author_meta('user_email'))); ?>?s=24" class="gravatarsmall" alt=""> <?php the_author(); ?></a></span> 
										<span class="date"><span><?php esc_html_e('on', ECKO_PLUGIN_ID); ?></span> <a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i> <time datetime="<?php the_time('Y-m-d'); ?>"><?php if(function_exists('ecko_date_format')){ echo esc_html(ecko_date_format()); }else{ the_date(); } ?></time></a></span>
									</section>
								</div>
							</div>
							<p class="excerpt"><?php if(function_exists('ecko_truncate_by_words')){ echo esc_html(ecko_truncate_by_words(get_the_excerpt(), 130, '...')); }else{ the_excerpt(); } ?></p>
						</article>
					<?php 
						endforeach; 
						wp_reset_postdata();
					?>
				</section>
			<?php
			}
		}

		public function form($instance){ 
			$defaults = array( 
				'title' 	=> '',
				'postcount' => '3',
				'allformats' => false
			);
			$instance = wp_parse_args((array)$instance, $defaults);
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">Title: </label> 
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('postcount'); ?>">Number of Posts to show: </label> 
					<input class="widefat" id="<?php echo $this->get_field_id('postcount'); ?>" name="<?php echo $this->get_field_name('postcount'); ?>" type="number" value="<?php echo esc_attr($instance['postcount']); ?>" min="1" max="6" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('allformats'); ?>">Show All Post Formats: </label> 
					<input id="<?php echo $this->get_field_id('allformats'); ?>" name="<?php echo $this->get_field_name('allformats'); ?>" type="checkbox" <?php checked($instance['allformats'], 'on'); ?> />
				</p>
			<?php
		}
			
		public function update($new_instance, $old_instance){ 
			$instance = array();
			foreach($new_instance as $key => $value){
				$instance[$key] = (!empty($new_instance[$key])) ? strip_tags($new_instance[$key]) : '';
			}
			return $instance;
		}

	}

?>