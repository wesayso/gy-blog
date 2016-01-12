<?php

	/**
	 * TOP BAR
	 */

	$cover_logo = get_theme_mod('general_blog_light_image');

	if(!isset($top_bar_class)){
		$top_bar_class = "";
	}

?>

	<div class="top-bar top-bar-main <?php echo esc_attr($top_bar_class);?>">
		<div class="wrapper-body">
			<div class="logo">
				<?php if($cover_logo != ""){ ?>
					<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($cover_logo); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
				<?php }else{ ?>
					<h2 itemprop="headline"><a href="<?php echo esc_url(home_url()); ?>"><?php esc_html(bloginfo('name')); ?></a></h2>
				<?php } ?>
			</div>
			<nav>
				<div class="option responsivenav"><span class="shownav"><i class="fa fa-bars"></i></span></div>
				<div class="option searchnav"><span class="showsearch"><i class="fa fa-search"></i></span></div>
				<div class="menu-main-container">
					<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
				</div>			
			</nav>
			<div class="searchbar">
				<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
					<input type="text" value="" name="s" class="query" placeholder="<?php esc_attr_e('Enter Search Query...', 'koala'); ?>" autocomplete="off">
					<span class="submit"><?php esc_attr_e('Search', 'koala'); ?></span>
				</form>
			</div>
			<div class="responsivemenu">
				<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>