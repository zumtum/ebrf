	<footer>
		<?php 
		$argFootMenu = array(
			'theme_location'  => 'bottom',
			'menu'            => '', 
			'container'       => false, 
			'container_class' => 'wrapper', 
			'container_id'    => '',
			'menu_class'      => 'footer-menu', 
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => '',
		);
		wp_nav_menu( $argFootMenu );
		?>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>