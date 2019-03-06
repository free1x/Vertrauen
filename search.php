
<?php get_header(); ?>
<div class="search_header" style="background: url('<?php echo of_get_option( 'search_banner' ); ?>') no-repeat center;">
    <h1><?php wp_title( '#'); ?></h1>
</div>
<div class="container search_content" role="main">
    <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-sm-4 search_box">
            <div class="search_end">
                <div class="search_screen">
                    <?php if ( has_post_thumbnail() ) {
                       echo "<img src='".get_the_post_thumbnail_url( $post_id )."'>";
                    }else{
                        echo "<img src='".of_get_option("search_thumb")."' alt>";
                    };?>
                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 30, '...'); ?></a>
                     <div class="search_page">
                        <p class="search_meta">
                            <i class="far fa-calendar-alt"></i> <?php the_time('Y年n月j日'); ?>
                            <i class="fas fa-user"></i> <?php the_author_posts_link(); ?>

                            <i class="fas fa-comments"></i><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                            <a class="search_more" href="<?php echo get_permalink( $post_id ); ?>">阅读全文<i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>

            <p>No results :(</p>

        <?php endif; ?>
    </div>




</div>


<?php get_footer(); ?>
