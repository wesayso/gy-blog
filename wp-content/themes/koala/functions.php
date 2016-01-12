<?php

	/**
	 * 
	 * 	KOALA THEME
	 *
	 * 	@author EckoThemes <support@ecko.me>
	 * 	@version 2.1.4
	 * 	@link http://ecko.me
	 * 
	 */


	/*-----------------------------------------------------------------------------------*/
	/* CONFIGURATION
	/*-----------------------------------------------------------------------------------*/

	/*
	 *	THEME INFO
	 */
	define('ECKO_THEME', true);
	define('ECKO_THEME_ID', 'koala');
	define('ECKO_THEME_NAME', 'Koala');
	define('ECKO_THEME_VERSION', '2.1.4');
	define('ECKO_THEME_WIDTH', '860');
	define('ECKO_DATE_FORMAT', 'jS M \'y');

	/*
	 *	TYPOGRAPHY
	 */
	DEFINE('ECKO_FONT_BODY_FAMILY', "Muli");
	DEFINE('ECKO_FONT_BODY_WEIGHT', "400,700");
	DEFINE('ECKO_FONT_BODY_SELECTOR', "body, p, .widget .rssSummary");
	DEFINE('ECKO_FONT_BODY_ALT_FAMILY', "Varela Round");
	DEFINE('ECKO_FONT_BODY_ALT_WEIGHT', "400");
	DEFINE('ECKO_FONT_BODY_ALT_SELECTOR', ".copyright .disclaimer p.main, .copyright .disclaimer p.alt, .nextprev h4, .widget.twitter .text, .widget.latestposts h5, .widget.relatedposts h4, .widget.randomposts, .widget li");
	DEFINE('ECKO_FONT_HEADER_FAMILY', "Bitter");
	DEFINE('ECKO_FONT_HEADER_WEIGHT', "400");
	DEFINE('ECKO_FONT_HEADER_SELECTOR', "h1, h2, h3, .header-author .post-author-profile .meta h3, .format-quote .post-content blockquote p, .post-related h5, .widget.authorprofile .meta h3");
	DEFINE('ECKO_FONT_SUB_HEADER_FAMILY', "Montserrat");
	DEFINE('ECKO_FONT_SUB_HEADER_WEIGHT', "400");
	DEFINE('ECKO_FONT_SUB_HEADER_SELECTOR', ".post-author-profile .meta .title, .post-author-profile .meta .twittertag, .post-author-profile .meta h3, .comment .isauthor, .comment .meta, .comment .comment-reply-link, .comment h4, .comment-respond #cancel-comment-reply-link, .comment-respond textarea, .comment-respond input, .copyright .social li, .notification , h4, h5, h6, input, .header .searchfield span, .header .searchfield .results, .nextprev span, nav.pagination .previous, nav.pagination .next, nav.pagination ul.page-numbers li, .post-contents blockquote, .post-footer .post-tags a, .post-footer .post-social-share .title, .post-footer-header h3, .post-grid .post .category, .post-grid .post .meta a, .post-list .post .post-thumbnail .overlay, .post-list .post .category, .post-list .post .meta a, .post-slider .post-slider-post .category, .post-slider .post-slider-post .meta a, .post-contents blockquote, .post-footer .post-tags a, .post-footer .post-social-share .title, .post-footer-header h3, .post-grid .post .category, .post-grid .post .meta a, .post-list .post .post-thumbnail .overlay, .post-list .post .category, .post-list .post .meta a, .post-slider .post-slider-post .category, .post-slider .post-slider-post .meta a, .post-title .category, .post-title .meta a, .post-related .meta, .top-bar .logo h2, .top-bar nav ul a, .top-bar nav ul span, .top-bar .responsivemenu li, .top-bar .searchbar, .widget h3, .widget li span.count, .widget.authorprofile .meta .title, .widget.authorprofile .meta .twittertag, .widget .tagcloud a, .widget.twitter .author, .widget.twitter .date, .widget.subscribe input[type=\"submit\"], .widget.socialshare .sharebutton, .widget.latestposts .meta, .widget.relatedposts .feature:after, .widget.randomposts .feature:after, .widget.relatedposts .category, .widget.randomposts .category, .widget.relatedposts .meta, .widget.randomposts .meta, .widget.navigation li, #wp-calendar, .footer-widgets .widget h3");

	/*
	 *	WIDGETS
	 */
	define('ECKO_WIDGET_ADVERTISMENT', true);
	define('ECKO_WIDGET_AUTHOR_PROFILE', true);
	define('ECKO_WIDGET_BLOG_INFO', true);
	define('ECKO_WIDGET_LATEST_POSTS', true);
	define('ECKO_WIDGET_NAVIGATION', true);
	define('ECKO_WIDGET_RANDOM_POSTS', true);
	define('ECKO_WIDGET_RELATED_POSTS', true);
	define('ECKO_WIDGET_SHARE', true);
	define('ECKO_WIDGET_SOCIAL_AUTHOR', true);
	define('ECKO_WIDGET_SOCIAL_BLOG', true);
	define('ECKO_WIDGET_SUBSCRIBE', true);
	define('ECKO_WIDGET_TWITTER', true);


	/*-----------------------------------------------------------------------------------*/
	/* FRAMEWORK
	/*-----------------------------------------------------------------------------------*/

	require_once get_template_directory() . '/inc/eckoframework/eckoframework.php';


	/*-----------------------------------------------------------------------------------*/
	/* THEME SETUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_theme_setup')){
		function koala_theme_setup(){
			add_theme_support('post-formats', array('status', 'aside', 'image', 'video', 'audio', 'gallery', 'quote', 'link'));
			register_nav_menus( 
				array(
					'primary' => esc_attr__('Primary Menu', 'koala')
				)
			);
		}
	}
	add_action('after_setup_theme', 'koala_theme_setup');


	/*-----------------------------------------------------------------------------------*/
	/* ENQUE FONTS, STYLES AND SCRIPTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_load_scripts')){
		function koala_load_scripts(){
			if(!is_admin()){
				// JAVASCRIPT VARS
				wp_localize_script('ecko_js', 'ecko_theme_vars', array(
					'general_hidecomments' => esc_js(get_theme_mod('general_hidecomments', 'false')),
					'general_disable_syntax_highlighter' => esc_js(get_theme_mod('general_disable_syntax_highlighter', 'false')),
					'topbar_disable_sticky' => esc_js(get_theme_mod('topbar_disable_sticky', 'false')),
					'postpage_enable_cover_fade' => esc_js(get_theme_mod('postpage_enable_cover_fade', 'false'))
				));
			}
		}
	}
	add_action('wp_enqueue_scripts', 'koala_load_scripts');


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER THEME RECOMMENDED PLUGINS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_register_plugins')){
		function koala_register_plugins(){
			$ecko_plugins = ecko_default_plugins();
			array_push($ecko_plugins, array(
				'name'      => 'Categories Images',
				'slug'      => 'categories-images',
				'required'  => false,
			));
			tgmpa($ecko_plugins);
		}
	}
	add_action('tgmpa_register', 'koala_register_plugins');


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER SIDEBARS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_widgets_init')){
		function koala_widgets_init(){
			register_sidebar(array(
				'name' => 'Footer (Max 3. Widgets)',
				'id' => 'footer',
				'description' => 'Appears in footer on all pages. Maximum of 3 widgets supported.',
				'before_widget' => '<section class="widget">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><hr>'
			));
		}
	}
	add_action('widgets_init', 'koala_widgets_init');


	/*-----------------------------------------------------------------------------------*/
	/* POST META BOX SETTINGS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_option_meta_koala_setup')){
		function koala_option_meta_koala_setup(){
			add_action('add_meta_boxes', 'koala_add_option_boxes');
			add_action('save_post', 'koala_save_option_meta', 10, 2);
		}
	}
	add_action('load-post.php', 'koala_option_meta_koala_setup');
	add_action('load-post-new.php', 'koala_option_meta_koala_setup');

	if(!function_exists('koala_add_option_boxes')){
		function koala_add_option_boxes(){
			add_meta_box(
				'box-post-options',
				esc_html__('Theme Post Options', 'koala'),
				'koala_options_meta_box',
				'post',
				'side',
				'core'
			);
			add_meta_box(
				'box-post-options',
				esc_html__('Theme Post Options', 'koala'),
				'koala_options_meta_box',
				'page',
				'side',
				'core'
			);
		}
	}

	if(!function_exists('koala_options_meta_box')){
		function koala_options_meta_box($object, $box){ 
			global $post;
			wp_nonce_field(basename(__FILE__), 'koala_subtitle');

			$koala_postfeature_meta = get_post_meta($post->ID, 'koala_postfeature', true);
			$koala_postheader_meta = get_post_meta($post->ID, 'koala_postheader', true);
			$koala_postlist_meta = get_post_meta($post->ID, 'koala_postlist', true);
			$koala_pagelayout_meta = get_post_meta($post->ID, 'koala_pagelayout', true);

		?>

			<p>
				<strong>Post Feature</strong><br>
				<p class="howto">Configure where the post is displayed within the front-page header and post-list sections.</p>
				<input type="radio" id="postfeature-postlistonly" name="koala_postfeature" value="postfeature-postlistonly" <?php if(!in_array($koala_postfeature_meta, array('postfeature-postslider', 'postfeature-postgrid', 'postfeature-postgridfeatured'))){ echo 'checked'; } ?>>
				<label for="postfeature-postlistonly">Post List Only</label><br>
				<input type="radio" id="postfeature-postslider" name="koala_postfeature" value="postfeature-postslider" <?php checked($koala_postfeature_meta, 'postfeature-postslider'); ?>>
				<label for="postfeature-postslider">Slider &amp; Post List</label><br>
				<input type="radio" id="postfeature-postgrid" name="koala_postfeature" value="postfeature-postgrid" <?php checked($koala_postfeature_meta, 'postfeature-postgrid'); ?>>
				<label for="postfeature-postgrid">Grid &amp; Post List</label><br>
				<input type="radio" id="postfeature-postgridfeatured" name="koala_postfeature" value="postfeature-postgridfeatured" <?php checked($koala_postfeature_meta, 'postfeature-postgridfeatured'); ?>>
				<label for="postfeature-postgridfeatured">Grid (Featured) &amp; Post List</label><br>
			</p>
			<hr>
			<p>
				<strong>Post Header</strong><br>
				<p class="howto">Configure the header style within the post/custom page.</p>
				<input type="radio" id="postheader-standard" name="koala_postheader" value="postheader-standard" <?php if(!in_array($koala_postheader_meta, array('postheader-banner', 'postheader-cover'))){ echo 'checked'; } ?>>
				<label for="postheader-standard">Standard (Minimal)</label><br>
				<input type="radio" id="postheader-banner" name="koala_postheader" value="postheader-banner" <?php checked($koala_postheader_meta, 'postheader-banner'); ?>>
				<label for="postheader-banner">Banner (Half Page)</label><br>
				<input type="radio" id="postheader-cover" name="koala_postheader" value="postheader-cover" <?php checked($koala_postheader_meta, 'postheader-cover'); ?>>
				<label for="postheader-cover">Cover (Full page)</label><br>
			</p>
			<hr>
			<p>
				<strong>Post-List Style</strong><br>
				<p class="howto">Configure the post appearance within the post-list. Standard &amp; Link formats only.</p>
				<input type="radio" id="postlist-standard" name="koala_postlist" value="postlist-standard" <?php if(!in_array($koala_postlist_meta, array('postlist-banner'))){ echo 'checked'; } ?>>
				<label for="postlist-standard">Standard (Left Thumbnail)</label><br>
				<input type="radio" id="postlist-banner" name="koala_postlist" value="postlist-banner" <?php checked($koala_postlist_meta, 'postlist-banner'); ?>>
				<label for="postlist-banner">Banner (Large)</label><br>
			</p>
			<hr>
			<p>
				<strong>Page Layout</strong><br>
				<p class="howto">Configure the page layout of the individual post/custom page.</p>
				<input type="radio" id="pagelayout-rightsidebar" name="koala_pagelayout" value="pagelayout-rightsidebar" <?php if(!in_array($koala_pagelayout_meta, array('pagelayout-leftsidebar', 'pagelayout-fullwidth'))){ echo 'checked'; } ?>>
				<label for="pagelayout-rightsidebar">Right Sidebar (Default)</label><br>
				<input type="radio" id="pagelayout-leftsidebar" name="koala_pagelayout" value="pagelayout-leftsidebar" <?php checked($koala_pagelayout_meta, 'pagelayout-leftsidebar'); ?>>
				<label for="pagelayout-leftsidebar">Left Sidebar</label><br>
				<input type="radio" id="pagelayout-fullwidth" name="koala_pagelayout" value="pagelayout-fullwidth" <?php checked($koala_pagelayout_meta, 'pagelayout-fullwidth'); ?>>
				<label for="pagelayout-fullwidth">Full Width</label><br>
			</p>
			<hr>
			<p class="howto">More information on these post/page options can be found within the theme documentation under 'Post Formatting'.</p>

		<?php 

		}
	}

	if(!function_exists('koala_save_option_meta')){
		function koala_save_option_meta($post_id, $post){
			$is_autosave = wp_is_post_autosave($post_id);
			$is_revision = wp_is_post_revision($post_id);

			$koala_postfeature_meta = (isset($_POST['koala_postfeature']) && wp_verify_nonce($_POST['koala_postfeature'], basename(__FILE__))) ? 'true' : 'false';
			$koala_postheader_meta = (isset($_POST['koala_postheader']) && wp_verify_nonce($_POST['koala_postheader'], basename(__FILE__))) ? 'true' : 'false';
			$koala_postlist_meta = (isset($_POST['koala_postlist']) && wp_verify_nonce($_POST['koala_postlist'], basename(__FILE__))) ? 'true' : 'false';
			$koala_pagelayout_meta = (isset($_POST['koala_pagelayout']) && wp_verify_nonce($_POST['koala_pagelayout'], basename(__FILE__))) ? 'true' : 'false';

			if($is_autosave || $is_revision && !$koala_postfeature_meta && !$koala_postheader_meta && !$koala_pagelayout_meta && !$koala_postlist_meta){
				return;
			}
			if(isset($_POST['koala_postfeature'])){
				update_post_meta($post_id, 'koala_postfeature', sanitize_text_field($_POST['koala_postfeature']));
			}
			if(isset($_POST['koala_postheader'])){
				update_post_meta($post_id, 'koala_postheader', sanitize_text_field($_POST['koala_postheader']));
			}
			if(isset($_POST['koala_postlist'])){
				update_post_meta($post_id, 'koala_postlist', sanitize_text_field($_POST['koala_postlist']));
			}
			if(isset($_POST['koala_pagelayout'])){
				update_post_meta($post_id, 'koala_pagelayout', sanitize_text_field($_POST['koala_pagelayout']));
			}

		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* PAGINATION
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_posts_link_left_attributes')){
		function koala_posts_link_left_attributes(){
			return 'class="button rounded light previous"';
		}
	}
	add_filter('next_posts_link_attributes', 'koala_posts_link_left_attributes');

	if(!function_exists('koala_posts_link_right_attributes')){
		function koala_posts_link_right_attributes() {
			return 'class="button rounded light next"';
		}
	}
	add_filter('previous_posts_link_attributes', 'koala_posts_link_right_attributes');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM BODY CLASS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_custom_body_class')){
		function koala_custom_body_class($classes){
			if(is_home() && !koala_header_has_posts()){
				array_push($classes, "top-bar-visible");
			}
			if(is_page() || is_single()){
				global $post;
				if(!in_array(get_post_meta($post->ID, 'koala_postheader', true), array('postheader-cover', 'postheader-banner'))){
					array_push($classes, "top-bar-visible");
				}
				if(get_post_meta($post->ID, 'koala_pagelayout', true) == "pagelayout-rightsidebar"){
					array_push($classes, "page-layout-right-sidebar");
				}
				if(get_post_meta($post->ID, 'koala_pagelayout', true) == "pagelayout-leftsidebar"){
					array_push($classes, "page-layout-left-sidebar");
				}
				if(get_post_meta($post->ID, 'koala_pagelayout', true) == "pagelayout-fullwidth"){
					array_push($classes, "page-layout-full-width");
				}
			}
			if(get_theme_mod('layout_sidebar', false) == "sidebar-left"){
				array_push($classes, "page-layout-left-sidebar");
			}
			if(get_theme_mod('layout_sidebar', false) == "sidebar-right"){
				array_push($classes, "page-layout-right-sidebar");
			}
			return $classes;
		}
	}
	add_filter('body_class', 'koala_custom_body_class');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM POST LOOP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_post_loop')){
		function koala_post_loop($query){
			return $query;
		}
	}
	add_filter('pre_get_posts', 'koala_post_loop');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM POST CLASS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_post_class')){
		function koala_post_class($classes){
			global $post;
			if((!get_post_format() || get_post_format() == "link") && !has_post_thumbnail($post->ID)){
				array_push($classes, 'post-style-no-thumbnail');
			}elseif(get_post_meta($post->ID, 'koala_postlist', true) == "postlist-banner"){
				array_push($classes, 'post-style-banner');
			}
			return $classes;
		}
	}
	add_filter('post_class', 'koala_post_class');


	/*-----------------------------------------------------------------------------------*/
	/* DEFAULT WIDGETS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_default_widget_options')){
		function koala_get_default_widget_options(){
			return array(
				'before_widget' => '<section class="widget">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><hr>'
			);
		}
	}

	if(!function_exists('koala_get_default_widgets')){
		function koala_get_default_widgets(){
			if(class_exists('ecko_widget_latest_posts')){ the_widget('ecko_widget_latest_posts', array('title' => 'Latest Posts', 'postcount' => 7)); }
			if(class_exists('ecko_widget_random_posts')){ the_widget('ecko_widget_random_posts', array('title' => '', 'postcount' => 3)); }
		}
	}

	if(!function_exists('koala_get_default_footer_widgets')){
		function koala_get_default_footer_widgets(){
			if(class_exists('ecko_widget_blog_info')){ the_widget('ecko_widget_blog_info', 'lightlogo=true', array()); }
			the_widget('WP_Widget_Categories', 'count=true', koala_get_default_widget_options());
			the_widget('WP_Widget_Meta', '', koala_get_default_widget_options());
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* CATGEORY OPTIONS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_category_options')){
		function koala_category_options($tag){
			$category_meta_title = 'category_meta_' . $tag->term_id . '_color';
			$category_meta = get_option($category_meta_title);
			?>
			<tr class="form-field">
				<th scope="row" valign="top"><label for="category-color">Category HEX Color Value</label></th>
				<td>
					<input id="category-color" name="<?php echo esc_attr($category_meta_title); ?>" value="<?php if(isset($category_meta)) echo esc_attr($category_meta); ?>" />
					<p class="description">Enter a color to associate with this category. The color must be in HEX format (E.g. 009bbb )</p>
				</td>
			</tr>
			<?php
		}
	}
	add_action('edit_category_form_fields', 'koala_category_options');

	if(!function_exists('koala_save_category_options')){
		function koala_save_category_options($term_id){
			$category_meta_title = 'category_meta_' . $term_id. '_color';
			if(isset($_POST[$category_meta_title]) && !update_option($category_meta_title, $_POST[$category_meta_title])){
				add_option($category_meta_title, $_POST[$category_meta_title]);
			}
		}
	}
	add_action('edit_category', 'koala_save_category_options');


	/*-----------------------------------------------------------------------------------*/
	/* COMMENT FORMATTING
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_comment_format')){
		function koala_comment_format($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			?>
				<li <?php comment_class(); ?> id="comment-<?php echo esc_attr(comment_ID()); ?>">
					<div class="contents">
						<div class="profile">
							<a href="<?php comment_author_url(); ?>"><img src="//0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=96" class="gravatar" alt="<?php comment_author(); ?>"></a>
						</div>
						<div class="main">
							<div class="commentinfo">
								<section class="meta">
									<div class="left">
										<h4 class="author"><a href="<?php comment_author_url(); ?>"><img src="//0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=24" class="gravatarsmall" alt="<?php comment_author(); ?>"><?php comment_author(); ?></a></h4>
										<span class="isauthor" title="Author"><i class="fa fa-user"></i><?php esc_attr_e('Author', 'koala'); ?></span>
										<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
									</div>
									<div class="right">
										<div class="info"><time datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date(get_option('date_format')); ?></time></div>
									</div>
								</section>
							</div>
							<div class="body">
								<?php comment_text(); ?>
							</div>
						</div>
					</div>
					<hr>
			<?php
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* PAGE LAYOUTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_page_layout')){
		function koala_get_page_layout(){
			global $post;
			if(is_single() || is_page()){
				$koala_pagelayout_style_meta = get_post_meta($post->ID, 'koala_pagelayout_style', true);
				switch($koala_pagelayout_style_meta){
					case 'pagelayout-fullwidth':
						echo 'page-layout-full-width';
						break;
					default:
						break;
				}
			}else{
				return;
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST CATGEORY MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_category')){
		function koala_get_category($usespan = false){
			global $post;
			$post_category = get_the_category();
			if($post_category){
				$color_option = get_option('category_meta_' . $post_category[0]->term_id . '_color');
				if(!empty($color_option)){ $color = get_option('category_meta_' . $post_category[0]->term_id . '_color'); }else{ $color = '7fbb00'; };
				if($usespan){
					echo '<span class="category" style="background:#' . $color . ';">' . esc_html($post_category[0]->name) . '</span>';
				}else{
					echo '<a class="category" style="background:#' . $color . ';" href="' . esc_url(get_category_link($post_category[0]->term_id)) . '">' . esc_html($post_category[0]->name) . '</a>';
				}
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET SLIDER POSTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_slider_posts')){
		function koala_get_slider_posts($postcount = 6){
			$ecko_slider_posts = array(
				'numberposts' 	=> $postcount,
				'meta_key'		=> 'koala_postfeature',
				'meta_value'	=> 'postfeature-postslider',
			);
			if(get_theme_mod('postslider_all_formats', false) != 1){
				$ecko_slider_posts['tax_query'] = array(
					array(
						'taxonomy' 	=> 'post_format',
						'field' 	=> 'slug',
						'operator' 	=> 'NOT IN',
						'terms' 	=> array( 
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post- format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video'
						),
					)
				);
			}
			$ecko_slider_posts = get_posts($ecko_slider_posts);
			return $ecko_slider_posts;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET GRID POSTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_grid_posts')){
		function koala_get_grid_posts(){
			$ecko_grid_posts = array(
				'numberposts' 	=> get_theme_mod('postgrid_post_count', 5),
				'meta_query' 	=> array(
					'relation' 	=> 'OR',
					array(
						'key' 	=> 'koala_postfeature',
						'value' => array("postfeature-postgrid", "postfeature-postgridfeatured")
					)
				)
			);
			if(get_theme_mod('postgrid_all_formats', false) != 1){
				$ecko_grid_posts['tax_query'] = array(
					array(
						'taxonomy' 	=> 'post_format',
						'field' 	=> 'slug',
						'operator' 	=> 'NOT IN',
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
					)
				);
			}
			$ecko_grid_posts = get_posts($ecko_grid_posts);
			return $ecko_grid_posts;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* CHECK HEADER HAS POSTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_header_has_posts')){
		function koala_header_has_posts(){
			$ecko_header_posts = array(
				'meta_query' 	=> array(
					'relation' 	=> 'OR',
					array(
						'key' 	=> 'koala_postfeature',
						'value' => array("postfeature-postgrid", "postfeature-postgridfeatured", "postfeature-postslider")
					)
				),
				'tax_query' 	=> array(
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
				)
			);
			$ecko_header_posts = get_posts($ecko_header_posts);
			return count($ecko_header_posts);
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET DEFAULT HEADER BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_header_background')){
		function koala_get_header_background(){
			return get_theme_mod('layout_header_background', '');
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET SLIDER HEADER BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_get_slider_background')){
		function koala_get_slider_background(){
			$slider_post = koala_get_slider_posts(1);
			if(count($slider_post)){
				$post_image = null;
				if(has_post_thumbnail($slider_post[0]->ID)){
					$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($slider_post[0]->ID), 'background');
					$post_image = $post_image[0];
				}
				return $post_image;
			}else{
				return koala_get_header_background();
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* MODIFY DEFAULT WIDGET MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('koala_list_categories')){
		function koala_list_categories($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_categories', 'koala_list_categories');

	if(!function_exists('koala_list_archives')){
		function koala_list_archives($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_archives', 'koala_list_archives');


	/*-----------------------------------------------------------------------------------*/
	/* THEME CUSTOMIZER SETTINGS
	/*-----------------------------------------------------------------------------------*/

	function koala_customize_register($wp_customize){

		/*
		 * Layout
		 */
		$wp_customize->add_section('layout_section',
			array(
				'title' => 'Layout',
				'description' => 'This section contains theme layout options.',
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('layout_header_background',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'layout_header_background',
				array(
					'label' => 'Default Header Background Image',
					'section' => 'layout_section',
					'settings' => 'layout_header_background'
				)
			)
		);

		$wp_customize->add_setting('layout_sidebar',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => "sidebar-right",
		));
		$wp_customize->add_control(
			'layout_sidebar',
			array(
				'type' => 'radio',
				'label' => 'Sidebar Position',
				'section' => 'layout_section',
				'choices' => array(
					"sidebar-right" => 'Right Sidebar',
					"sidebar-left" => 'Left Sidebar',
				),
			)
		);


		/*
		 * Top Bar
		 */
		$wp_customize->add_section('topbar_section',
			array(
				'title' => 'Top Bar',
				'description' => 'This section contains Top bar options.',
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('topbar_disable_sticky',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_disable_sticky',
			array(
				'type' => 'checkbox',
				'label' => 'Disable Sticky Behaviour',
				'section' => 'topbar_section',
			)
		);

		$wp_customize->add_setting('topbar_hide_navigation',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_hide_navigation',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Navigation',
				'section' => 'topbar_section',
			)
		);

		$wp_customize->add_setting('topbar_hide_search',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_hide_search',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Search Option',
				'section' => 'topbar_section',
			)
		);

		$wp_customize->add_setting('topbar_show_search_mobile',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_show_search_mobile',
			array(
				'type' => 'checkbox',
				'label' => 'Show Search (Mobile)',
				'section' => 'topbar_section',
			)
		);

		/*
		 * Header - Post Slider
		 */
		$wp_customize->add_section('postslider_section',
			array(
				'title' => 'Header - Post Slider',
				'description' => 'This section contains Post Slider options.',
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('postslider_hide',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postslider_hide',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Post Slider',
				'section' => 'postslider_section',
			)
		);

		$wp_customize->add_setting('postslider_all_formats',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postslider_all_formats',
			array(
				'type' => 'checkbox',
				'label' => 'Show All Post Format Types',
				'section' => 'postslider_section',
			)
		);

		$wp_customize->add_setting('postslider_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postslider_hide_category',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Post Category',
				'section' => 'postslider_section',
			)
		);

		$wp_customize->add_setting('postslider_hide_excerpt',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postslider_hide_excerpt',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Excerpt',
				'section' => 'postslider_section',
			)
		);

		$wp_customize->add_setting('postslider_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postslider_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Meta',
				'section' => 'postslider_section',
			)
		);


		/*
		 * Header - Post Grid
		 */
		$wp_customize->add_section('postgrid_section',
			array(
				'title' => 'Header - Post Grid',
				'description' => 'This section contains Post Grid options.',
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('postgrid_hide',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_hide',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Post Grid',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_all_formats',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_all_formats',
			array(
				'type' => 'checkbox',
				'label' => 'Show All Post Format Types',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_hide_category',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Category',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_hide_author',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Author',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_hide_date',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Date',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postgrid_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Meta',
				'section' => 'postgrid_section',
			)
		);

		$wp_customize->add_setting('postgrid_post_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => "5",
		));
		$wp_customize->add_control(
			'postgrid_post_count',
			array(
				'type' => 'radio',
				'label' => 'Post to Show:',
				'section' => 'postgrid_section',
				'choices' => array(
					"2" => '2 Posts (1 Row)',
					"5" => '5 Posts (2 Rows)',
					"8" => '8 Posts (3 Rows)',
				),
			)
		);


		/*
		 * POST LIST SECTION
		 */
		$wp_customize->add_section('postlist_section',
			array(
				'title' => 'Post List',
				'description' => 'This section contains Post List options.',
				'priority' => 27,
			)
		);

		$wp_customize->add_setting('postlist_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_category',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Category',
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_author',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Author',
				'section' => 'postlist_section',
			)
		);	

		$wp_customize->add_setting('postlist_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_date',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Date',
				'section' => 'postlist_section',
			)
		);	

		$wp_customize->add_setting('postlist_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Meta',
				'section' => 'postlist_section',
			)
		);	

		$wp_customize->add_setting('postlist_hide_excerpt',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_excerpt',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Excerpt',
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_readmore',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_readmore',
			array(
				'type' => 'checkbox',
				'label' => 'Hide \'Read More\'',
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_comment_count',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Comment Count',
				'section' => 'postlist_section',
			)
		);


		/*
		 * PAGINATION SECTION
		 */
		$wp_customize->add_section('pagination_section',
			array(
				'title' => 'Pagination',
				'description' => 'This section contains Pagination options.',
				'priority' => 28,
			)
		);

		$wp_customize->add_setting('pagination_hide_older_newer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_older_newer',
			array(
				'type' => 'checkbox',
				'label' => 'Hide \'Older/Newer\' Buttons',
				'section' => 'pagination_section',
			)
		);

		$wp_customize->add_setting('pagination_hide_page_numbers',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_page_numbers',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Page Numbers',
				'section' => 'pagination_section',
			)
		);


		/*
		 * POST PAGE SECTION
		 */
		$wp_customize->add_section('postpage_section',
			array(
				'title' => 'Post Page',
				'description' => 'This section contains Post Page options.',
				'priority' => 29,
			)
		);

		$wp_customize->add_setting('postpage_enable_cover_fade',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_enable_cover_fade',
			array(
				'type' => 'checkbox',
				'label' => 'Enable Cover Fade',
				'section' => 'postpage_section',
			)
		);	

		$wp_customize->add_setting('postpage_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_category',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Category',
				'section' => 'postpage_section',
			)
		);	

		$wp_customize->add_setting('postpage_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Author',
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_date',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Date',
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_comment_count',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Comment Count',
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_social_share',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_social_share',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Social Share',
				'section' => 'postpage_section',
			)
		);	

		$wp_customize->add_setting('postpage_hide_tags',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_tags',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Tags',
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_related',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_related',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Related Posts',
				'section' => 'postpage_section',
			)
		);	

		$wp_customize->add_setting('postpage_hide_author_profile',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author_profile',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Author Profile',
				'section' => 'postpage_section',
			)
		);	

		$wp_customize->add_setting('postpage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Comments',
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_next_prev_posts',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_next_prev_posts',
			array(
				'type' => 'checkbox',
				'label' => 'Hide \'Next/Previous\' Posts',
				'section' => 'postpage_section',
			)
		);	


		/*
		 * CUSTOM PAGE SECTION
		 */
		$wp_customize->add_section('custompage_section',
			array(
				'title' => 'Custom Page',
				'description' => 'This section contains Custom Page options.',
				'priority' => 30,
			)
		);

		$wp_customize->add_setting('custompage_show_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_author',
			array(
				'type' => 'checkbox',
				'label' => 'Show Author',
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_show_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_date',
			array(
				'type' => 'checkbox',
				'label' => 'Show Date',
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_show_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_comment_count',
			array(
				'type' => 'checkbox',
				'label' => 'Show Comment Count',
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_show_social_share',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_social_share',
			array(
				'type' => 'checkbox',
				'label' => 'Show Social Share Options',
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Comments',
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_title',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_title',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Page Title',
				'section' => 'custompage_section',
			)
		);


		/*
		 * FOOTER SECTION
		 */
		$wp_customize->add_section('footer_section',
			array(
				'title' => 'Footer',
				'description' => 'This section contains Footer options.',
				'priority' => 31,
			)
		);

		$wp_customize->add_setting('footer_hide_footer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_footer',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Footer',
				'section' => 'footer_section',
			)
		);

		$wp_customize->add_setting('footer_hide_widgets',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_widgets',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Widgets',
				'section' => 'footer_section',
			)
		);	

		$wp_customize->add_setting('footer_hide_copyright',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_copyright',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Copyright',
				'section' => 'footer_section',
			)
		);	

		$wp_customize->add_setting('footer_hide_social',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_social',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Social',
				'section' => 'footer_section',
			)
		);	


		/*
		 * ADVERTS SECTION
		 */
		$wp_customize->add_section('adverts_section',
			array(
				'title' => 'Adverts & AdSense',
				'description' => 'This section contains Advert & AdSense options.',
				'priority' => 32,
			)
		);

		$wp_customize->add_setting('adverts_enable',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('adverts_enable',
			array(
				'type' => 'checkbox',
				'label' => 'Enable Advert/AdSense Support',
				'section' => 'adverts_section',
			)
		);

		$wp_customize->add_setting('adverts_occurance_rate',
		array(
			'sanitize_callback' => 'ecko_sanitize_int',
			'default' => 4
		));
		$wp_customize->add_control('adverts_occurance_rate',
			array(
				'type' => 'select',
				'label' => 'Show Every (X) Posts',
				'section' => 'adverts_section',
				'choices' => array(
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
					6 => '6'
				),
			)
		);

		$wp_customize->add_setting('adverts_ad_code',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('adverts_ad_code',
			array(
				'type' => 'text',
				'label' => 'Advert Emebed Code (728x90)',
				'section' => 'adverts_section',
			)
		);

	}
	add_action('customize_register', 'koala_customize_register');


	function koala_customize_css(){
		?>
			<style type="text/css">

				<?php // GENERAL ?>
				<?php if(get_theme_mod('general_disqus_plugin_support')){ ?>
					.meta .comments{ display:none !important; }
				<?php } ?>

				<?php // TOP BAR ?>
				<?php if(get_theme_mod('topbar_hide_navigation')){ ?>
					.top-bar nav{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('topbar_hide_search')){ ?>
					.top-bar .option.searchnav{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('topbar_disable_sticky')){ ?>
					.top-bar.top-bar-scroll{ position:absolute !important; }
				<?php } ?>
				<?php if(get_theme_mod('topbar_show_search_mobile')){ ?>
					.top-bar .searchnav{ display: block !important; }
				<?php } ?>

				<?php // HEADER - POST SLIDER ?>
				<?php if(get_theme_mod('postslider_hide')){ ?>
					.post-slider{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postslider_hide_category')){ ?>
					.post-slider .post-slider-post .category{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postslider_hide_excerpt')){ ?>
					.post-slider .post-slider-post .excerpt{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postslider_hide_meta')){ ?>
					.post-slider .post-slider-post .meta{ display:none !important; }
				<?php } ?>

				<?php // HEADER - POST GRID ?>
				<?php if(get_theme_mod('postgrid_hide')){ ?>
					.post-grid{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postgrid_hide_category')){ ?>
					.post-grid .post .category{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postgrid_hide_author')){ ?>
					.post-grid .post .author{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postgrid_hide_date')){ ?>
					.post-grid .post .date{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postgrid_hide_meta')){ ?>
					.post-grid .post .meta{ display:none !important; }
				<?php } ?>

				<?php // POSTLIST ?>
				<?php if(get_theme_mod('postlist_hide_category')){ ?>
					.post-list .post .category{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_meta')){ ?>
					.post-list .post .meta{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_excerpt')){ ?>
					.post-list .post .excerpt{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_readmore')){ ?>
					.post-list .post .readmore{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_author')){ ?>
					.post-list .post .author{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_date')){ ?>
					.post-list .post .date{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_comment_count')){ ?>
					.post-list .post .comments{ display:none !important; }
				<?php } ?>

				<?php // PAGINATION ?>
				<?php if(get_theme_mod('pagination_hide_older_newer')){ ?>
					.pagination .button{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('pagination_hide_page_numbers')){ ?>
					.pagination ul.page-numbers{ display:none !important; }
				<?php } ?>

				<?php // POST PAGE ?>
				<?php if(get_theme_mod('postpage_enable_cover_fade')){ ?>
					body.single .header-post .background { -webkit-animation: none; -moz-animation: none; animation: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_category')){ ?>
					body.single .post-title .category{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author')){ ?>
					body.single .post-title .author{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_date')){ ?>
					body.single .post-title .date{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_comment_count')){ ?>
					body.single .post-title .comments{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_tags')){ ?>
					body.single .post-footer .post-tags{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_social_share')){ ?>
					body.single .post-footer .post-social-share{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_related')){ ?>
					body.single .post-related{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author_profile')){ ?>
					body.single .post-author-profile{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_comments')){ ?>
					body.single .post-comments{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_next_prev_posts')){ ?>
					body.single .nextprev{ display:none; }
				<?php } ?>

				<?php // CUSTOM PAGE ?>
				<?php if(get_theme_mod('custompage_show_author')){ ?>
					body.page .post-title .author{ display:inline-block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_date')){ ?>
					body.page .post-title .date{ display:inline-block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_comment_count')){ ?>
					body.page .post-title .comments{ display:inline-block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_social_share')){ ?>
					body.page .post-footer{ display:block; }
					body.page .post-footer .post-social-share{ display:block; }

				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_comments')){ ?>
					body.page .post-comments{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_title')){ ?>
					body.page .post-title{ display:none !important; }
				<?php } ?>

				<?php // FOOTER ?>
				<?php if(get_theme_mod('footer_hide_footer')){ ?>
					footer.page-footer{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('footer_hide_widgets')){ ?>
					footer.page-footer .footer-widgets{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('footer_hide_copyright')){ ?>
					footer.page-footer .disclaimer{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('footer_hide_social')){ ?>
					footer.page-footer .social{ display:none; }
				<?php } ?>

				<?php // COPYRIGHT ?>
				<?php if(get_theme_mod('copyright_hide_disclaimer')){ ?>
					.disclaimer{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_wordpress')){ ?>
					.disclaimer .wordpress{ display:none !important; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_ecko')){ ?>
					.disclaimer .ecko{ display:none !important; }
				<?php } ?>

				<?php // COLORS ?>
				<?php if(get_theme_mod('color_enable_custom')){ ?>
					.button.gray-outline:hover{ border-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					.post-slider .post-slider-post h2:hover + hr{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					.post-grid .post h3:hover + hr{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					.post-list .post h2:hover + hr{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					.post-list .post .meta .readmore a{ color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					nav.pagination .next:hover, nav.pagination .previous:hover{ border-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					.widget .tagcloud a:hover{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; } 
					nav.pagination ul.page-numbers a:hover{ background: <?php echo esc_attr(get_theme_mod('color_accent_light')); ?>; border-color: <?php echo esc_attr(get_theme_mod('color_accent_light')); ?>; } 
				<?php } ?>

			 </style>
		<?php
	}
	add_action('wp_head', 'koala_customize_css');

