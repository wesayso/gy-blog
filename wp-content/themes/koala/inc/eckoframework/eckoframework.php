<?php

	/**
	 * 
	 *  ECKO FRAMEWORK
	 *
	 *  @author EckoThemes <support@ecko.me>
	 *  @version 1.5.4
	 *  @link http://ecko.me
	 *
	 *  CONTENTS ->
	 *   0. DEFINE
	 *   1. THEME SETUP
	 *	 2. ADMIN PANEL
	 *   3. HELPERS
	 *   4. SANITIZATION
	 *   5. HEADER/FOOTER MODIFIERS
	 *	 6. GOOGLE FONTS
	 *   7. CUSTOMIZER
	 * 
	 */



	/*-----------------------------------------------------------------------------------*/
	/* 0. DEFINE
	/*-----------------------------------------------------------------------------------*/

	defined('ABSPATH') or die();
	define('ECKO_FRAMEWORK_VERSION', '1.5.4');



	/*-----------------------------------------------------------------------------------*/
	/* 1. THEME SETUP
	/*-----------------------------------------------------------------------------------*/


	/**
	 * Configure default theme environment
	 *  @return void
	 */
	function ecko_theme_setup(){
		ecko_if_new_activation();
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		load_theme_textdomain(ECKO_THEME_ID, get_template_directory() . '/languages');
		if(!isset($content_width)){
			$content_width = ECKO_THEME_WIDTH;
		}
		if(function_exists('add_image_size')){ 
			add_image_size('background', 1680);
			add_image_size('background-small', 1240);
			add_image_size('single', 860);
			add_image_size('opengraph', 680);
			add_image_size('sidebar', 400);
			add_image_size('thumbnail', 200);
			add_image_size('thumbnail_small', 50);
		}
	}
	add_action('after_setup_theme', 'ecko_theme_setup');


	/**
	 *  If the theme has just been activated redirect to EckoThemes admin page
	 *  @return void
	 */
	function ecko_if_new_activation(){
		global $pagenow;
		if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
			wp_redirect(admin_url('admin.php?page=ecko_admin_page_root'));
			exit;
		}
	}


	/**
	 *  Register default external & internal theme plugins
	 *  @return void
	 */
	require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
	function ecko_default_plugins(){
		$ecko_plugins = array(
			array(
				'name'					=> 'Ecko Plugin',
				'slug'					=> 'eckoplugin',
				'source'				=> get_template_directory() . '/inc/plugins/eckoplugin.zip',
				'required'				=> false,
				'recommended'			=> true,
				'force_activation'		=> false,
				'version'				=> '2.4.2',
				'force_deactivation'	=> false
			),
			array(
				'name'					=> 'Regenerate Thumbnails',
				'slug'					=> 'regenerate-thumbnails',
				'required'				=> false,
			),
			array(
				'name'					=> 'Envato Market',
				'slug'					=> 'envato-market',
				'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required'				=> false,
				'recommended'			=> true,
				'force_activation'		=> false,
			),
		);
		return $ecko_plugins;
	}


	/**
	 *  Enque default style-sheets and JavaScript assets
	 *  @return void
	 */
	function ecko_enque_scripts(){
		if(!is_admin()){
			/* CSS */
			if(get_theme_mod('general_use_unminified_css')){
				wp_register_style('ecko_css', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), ECKO_THEME_VERSION);
			}else{
				wp_register_style('ecko_css', get_stylesheet_uri(), array(), ECKO_THEME_VERSION);
			}
			wp_enqueue_style('ecko_css');
			/* JAVASCRIPT */
			wp_register_script('ecko_js', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), ECKO_THEME_VERSION, true);
			wp_enqueue_script('ecko_js');
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('wp_enqueue_scripts', 'ecko_enque_scripts');


	/**
	 * Register default theme sidebars for post and page
	 * @return void
	 */
	function ecko_widgets_init(){
		register_sidebar(array(
			'name'          => 'Page Sidebar',
			'id'            => 'sidebar-page',
			'description'   => 'Appears in the sidebar area on default blog & custom pages.',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><hr>'
		));
		register_sidebar(array(
			'name'          => 'Post Sidebar',
			'id'            => 'sidebar-post',
			'description'   => 'Appears in the sidebar area on post pages.',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><hr>'
		));

	}
	add_action('widgets_init', 'ecko_widgets_init');


	/**
	 * Enable content excerpt for custom pages
	 * @return  void
	 */
	function ecko_enable_page_excerpt(){
		add_meta_box('postexcerpt', 'Excerpt', 'post_excerpt_meta_box', 'page', 'normal', 'core');
	}
	add_action('admin_menu', 'ecko_enable_page_excerpt');


	/**
	 * Modify default excerpt length
	 * @return  void
	 */
	function ecko_excerpt_length($length){
		return 100;
	}
	add_filter('excerpt_length', 'ecko_excerpt_length', 999);


	/**
	 * Add social profile contact methods for authors
	 * @param   array $contact  Array of current contact methods
	 * @return  array           Array of contact methods with theme additions
	 */
	function ecko_user_contactmethods($contact){
		$contact['twitter'] = 'Twitter URL';
		$contact['twitter_handle'] = 'Twitter Screename/ID (Excluding @)';
		$contact['facebook'] = 'Facebook URL';
		$contact['github'] = 'GitHub URL';
		$contact['youtube'] = 'Youtube URL';
		$contact['dribbble'] = 'Dribbble URL';
		$contact['google-plus'] = 'Google Plus URL';
		$contact['instagram'] = 'Instagram URL';
		$contact['linkedin'] = 'LinkedIn URL';
		$contact['pinterest'] = 'Pinterest URL';
		$contact['skype'] = 'Skype URL';
		$contact['tumblr'] = 'Tumblr URL';
		$contact['flickr'] = 'Flickr URL';
		$contact['reddit'] = 'Reddit URL';
		$contact['stackover-flow'] = 'Stack Overflow URL';
		$contact['twitch'] = 'Twitch URL';
		$contact['vine'] = 'Vine URL';
		$contact['vk'] = 'VK URL';
		$contact['vimeo'] = 'Vimeo URL';
		$contact['weibo'] = 'Weibo URL';
		$contact['soundcloud'] = 'Soundcloud URL';
		return $contact;
	}
	add_filter('user_contactmethods', 'ecko_user_contactmethods', 10, 1);



	/*-----------------------------------------------------------------------------------*/
	/* 2. ADMIN PANEL
	/*-----------------------------------------------------------------------------------*/


	/**
	 *  Add EckoThemes menu item to the WordPress Dashboard menu
	 *  @return void
	 */
	function ecko_add_admin_menu_page(){
		add_menu_page('Overview', 'EckoThemes', 'manage_options', 'ecko_admin_page_root', 'ecko_admin_page', 'dashicons-shield', 100);
	}
	add_action('admin_menu', 'ecko_add_admin_menu_page');


	/**
	 *  Enque admin styles for EckoThemes menu icon and page
	 *  @return void
	 */
	function ecko_admin_enqueue_style(){
		wp_register_style('ecko_admin_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, ECKO_FRAMEWORK_VERSION);
		wp_register_style('ecko_admin_css', get_template_directory_uri() . '/inc/eckoframework/assets/css/admin.css', false, ECKO_FRAMEWORK_VERSION);
		wp_enqueue_style('ecko_admin_fontawesome');
		wp_enqueue_style('ecko_admin_css');
	}
	add_action('admin_enqueue_scripts', 'ecko_admin_enqueue_style');


	/**
	 *  Render EckoThemes admin page via alternative php file
	 *  @return void
	 */
	function ecko_admin_page(){
		include(get_template_directory() . '/inc/eckoframework/admin/ecko-admin-page.php');
	}



	/*-----------------------------------------------------------------------------------*/
	/* 3. HELPERS
	/*-----------------------------------------------------------------------------------*/


	/**
	 * Generate document title with backwards compatibility
	 * @return  string          generated wordpress title
	 */ 
	if(!function_exists('_wp_render_title_tag')){
		function ecko_slug_render_title() {
	?>
	<title><?php wp_title('|', true, 'right'); ?></title>
	<?php
		}
		add_action('wp_head', 'ecko_slug_render_title');
	}


	/**
	 * Print relevant Schema.org tags for page content type
	 * @return  string          generated schema tags
	 */ 
	function ecko_tag_schema(){
		if(!get_theme_mod('schema_disable', false)){
			$schema = 'http://schema.org/';
			if(is_single()){ $type = "BlogPosting"; }
			elseif(is_author()){ $type = 'ProfilePage'; }
			elseif(is_search()){ $type = 'SearchResultsPage'; }
			else{ $type = 'WebPage'; }
			echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
		}
	}


	/**
	 * Get the most recent sticky post (by post date)
	 * @return  string          generated schema tags
	 */ 
	function ecko_get_latest_sticky_post(){
		$sticky = get_option('sticky_posts');
		$query_args = array(
			'posts_per_page' => 1,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1
		);
		$query = new WP_Query($query_args);
		if($query->have_posts()){
			while($query->have_posts()){
				return $query->the_post();
			}
		}else{
			return false;
		}
	}


	/**
	 * Get the most recent post (by post date)
	 * @return  string          generated schema tags
	 */ 
	function ecko_get_first_post(){
		$query_args = array(
			'posts_per_page' => 1,
			'offset' => 0
		);
		$query = new WP_Query($query_args);
		if($query->have_posts()){
			while($query->have_posts()){
				return $query->the_post();
			}
		}else{
			return false;
		}
	}


	/**
	 * Get profile URL for current author (user set)
	 * @return  void
	 */ 
	function ecko_get_author_url(){
		global $post;
		$author_url = get_author_posts_url(get_the_author_meta('ID'));
		echo esc_url($author_url);
	}


	/**
	 * Print date using theme or user formatted date depending on theme option
	 * @return void
	 */
	function ecko_date_format(){
		if(get_theme_mod('general_use_custom_date_format', false)){ 
			the_time(get_option('date_format')); 
		}else{
			if(defined('ECKO_DATE_FORMAT')){ the_time(ECKO_DATE_FORMAT); }else{ the_time('jS F Y'); }
		}
	}


	/**
	 * Truncate a string based on provided word count and include terminator
	 * @param       string $string      String to be truncated
	 * @param       int $length         Number of characters to allow before split
	 * @param       string $terminator  (Optional) String terminator to be used
	 * @return      string              Truncated string with add terminator
	 */
	function ecko_truncate_by_words($string, $length, $terminator = ""){
		if(function_exists('mb_strlen') && function_exists('mb_substr')){
			if(mb_strlen($string) <= $length){
				$string = $string;
			}else{
				$string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length)) . $terminator;
			}
		}else{
			if(strlen($string) <= $length){
				$string = $string;
			}else{
				$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length)) . $terminator;
			}
		}
		return $string;
	}


	/**
	 * Convert date string to time ago formatted string (eg. x days ago)
	 * @param   string $time    Time string to be converted
	 * @return  string          Converted to time ago formated
	 */
	function ecko_time_ago($time){
		$time = strtotime($time);
		$periods = array("second", "minute", "hour", "day", "week", "month", "year");
		$lengths = array("60", "60", "24", "7", "4.35", "12", "10");
		$now = time();
		$difference = $now - $time;
		$tense = "ago";
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}
		$difference = round($difference);
		if($difference != 1) {
			$periods[$j].= "s";
		}
		return "$difference $periods[$j] ago ";
	}


	/**
	 * Get estimated read time (minutes) for current post in loop.
	 * @return int Estimated time in minutes to read post
	 */
	function ecko_estimated_reading_time(){
		$post = get_post();
		$words = str_word_count(strip_tags($post->post_content));
		$minutes = floor($words / 120);
		if($minutes == 0) $minutes = 1;
		return $minutes;
	}


	/**
	 * Retrieve the latest blog posts
	 * @param  int $postcount Number of posts to return
	 * @return array            Array of latest posts
	 */
	function ecko_get_latest_posts($postcount){
		$ecko_latest_posts = get_posts(array(
			'numberposts' => $postcount,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 
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
					'operator' => 'NOT IN'
				)
			)
		));
		return $ecko_latest_posts;
	}


	/**
	 * Retrieve the related blog posts
	 * @param  int $postcount   Number of posts to return
	 * @param  int $postid      Post ID to retrieve related posts for
	 * @return array            Array of latest posts
	 */
	function ecko_get_related_posts($postid = 0, $postcount = 3, $random = true, $allformats = false) {
		$ecko_related_posts = array(
			'numberposts'   => $postcount,
			'category__in'  => wp_get_post_categories($postid),
			'meta_key'      => '_thumbnail_id',
			'post__not_in'  => array($postid),
		);
		if($random){
			$ecko_related_posts['orderby'] = 'rand';
		}
		if(!$allformats){
			$ecko_related_posts['tax_query'] = array(
				array(
					'taxonomy'  => 'post_format',
					'field'     => 'slug',
					'terms'     => array( 
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
					'operator'  => 'NOT IN'
				)
			);
		}
		$ecko_related_posts = get_posts($ecko_related_posts);
		return $ecko_related_posts;
	}


	/**
	 * Adjust given Hexadecimal color by a given amount of steps (lighten/darken)
	 * @param  string $hex   Hexadecimal color to be adjusted
	 * @param  string $steps Number step to adjust by + lighter and - darken.
	 * @return string        Adjusted hexadecimal color
	 */
	function ecko_adjust_hex_color($hex, $steps){
		$steps = max(-255, min(255, $steps));
		$hex = str_replace('#', '', $hex);
		if(strlen($hex) == 3){
			$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
		}
		$color_parts = str_split($hex, 2);
		$return = '#';
		foreach($color_parts as $color){
			$color = hexdec($color);
			$color = max(0,min(255,$color + $steps));
			$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
		}
		return $return;
	}


	/**
	 * Retrieve the first image from the current posts contents
	 * @return string URL of the first post image
	 */
	function ecko_get_first_image(){
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if(isset($matches[1][0])){
			$first_img = $matches[1][0];
		}
		if(empty($first_img)) {
			$first_img = "";
		}
		return $first_img;
	}


	/**
	 * Retrieve the first link from given posts contents
	 * @param  string $content Content to be searched for first URL element
	 * @return string URL of the first link element href
	 */
	function ecko_get_first_link($content){
		if(empty($content)){
			return false;
		}
		if(preg_match('/<a\s[^>]*?href=([\'"])(.+?)\1/is', $content, $matches)){
			return esc_url_raw($matches[2]);
		}
		return false;
	}



	/*-----------------------------------------------------------------------------------*/
	/* 4. SANITIZATION
	/*-----------------------------------------------------------------------------------*/


	/**
	 * Sanitize a string for theme rendering within HTML
	 * @param  string $input String to be sanitized
	 * @return string        Sanitized string
	 */
	function ecko_sanitize_text($input){
		return wp_kses_post(force_balance_tags($input));
	}


	/**
	 * Sanitize a string for theme rendering allowing HTML elements
	 * @param  string $input String to be sanitized
	 * @return string        Sanitized string
	 */
	function ecko_sanitize_allow_html($input){
		return $input;
	}


	/**
	 * Sanitize a checkbox value
	 * @param  int $input Checkbox input value
	 * @return int        Sanitized checkbox value
	 */
	function ecko_sanitize_checkbox($input){
		if($input == 1){
			return 1;
		}else{
			return '';
		}
	}


	/**
	 * Sanitize opacity selection box input
	 * @param  string $input Opacity selection input
	 * @return string        Sanitized opacity input
	 */
	function ecko_sanitize_opacity_select($input){
		$options = array(
			'1.0' => '100%',
			'0.9' => '90%',
			'0.8' => '80%',
			'0.7' => '70%',
			'0.6' => '60%',
			'0.5' => '50%',
			'0.4' => '40%',
			'0.3' => '30%',
			'0.2' => '20%',
			'0.1' => '10%',
			'0.0' => '0%'
		);
		if(array_key_exists($input, $options)){
			return $input;
		}else{
			return '';
		}
	}


	/**
	 * Sanitize integer value
	 * @param  string $input Opacity selection input
	 * @return string        Sanitized opacity input
	 */
	function ecko_sanitize_int($input){
		if(is_numeric($input)){
			return $input;
		}else{
			return 0;
		}
	}


	/**
	 * Sanitize file upload URL
	 * @param  string $input URL string to sanitize
	 * @return string        Sanitized URL string
	 */
	function ecko_sanitize_file_upload($input){
		return esc_url_raw($input);
	}



	/*-----------------------------------------------------------------------------------*/
	/* 5. HEADER/FOOTER MODIFIERS
	/*-----------------------------------------------------------------------------------*/


	/**
	 *  Integrate Custom CSS theme option styles within page head
	 *  @return void
	 */
	function ecko_add_custom_css(){
		if(get_theme_mod('advanced_custom_css', false)){
		?>
			<style>
				<?php echo esc_html(get_theme_mod('advanced_custom_css')); ?>
			</style>
		<?php
		}
	}
	add_action('wp_head', 'ecko_add_custom_css'); 


	/**
	 * Integrate analytics support within page footer
	 * @return void
	 */
	function ecko_add_googleanalytics(){
		if(get_theme_mod('ga_id') != ""){
		?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', '<?php echo esc_js(get_theme_mod('ga_id')); ?>', 'auto');
				ga('send', 'pageview');
			</script>
		<?php
		}
	}
	add_action('wp_footer', 'ecko_add_googleanalytics');


	/**
	 * Integrate OpenGraph support within page head
	 * @return void
	 */
	function ecko_add_open_graph(){ 
		global $post; 
		if(get_theme_mod('og_disable') == "" || get_theme_mod('og_disable') != 1){ 
		?> 
			<meta property="fb:app_id" content="<?php if(get_theme_mod('og_facebook_app_id') != ""){ echo esc_attr(get_theme_mod('og_facebook_app_id')); }?>" /> 
			<meta property="fb:admins" content="<?php if(get_theme_mod('og_facebook_admin_id') != ""){ echo esc_attr(get_theme_mod('og_facebook_admin_id')); }?>" /> 
			<?php if(is_single()){ 
				$postimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'opengraph'); 
			?> 
			<meta property="og:url" content="<?php esc_url(the_permalink()); ?>"/> 
			<meta property="og:title" content="<?php esc_attr(single_post_title('')); ?>" /> 
			<meta property="og:description" content="<?php echo esc_attr(strip_tags(get_the_excerpt())); ?>" /> 
			<meta property="og:type" content="article" /> 
			<meta property="og:image" content="<?php echo esc_url($postimage[0]); ?>" /> 
			<?php }else{ ?> 
			<meta property="og:site_name" content="<?php esc_attr(bloginfo('name')); ?>" /> 
			<meta property="og:description" content="<?php esc_attr(bloginfo('description')); ?>" /> 
			<meta property="og:type" content="website" /> 
			<meta property="og:image" content="<?php if(get_theme_mod('general_blog_image') != ""){ echo esc_url(get_theme_mod('general_blog_image')); }?>" /> 
			<?php } ?> 
		<?php 
		} 
	} 
	add_action('wp_head', 'ecko_add_open_graph'); 


	/**
	 * Render page numbers for pagination area
	 * @return void
	 */
	function ecko_paging_nav(){
		if($GLOBALS['wp_query']->max_num_pages < 2){
			return;
		}
		$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		$query_args = array();
		$url_parts = explode('?', $pagenum_link);
		if(isset($url_parts[1])){
			wp_parse_str($url_parts[1], $query_args);
		}
		$pagenum_link = esc_url(remove_query_arg(array_keys($query_args), $pagenum_link));
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';
		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';
		if($paged < 3){ $mid_size = 2; }else{ $mid_size = 1; }
		$links = paginate_links(array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => $mid_size,
			'prev_next' => false,
			'add_args'  => array_map('urlencode', $query_args),
			'type'      => 'list'
		));
		if($links){
			echo balanceTags($links);
		}
	}



	/*-----------------------------------------------------------------------------------*/
	/* 6. GOOGLE FONTS
	/*-----------------------------------------------------------------------------------*/


	/**
	 *  Get list of available Google Fonts as an array
	 *  @return array list of available Google fonts
	 */
	function ecko_get_google_font_list(){
		$fontlist = array('Theme Default');
		$fontdata = file_get_contents(get_template_directory() . '/inc/eckoframework/google-fonts/font-list.json');
		if($fontdata){
			$fontdata = json_decode($fontdata, true);
			if($fontdata){
				$fontdata = array_merge($fontlist, $fontdata['fonts']);
				return array_combine($fontdata, $fontdata);
			}
		}
		return $fontlist;
	}


	/**
	 * Get Google font request URL based on theme default fonts and custom options
	 * @return string Google font request url
	 */
	function ecko_get_google_font_url(){
		$fonts = "";
		$font_url = "";
		if(defined('ECKO_FONT_BODY_FAMILY')){
			if(get_theme_mod('typography_body', 'Theme Default') !== "Theme Default"){
				$fonts .= get_theme_mod('typography_body') . ":" . ECKO_FONT_BODY_WEIGHT . "|";
			}else{
				$fonts .= ECKO_FONT_BODY_FAMILY . ":" . ECKO_FONT_BODY_WEIGHT . "|";
			}
		}
		if(defined('ECKO_FONT_BODY_ALT_FAMILY')){
			if(get_theme_mod('typography_body_alernative', 'Theme Default') !== "Theme Default"){
				$fonts .= get_theme_mod('typography_body_alernative') . ":" . ECKO_FONT_BODY_ALT_WEIGHT . "|";
			}else{
				$fonts .= ECKO_FONT_BODY_ALT_FAMILY . ":" . ECKO_FONT_BODY_ALT_WEIGHT . "|";
			}
		}
		if(defined('ECKO_FONT_HEADER_FAMILY')){
			if(get_theme_mod('typography_header', 'Theme Default') !== "Theme Default"){
				$fonts .= get_theme_mod('typography_header') . ":" . ECKO_FONT_HEADER_WEIGHT . "|";
			}else{
				$fonts .= ECKO_FONT_HEADER_FAMILY . ":" . ECKO_FONT_HEADER_WEIGHT . "|";
			}
		}
		if(defined('ECKO_FONT_SUB_HEADER_FAMILY')){
			if(get_theme_mod('typography_sub_header', 'Theme Default') !== "Theme Default"){
				$fonts .= get_theme_mod('typography_sub_header') . ":" . ECKO_FONT_SUB_HEADER_WEIGHT . "|";
			}else{
				$fonts .= ECKO_FONT_SUB_HEADER_FAMILY . ":" . ECKO_FONT_SUB_HEADER_WEIGHT . "|";
			}
		}
		if(defined('ECKO_FONT_POST_FAMILY')){
			if(get_theme_mod('typography_post', 'Theme Default') !== "Theme Default"){
				$fonts .= get_theme_mod('typography_post') . ":" . ECKO_FONT_POST_WEIGHT . "|";
			}else{
				$fonts .= ECKO_FONT_POST_FAMILY . ":" . ECKO_FONT_POST_WEIGHT . "|";
			}
		}
		if($fonts){
			if('off' !== _x('on', 'Google font: on or off', 'ecko-framework')){
				if(get_theme_mod('general_use_extended_char_set')){
					$font_url = add_query_arg('family', urlencode($fonts), "//fonts.googleapis.com/css");
				}else{
					$font_url = add_query_arg('family', urlencode($fonts), "//fonts.googleapis.com/css");
				}
			}
		}
		return $font_url;
	}


	/**
	 * Enque Google fonts
	 * @return void
	 */
	function ecko_enque_google_fonts(){
		if(!is_admin()){
			wp_enqueue_style('ecko-fonts', ecko_get_google_font_url(), array(), ECKO_THEME_VERSION);
		}
	}
	add_action('wp_enqueue_scripts', 'ecko_enque_google_fonts');


	/**
	 * Add custom Google font style overrides into page header
	 * @return void
	 */
	function ecko_add_custom_fonts(){
		$font_styles = "";
		if(defined('ECKO_FONT_BODY_FAMILY') && get_theme_mod('typography_body', 'Theme Default') !== "Theme Default"){
			$font_styles .= ECKO_FONT_BODY_SELECTOR . "{ font-family: " . get_theme_mod('typography_body') . "; }";
		}
		if(defined('ECKO_FONT_BODY_ALT_FAMILY') && get_theme_mod('typography_body_alernative', 'Theme Default') !== "Theme Default"){
			$font_styles .= ECKO_FONT_BODY_ALT_SELECTOR . "{ font-family: " . get_theme_mod('typography_body_alernative') . "; }";
		}
		if(defined('ECKO_FONT_HEADER_FAMILY') && get_theme_mod('typography_header', 'Theme Default') !== "Theme Default"){
			$font_styles .= ECKO_FONT_HEADER_SELECTOR . "{ font-family: " . get_theme_mod('typography_header') . "; }";
		}
		if(defined('ECKO_FONT_SUB_HEADER_FAMILY') && get_theme_mod('typography_sub_header', 'Theme Default') !== "Theme Default"){
			$font_styles .= ECKO_FONT_SUB_HEADER_SELECTOR . "{ font-family: " . get_theme_mod('typography_sub_header') . "; }";
		}
		if(defined('ECKO_FONT_POST_FAMILY') && get_theme_mod('typography_post', 'Theme Default') !== "Theme Default"){
			$font_styles .= ECKO_FONT_POST_SELECTOR . "{ font-family: " . get_theme_mod('typography_post') . "; }";
		}
		if($font_styles){
		?>
			<style>
				<?php echo $font_styles; ?>
			</style>
		<?php
		}
	}
	add_action('wp_head', 'ecko_add_custom_fonts'); 



	/*-----------------------------------------------------------------------------------*/
	/* 7. CUSTOMIZER
	/*-----------------------------------------------------------------------------------*/


	function ecko_customize_register($wp_customize){

		/*
		 * GENERAL SECTION
		 */
		$wp_customize->add_section('general_section',
			array(
				'title' => 'General',
				'description' => 'This section contains general theme options.',
				'priority' => 9,
			)
		);

		$wp_customize->add_setting('general_blog_description',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('general_blog_description',
			array(
				'label' => 'Blog Profile Description',
				'section' => 'general_section',
				'type' => 'textarea',
			)
		);

		$wp_customize->add_setting('general_use_custom_date_format',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_use_custom_date_format',
			array(
				'type' => 'checkbox',
				'label' => 'Use WordPress Date Format',
				'section' => 'general_section',
			)
		);

		$wp_customize->add_setting('general_hidecomments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_hidecomments',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Comments on Load',
				'section' => 'general_section',
			)
		);

		$wp_customize->add_setting('general_disable_syntax_highlighter',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_disable_syntax_highlighter',
			array(
				'type' => 'checkbox',
				'label' => 'Disable Syntax Highlighter',
				'section' => 'general_section',
			)
		);

		$wp_customize->add_setting('general_use_extended_char_set',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_use_extended_char_set',
			array(
				'type' => 'checkbox',
				'label' => 'Use Extended Character Set',
				'section' => 'general_section',
			)
		);

		$wp_customize->add_setting('general_use_unminified_css',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_use_unminified_css',
			array(
				'type' => 'checkbox',
				'label' => 'Use Unminified CSS Source',
				'section' => 'general_section',
			)
		);

		$wp_customize->add_setting('general_disqus_plugin_support',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('general_disqus_plugin_support',
			array(
				'type' => 'checkbox',
				'label' => 'Enable Disqus Plugin Support',
				'section' => 'general_section',
			)
		);


		/*
		 * TYPOGRAPHY SECTION
		 */
		$wp_customize->add_section('typography_section',
			array(
				'title' => 'Typography',
				'description' => 'This section contains theme typography/font options.',
				'priority' => 10,
			)
		);

		if(defined('ECKO_FONT_BODY_FAMILY')){
			$wp_customize->add_setting('typography_body',
			array(
				'default' => 'Theme Default',
				'sanitize_callback' => 'ecko_sanitize_allow_html'
			));
			$wp_customize->add_control('typography_body',
				array(
					'label' => 'Body Font',
					'section' => 'typography_section',
					'type' => 'select',
					'choices' => ecko_get_google_font_list()
				)
			);
		}

		if(defined('ECKO_FONT_BODY_ALT_FAMILY')){
			$wp_customize->add_setting('typography_body_alernative',
			array(
				'default' => 'Theme Default',
				'sanitize_callback' => 'ecko_sanitize_allow_html'
			));
			$wp_customize->add_control('typography_body_alernative',
				array(
					'label' => 'Body (Alternative) Font',
					'section' => 'typography_section',
					'type' => 'select',
					'choices' => ecko_get_google_font_list()
				)
			);
		}

		if(defined('ECKO_FONT_HEADER_FAMILY')){
			$wp_customize->add_setting('typography_header',
			array(
				'default' => 'Theme Default',
				'sanitize_callback' => 'ecko_sanitize_allow_html'
			));
			$wp_customize->add_control('typography_header',
				array(
					'label' => 'Header Font',
					'section' => 'typography_section',
					'type' => 'select',
					'choices' => ecko_get_google_font_list()
				)
			);
		}

		if(defined('ECKO_FONT_SUB_HEADER_FAMILY')){
			$wp_customize->add_setting('typography_sub_header',
			array(
				'default' => 'Theme Default',
				'sanitize_callback' => 'ecko_sanitize_allow_html'
			));
			$wp_customize->add_control('typography_sub_header',
				array(
					'label' => 'Sub Header Font',
					'section' => 'typography_section',
					'type' => 'select',
					'choices' => ecko_get_google_font_list()
				)
			);
		}

		if(defined('ECKO_FONT_POST_FAMILY')){
			$wp_customize->add_setting('typography_post',
			array(
				'default' => 'Theme Default',
				'sanitize_callback' => 'ecko_sanitize_allow_html'
			));
			$wp_customize->add_control('typography_post',
				array(
					'label' => 'Post Font',
					'section' => 'typography_section',
					'type' => 'select',
					'choices' => ecko_get_google_font_list()
				)
			);
		};


		/*
		 * BRANDING SECTION
		 */
		$wp_customize->add_section('branding_section',
			array(
				'title' => 'Branding',
				'description' => 'This section contains branding/logo theme options.',
				'priority' => 11,
			)
		);

		$wp_customize->add_setting('general_blog_image',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'general_blog_image',
				array(
					'label' => 'Blog Logo',
					'section' => 'branding_section',
					'settings' => 'general_blog_image'
				)
			)
		);

		$wp_customize->add_setting('general_blog_image_retina',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'general_blog_image_retina',
				array(
					'label' => 'Blog Logo (Retina - @2x file name)',
					'section' => 'branding_section',
					'settings' => 'general_blog_image_retina'
				)
			)
		);

		$wp_customize->add_setting('general_blog_light_image',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'general_blog_light_image',
				array(
					'label' => 'Blog Logo (Light)',
					'section' => 'branding_section',
					'settings' => 'general_blog_light_image'
				)
			)
		);

		$wp_customize->add_setting('general_blog_image_light_retina',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'general_blog_image_light_retina',
				array(
					'label' => 'Blog Logo (Light) (Retina - @2x file name)',
					'section' => 'branding_section',
					'settings' => 'general_blog_image_light_retina'
				)
			)
		);

		if(!function_exists('has_site_icon') || !has_site_icon()){
			$wp_customize->add_setting('general_fav_icon',
			array(
				'sanitize_callback' => 'ecko_sanitize_file_upload'
			));
			$wp_customize->add_control(
				new WP_Customize_Image_Control($wp_customize, 'general_fav_icon',
					array(
						'label' => 'Blog Favicon (PNG)',
						'section' => 'branding_section',
						'settings' => 'general_fav_icon'
					)
				)
			);
		}


		/*
		 * SOCIAL SECTION
		 */
		$wp_customize->add_section('social_section',
			array(
				'title' => 'Social Profiles',
				'description' => 'This section contains options for social profiles.',
				'priority' => 39,
			)
		);

		$wp_customize->add_setting('social_twitter',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_twitter',
			array(
				'label' => 'Twitter Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_facebook',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_facebook',
			array(
				'label' => 'Facebook Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_google',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_google',
			array(
				'label' => 'Google+ Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_dribbble',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_dribbble',
			array(
				'label' => 'Dribbble Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_instagram',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_instagram',
			array(
				'label' => 'Instagram Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_github',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_github',
			array(
				'label' => 'Github Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_youtube',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_youtube',
			array(
				'label' => 'Youtube Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_pinterest',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_pinterest',
			array(
				'label' => 'Pinterest Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_linkedin',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_linkedin',
			array(
				'label' => 'LinkedIn Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_skype',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_skype',
			array(
				'label' => 'Skype URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_tumblr',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_tumblr',
			array(
				'label' => 'Tumblr URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_flickr',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_flickr',
			array(
				'label' => 'Flickr Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_reddit',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_reddit',
			array(
				'label' => 'Reddit Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_stackoverflow',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_stackoverflow',
			array(
				'label' => 'StackOverflow Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_twitch',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_twitch',
			array(
				'label' => 'Twitch Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_vine',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_vine',
			array(
				'label' => 'Vine Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_vk',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_vk',
			array(
				'label' => 'VK Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_vimeo',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_vimeo',
			array(
				'label' => 'Vimeo Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_weibo',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_weibo',
			array(
				'label' => 'Weibo Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('social_soundcloud',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('social_soundcloud',
			array(
				'label' => 'Soundcloud Profile URL',
				'section' => 'social_section',
				'type' => 'text',
			)
		);


		/*
		 * COLORS SECTION
		 */
		$wp_customize->add_setting('color_enable_custom',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('color_enable_custom',
			array(
				'type' => 'checkbox',
				'label' => 'Enable Custom Colors (Below)',
				'section' => 'colors',
			)
		);

		$wp_customize->add_setting('color_accent',
			array(
				'default' => '#000',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_accent',
				array(
					'label'      => 'Color Accent',
					'section'    => 'colors',
					'settings'   => 'color_accent'
				)
			)
		);

		$wp_customize->add_setting('color_accent_light',
			array(
				'default' => '#000',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_accent_light',
				array(
					'label'      => 'Color Accent Light',
					'section'    => 'colors',
					'settings'   => 'color_accent_light'
				)
			)
		);

		$wp_customize->add_setting('color_accent_dark',
			array(
				'default' => '#000',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_accent_dark',
				array(
					'label'      => 'Color Accent Dark',
					'section'    => 'colors',
					'settings'   => 'color_accent_dark'
				)
			)
		);


		/*
		 * OPENGRAPH SECTION
		 */
		$wp_customize->add_section('og_section',
			array(
				'title' => 'OpenGraph',
				'description' => 'This section contains options for OpenGraph integration.',
				'priority' => 42,
			)
		);

		$wp_customize->add_setting('og_disable',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('og_disable',
			array(
				'type' => 'checkbox',
				'label' => 'Disable OpenGraph Integration',
				'section' => 'og_section',
			)
		);

		$wp_customize->add_setting('og_facebook_app_id',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('og_facebook_app_id',
			array(
				'label' => 'Facebook App ID',
				'section' => 'og_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('og_facebook_admin_id',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('og_facebook_admin_id',
			array(
				'label' => 'Facebook Admin ID',
				'section' => 'og_section',
				'type' => 'text',
			)
		);


		/*
		 * COPYRIGHT SECTION
		 */
		$wp_customize->add_section('copyright_section',
			array(
				'title' => 'Copyright',
				'description' => 'This section contains options copyright disclaimer.',
				'priority' => 43,
			)
		);

		$wp_customize->add_setting('copyright_hide_disclaimer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('copyright_hide_disclaimer',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Copyright Disclaimer',
				'section' => 'copyright_section',
			)
		);

		$wp_customize->add_setting('copyright_hide_wordpress',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('copyright_hide_wordpress',
			array(
				'type' => 'checkbox',
				'label' => 'Hide "Published By" text' ,
				'section' => 'copyright_section',
			)
		);

		$wp_customize->add_setting('copyright_hide_ecko',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('copyright_hide_ecko',
			array(
				'type' => 'checkbox',
				'label' => 'Hide "Theme by Ecko" text',
				'section' => 'copyright_section',
			)
		);

		$wp_customize->add_setting('copyright_upper_html',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('copyright_upper_html',
			array(
				'type' => 'text',
				'label' => 'Override Upper Copyright HTML',
				'section' => 'copyright_section',
			)
		);

		$wp_customize->add_setting('copyright_lower_html',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('copyright_lower_html',
			array(
				'type' => 'text',
				'label' => 'Override Lower Copyright HTML',
				'section' => 'copyright_section',
			)
		);


		/*
		 * ADVANCED SECTION
		 */
		$wp_customize->add_section('advanced_section',
			array(
				'title' => 'Advanced',
				'description' => 'This section contains advanced theme options.',
				'priority' => 130,
			)
		);

		$wp_customize->add_setting('advanced_custom_css',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('advanced_custom_css',
			array(
				'type' => 'textarea',
				'label' => 'Custom Theme CSS',
				'section' => 'advanced_section',
			)
		);


	}
	add_action('customize_register', 'ecko_customize_register');

