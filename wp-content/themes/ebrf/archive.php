<?php get_header(); ?>
<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
?>
<main>
	<div class="wrapper">
		<?php if (!dynamic_sidebar("catalog-widget-area") ) : ?> 
		<?php endif; ?>
	</div>
	<?php get_template_part( 'templates/mfo', 'search' ); ?>
	<div class="wrapper">
		<div class="catalog aside-wrapper">
			<?php get_template_part( 'templates/aside', 'mfo' ); ?>
			<?php if ( have_posts() ) : ?>
				<?php if ($term_id == '') : ?>
				<div class="catalog__content">
					<h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
					<?php get_template_part( 'templates/company', 'sort' ); ?>
					<?php if ($_GET && !empty($_GET)) { // если было передано что-то из формы
						go_mfo_filter(); // запускаем функцию фильтрации
					} ?>
					<?php while( have_posts() ){ 
						the_post();
						get_template_part( 'templates/company', 'preview' );
					}
					if (  $wp_query->max_num_pages > 1 ) : ?>
					<script>
					var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
					var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
					var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
					var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
					</script>
					<div id="true_loadmore" class="btn loadmore">Загрузить ещё</div>
					<?php endif;
					wp_reset_query();
					?>
					<?php get_template_part( 'templates/union', 'order' ); ?>
				</div>
				<?php else: ?>
					<div class="catalog__content">
						<div class="term-head">
							<div class="term-head-content">
								<h1 class="archive-title"><?php single_cat_title(); ?></h1>
							</div>
						</div>
						<?php get_template_part( 'templates/company', 'sort' ); ?>
						<?php if ($_GET && !empty($_GET)) { // если было передано что-то из формы
							go_mfo_filter(); // запускаем функцию фильтрации
						} ?>
						<?php while( have_posts() ){ 
							the_post();
							get_template_part( 'templates/company', 'preview' );
						}
						if (  $wp_query->max_num_pages > 1 ) : ?>
						<script>
						var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
						var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
						var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
						var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
						</script>
						<div id="true_loadmore" class="btn loadmore">Загрузить ещё</div>
						<?php endif;
						wp_reset_query();
						?>
						<?php get_template_part( 'templates/union', 'order' ); ?>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="catalog__content">
					<h1 class="archive-title">Займы не найдены.</h1>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>