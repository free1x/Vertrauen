<?php get_header(); ?>
<div class="container single p-0">
	<div class="row single-content">
		<div class="col-lg-8">
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			<div class="single-detail">
				<div class="single_title">
					<?php the_title(); ?>
                </div>
               <div class="single_info">
                   <span> <i class="far fa-calendar-alt"></i> <?php the_time('Y年n月j日'); ?></span>
                  <span> <i class="fas fa-comments"></i><?php comments_number(); ?></span>
               </div>
                <div class="single_post">
	                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		                <?php echo the_content(); ?>
	                <?php endwhile; endif; ?>
                </div>
            </div>




		</div>
		<div class="col-lg-4">
			<?php if(is_active_sidebar('sidebar')) : ?>
				<?php dynamic_sidebar('sidebar'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer() ?>

