

<?php get_header(); ?>
    <div class="search_header" style="background: url('<?php echo of_get_option( 'default_banner' ); ?>') no-repeat center;">
        <h1><?php wp_title( '#'); ?></h1>
    </div>
    <div class="page container">
        <div class="row">
            <div class="col-lg-8 article">
		        <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
                <div class="single-detail">
                    <div class="single_title">
				        <?php the_title(); ?>
                    </div>
                    <div class="single_info">
                        <span> <i class="far fa-calendar-alt"></i> <?php the_time('Y年n月j日'); ?></span>
                        <span><i class="fab fa-wpforms"></i><?php echo count_words ($text); ?></span>
                        <span><i class="fas fa-comment-alt"></i><?php echo get_comments_number(); ?>条评论</span>
                        <span><i class="far fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>

                    </div>
                    <div class="single_post">
				        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					        <?php setPostViews(get_the_ID()); ?>
					        <?php the_content(); ?>
				        <?php endwhile; endif; ?>
                    </div>
                    <div class="single_tag"></div>
                </div>


		        <?php comments_template(); ?>

            </div>
            <div class="col-lg-4">
		        <?php if(is_active_sidebar('sidebar')) : ?>
			        <?php dynamic_sidebar('sidebar'); ?>
		        <?php endif; ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>