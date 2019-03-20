<?php get_header(); ?>
<div class="container single p-0">
	<div class="row single-content ">
        <div class="col-lg-1">
            <div class="post_tools ">
                <div class="post_like favorite <?php if(isset($_COOKIE['Vertrauen_ding_'.$post->ID])) echo ' done';?>">
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

                <div class="shareContent">

                </div>
            </div>
        </div>
		<div class="col-lg-7 article">
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


	                <?php  if (of_get_option( 'page_notice' )){ ?>
                        <span class="page_notice">
                        作品采用知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议进行许可
                        </span>
	                <?php } ?>

                </div>
                <div class="single_tools">
                    <div class="single_tags">
                        标签：
	                    <?php
                        if(has_tag()){
	                        $posttags = get_the_tags();
	                        foreach($posttags as $key => $value){ ?>
                                <span><a href="<?php echo get_tag_link($value); ?>"><?php echo $value->name; ?></a></span>
	                        <?php  }
                        }else{
                            echo "<span>暂无</span>";
                        }
	                    ?>
                    </div>
                    <div class="single_copy">
                        © 著作权归作者所有
                    </div>
                    <div class="clearfix"></div>
                </div>
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
<?php get_footer() ?>

