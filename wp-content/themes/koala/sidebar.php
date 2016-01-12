<?php

	/**
	 * SIDEBAR - LEFT
	 */

?>

	<aside class="sidebar sidebar-page">

		<?php
			if(is_single()){
				if(is_active_sidebar('sidebar-post')){
					dynamic_sidebar('sidebar-post');
				}else{
					koala_get_default_widgets();
				}
			}else{
				if(is_active_sidebar('sidebar-page')){
					dynamic_sidebar('sidebar-page');
				}else{
					koala_get_default_widgets();
				}
			}
		?>

	</aside>
	