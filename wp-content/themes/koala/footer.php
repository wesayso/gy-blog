<?php

	/**
	 * FOOTER TEMPLATE
	 */

?>
	
	
	<footer class="page-footer">

		<?php get_template_part('layouts/pagination'); ?>
		
		<?php get_template_part('layouts/footer-nextprev'); ?>


		<aside class="footer-widgets">
			<div class="wrapper-body">
				<?php 
					if(is_active_sidebar('footer')){
						dynamic_sidebar('footer');
					}else{
						koala_get_default_footer_widgets();
					}
				?>
			</div>
		</aside>
		<section class="copyright">
			<div class="wrapper-body">
				<?php get_template_part('layouts/copyright'); ?>
				<ul class="social">
					<?php if(get_theme_mod('social_twitter') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" class="twitter" title="Twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_dribbble') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_dribbble')); ?>" target="_blank" class="dribbble" title="Dribbble"><i class="fa fa-dribbble"></i>Dribbble</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_facebook') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" class="facebook" title="Facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_google') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_google')); ?>" target="_blank" class="google" title="Google+"><i class="fa fa-google"></i>Google+</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_tumblr') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_tumblr')); ?>" target="_blank" class="tumblr" title="Tumblr"><i class="fa fa-tumblr"></i>Tumblr</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_youtube') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank" class="youtube" title="YouTube"><i class="fa fa-youtube"></i>YouTube</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_instagram') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" class="instagram" title="Instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_linkedin') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" class="linkedin" title="LinkedIn"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_github') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_github')); ?>" target="_blank" class="github" title="GitHub"><i class="fa fa-github"></i>GitHub</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_pinterest') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_pinterest')); ?>" target="_blank" class="pinterest" title="Pinterest"><i class="fa fa-pinterest"></i>Pinterest</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_flickr') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_flickr')); ?>" target="_blank" class="flickr" title="Flickr"><i class="fa fa-flickr"></i>Flickr</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_reddit') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_reddit')); ?>" target="_blank" class="reddit" title="Reddit"><i class="fa fa-reddit"></i>Reddit</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_stackoverflow') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_stackoverflow')); ?>" target="_blank" class="stackoverflow" title="StackOverflow"><i class="fa fa-stack-overflow"></i>Stack Overflow</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_twitch') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_twitch')); ?>" target="_blank" class="twitch" title="Twitch"><i class="fa fa-twitch"></i>Twitch</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_vine') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_vine')); ?>" target="_blank" class="vine" title="Vine"><i class="fa fa-vine"></i>Vine</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_vk') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_vk')); ?>" target="_blank" class="vk" title="VK"><i class="fa fa-vk"></i>VK</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_vimeo') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_vimeo')); ?>" target="_blank" class="vimeo" title="Vimeo"><i class="fa fa-vimeo-square"></i>Vimeo</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_weibo') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_weibo')); ?>" target="_blank" class="weibo" title="Weibo"><i class="fa fa-weibo"></i>Weibo</a></li>
					<?php } ?>
					<?php if(get_theme_mod('social_soundcloud') != ""){ ?>
						<li><a href="<?php echo esc_url(get_theme_mod('social_soundcloud')); ?>" target="_blank" class="soundcloud" title="Soundcloud"><i class="fa fa-soundcloud"></i>Soundcloud</a></li>
					<?php } ?>
				</ul>
			</div>
		</section>
		<div class="backtotop"><i class="fa fa-angle-double-up"></i></div>
	</footer>


	<?php wp_footer(); ?>
</body>
</html>
