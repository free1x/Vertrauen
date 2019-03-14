<?php get_header(); ?>
<div class="container single p-0">
	<div class="row single-content">
		<div class="col-lg-8">
            <div class="post_tools">
                <div class="post_like favorite">
                    <a href="#" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['Vertrauen_ding_'.$post->ID])) echo ' done';?>">
                        <span class="post_like_count">
                            <i class="fas fa-heart">
                                  <b>
                                       <?php if( get_post_meta($post->ID,'Vertrauen_ding',true) ){
	                                       echo get_post_meta($post->ID,'Vertrauen_ding',true);
                                       } else {
	                                       echo '0';
                                       }?>
                                  </b>
                            </i>

                        </span>
                    </a>
                </div>
            </div>
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
		                <?php the_content(); ?>
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

