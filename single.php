<?php get_header(); ?>
<div class="container single p-0">
	<div class="row single-content">
		<div class="col-lg-8">
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>

		</div>
		<div class="col-lg-4">
			<?php if(is_active_sidebar('sidebar')) : ?>
				<?php dynamic_sidebar('sidebar'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer() ?>

