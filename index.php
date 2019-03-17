<?php
/**
 * The main template file.
 *
 * This theme is purely for the purpose of testing theme options in Options Framework plugin.
 *
 * @package WordPress
 * @subpackage Options Framework Theme
 */

get_header(); ?>


<?php  if (of_get_option( 'content_banner', 'no entry' )){ ?>
<div class="container-fluid banner row" style="background: url('<?php echo of_get_option( 'banner_back_content' ); ?>') no-repeat center;">
    <div class="container banner_content row">
        <div class="banner_info col-5" onclick="location.href='<?php echo get_permalink(of_get_option( 'banner_title' )); ?>'">
            <img src="<?php echo of_get_option( 'banner_content' ); ?>" alt="">
            <div class="banner_title"><?php echo get_post(of_get_option( 'banner_title' ))->post_title; ?></div>
        </div>

        <div class="banner_content_main col-7">
            <ul class="row">
		        <?php
		        $singleUrl = get_permalink($post_id);

		        $cats = wp_get_post_categories($post->ID);

		        if ($cats) {

			        $args = array(
				        'category__in' => array(of_get_option('banner_id','0')),
				        'showposts' => 4,
				        'caller_get_posts' => 1,

			        );
			        query_posts($args);
			        if (have_posts()) :
				        while (have_posts()) : the_post(); update_post_caches($posts); ?>
                            <li<?php if(get_permalink($post_id)==$singleUrl){?> <?php }?> class="col-6 banner_content_info" onclick="location.href='<?php echo get_permalink(); ?>'">
	                            <?php if ( has_post_thumbnail() ) {
		                            echo "<img src='".get_the_post_thumbnail_url( $post_id )."'>";
	                            }else{
		                            echo "<img src='".of_get_option("search_thumb")."' alt>";
	                            };?>
                              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </li>
				        <?php endwhile; else : ?>
                        <li class="banner_notice"> 当前分类下暂无文章</li>
			        <?php endif; wp_reset_query(); } ?>                                                        </ul>
        </div>
    </div>
</div>

<?php } ?>

<div class="container content" id="content">
   <div class="post_content row">
       <div class="content_page_list col-8 <?php if(of_get_option( 'page_layout') == true){echo 'col-fixed';} ?>">
		   <?php
		   if (have_posts()) :
			   while (have_posts()) :
				   the_post();

		   ?>
                    <div class="page_content_list <?php if(of_get_option( 'page_layout') == true){echo 'page_content_max';}else{echo '';} ?>">
                        <div class="post_list_screen <?php if(of_get_option( 'page_layout') == true){echo 'col-4';}else{echo 'col-5';} ?>">
                            <a href="<?php the_permalink(); ?>">
	                            <?php
	                            if ( has_post_thumbnail() ) {
		                            echo "<img src='".get_the_post_thumbnail_url( $post_id )."'>";
	                            }else{
		                            echo "<img src='".of_get_option("search_thumb")."' alt>";
	                            };
	                            ?>
                            </a>
                            <span><?php $the_post_category = get_the_category(get_the_ID()); echo $the_post_category[0]->cat_name; ?></span>
                        </div>
                        <div class="post_list_content <?php if(of_get_option( 'page_layout') == true){echo 'col-8';}else{echo 'col-7';} ?>">
                            <h2 id="post-<?php the_ID(); ?>">
                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 30, '...'); ?></a>
                            </h2>
                            <div class="post_list_content_text <?php if(of_get_option( 'page_layout') == true){echo 'post_list_text_num';}else{echo '';} ?>">
                                <?php if(of_get_option( 'page_layout') == true){$textNum = 350;}else{$textNum = 200;} ?>
	                            <?php echo wp_trim_words(get_the_content(), $textNum, '...'); ?>
                            </div>
                            <small>
                                <span><i class="far fa-calendar-alt"></i> <?php the_time('Y年n月j日'); ?></span>
                                <span><i class="far fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
                                <span><i class="fas fa-comments"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>条评论</a></span>
                            </small>
                        </div>
                        <div class="clearfix"></div>
                    </div>



				   <?php
			   endwhile;
		   endif;
		   ?>
	       <?php  Vertrauen_page()?>
       </div>
       <div class="content_sidebar col-4 <?php if(of_get_option( 'page_layout') == true){echo 'd-none';} ?>">
	       <?php if(is_active_sidebar('sidebar')) : ?>
		       <?php dynamic_sidebar('sidebar'); ?>
	       <?php endif; ?>
       </div>
   </div>
</div>

<?php get_footer() ?>
