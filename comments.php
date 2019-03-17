<?php if ( comments_open() ) { ?>
    <div class="comments-alpha mt-3">
        <h3 class="title mb-3"><?php _e('文章评论','Vertrauen') ?>（<?php comments_number('0', '1', '%'); ?>）</h3>
        <div class="list">
			<?php  wp_list_comments(
			         array(
        'walker'            => null,
        'max_depth'         => '',
        'style'             => 'ul',
        'callback'          => null,
        'end-callback'      => null,
        'type'              => 'all',
        'page'              => '',
        'per_page'          => '',
        'avatar_size'       => 64,
        'reverse_top_level' => null,
        'reverse_children'  => '',
        'format'            => 'html5',
        'short_ping'        => false,
        'echo'              => true,
    )
            ); ?>
        </div>
        <div id="comment_page" class="nav text-center my-3">
			<?php previous_comments_link( __('Load More' , 'Vertrauen') ); ?>
        </div>
        <div id="respond" class="comment-respond mt-2">
			<?php if ( !comments_open() ) : elseif ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                <div class="error text-center">
					<?php printf( __( 'You must <a href="%s">login</a> to comment','Vertrauen' ) , wp_login_url( get_permalink()) ); ?>
                </div>
			<?php else : ?>
                <form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
                    <div class="comment-from">
						<?php if ( !is_user_logged_in() ) : ?>
                            <div class="comment-info mb-3 row">
                                <div class="col-md-6 comment-form-author">
                                    <input class="form-control" id="author" placeholder="昵称" name="author" type="text" value="" required="required">
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0 comment-form-email">
                                    <input id="email" class="form-control" name="email" placeholder="邮箱" type="email" value="" required="required">
                                </div>
                            </div>
						<?php endif; ?>
                        <div class="comment-textarea">
                            <textarea class="form-control" id="comment" name="comment" rows="7" required="required"></textarea>
                            <div class="text-bar clearfix">
                                <div class="float-right comment-submit">
									<?php cancel_comment_reply_link(__('Cancel', 'Vertrauen')); ?>
                                    <input name="submit" type="submit" id="submit" class="btn btn-primary" value="<?php _e('提交评论', 'Vertrauen'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
                </form>

			<?php endif; ?>
        </div>
    </div>
<?php } ?>