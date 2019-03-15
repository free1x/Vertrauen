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
		                    <?php
		                    if ( has_post_thumbnail() ) {
			                    echo "<img src='".get_the_post_thumbnail_url( $post_id )."'>";
		                    }else{
			                    echo "<img src='".of_get_option("search_thumb")."' alt>";
		                    };
		                    ?>
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
                                <span><i class="fas fa-comments"></i><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
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
	<article style="margin-top: 150px; display: none">

		<header class="entry-header">

            <p>Use of_get_option($id,$default) to return option values.</p>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<h3>About</h3>

			<p>This is the adapted theme version of the Options Framework plugin, which makes it easy to include an options panel for any theme.</p>

			<h3>How to Include in Your Own Project</h3>

			<p>Just drag the admin folder of this theme, options.php and functions.php into the theme of your choice.</p>

			<hr>

			<h3>Basic Options</h3>

			<dl>
			<dt>type: text (mini)</dt>
			<dd>of_get_option('example_text_mini'): <?php echo of_get_option( 'example_text_mini', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: text</dt>
			<dd>of_get_option('example_text'): <?php echo of_get_option( 'example_text', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: textarea</dt>
			<dd>of_get_option('example_textarea'): <?php echo of_get_option( 'example_textarea', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: select (mini)</dt>
			<dd>of_get_option('example_select'): <?php echo of_get_option( 'example_select', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: select2 (wide)</dt>
			<dd>of_get_option('example_select_wide'): <?php echo of_get_option( 'example_select_wide', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: select</dt>
			<dd>of_get_option('example_select_categories'): category id = <?php echo of_get_option( 'example_select_categories', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: select</dt>
			<dd>of_get_option('example_select_tags'): term id = <?php echo of_get_option( 'example_select_tags', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: select</dt>
			<dd>of_get_option('example_select_pages'): page id = <?php echo of_get_option( 'example_select_pages', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: radio</dt>
			<dd>of_get_option('example_radio'): <?php echo of_get_option( 'example_radio', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: checkbox</dt>
			<dd>of_get_option('example_checkbox'): <?php echo of_get_option( 'example_checkbox', 'no entry' ); ?></dd>
			</dl>

			<hr>

			<h3>Advanced Options</h3>

			<dl>
			<dt>type: uploader</dt>
			<dd>of_get_option('example_uploader'): <?php echo of_get_option( 'example_uploader', 'no entry' ); ?></dd>
			<?php if ( of_get_option( 'example_uploader' ) ) { ?>
			<img src="<?php echo of_get_option( 'example_uploader' ); ?>" />
			<?php } ?>
			</dl>

			<dl>
			<dt>type: image</dt>
			<dd>of_get_option('images'): <?php echo of_get_option( 'example_images', 'no entry' ); ?></dd>
			</dl>

			<dl>
			<dt>type: multicheck</dt>
			<dd>of_get_option('multicheck'):
			<?php $multicheck = of_get_option( 'example_multicheck', 'none' ); ?>
			<?php print_r($multicheck); ?>
			</dd>
			</dl>

			<p>The array sent in the options panel was defined as:<br>
			<?php
			$test_array_jr = array( "one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle" );
			print_r( $test_array_jr );
			?>
			</p>

			<p>You can get the value of all items in the checkbox array:</p>
			<ul>
			<?php
			if ( is_array( $multicheck ) ) {
				foreach ( $multicheck as $key => $value ) {
					// If you need the option's name rather than the key you can get that
					$name = $test_array_jr[$key];
					// Prints out each of the values
					echo '<li>' . $key . ' (' . $name . ') = ' . $value . '</li>';
				}
			}
			else {
				echo '<li>There are no saved values yet.</li>';
			}
			?>
			</ul>

			<p>You can also get an individual checkbox value if you know what you are looking for.  In this example, I'll check for the key "one", which is an item I sent in the array for checkboxes:</p>

			<p>The value of the multicheck box "one" of example_multicheck is:
			<b>
			<?php
			if ( isset( $multicheck['one'] ) ) {
				echo $multicheck['one'];
			} else {
				echo 'no entry';
			}
			?>
			</b>
			</p>

			<dl>
			<dt>type: background</dt>
			<dd>of_get_option('background'):
			<?php $background = of_get_option('example_background');
			if ( $background ) {
				if ( $background['image'] ) {
					echo '<span style="display: block; height: 200px; width: 200px; background:url(' . $background['image'] . ') "></span>';
					echo '<ul>';
					foreach ( $background as $i=> $param ){
						echo '<li>'.$i . ' = ' . $param . '</li>';
				}
				echo '</ul>';
				} else {
					echo '<span style="display: inline-block; height: 20px; width: 20px; background:' . $background['color'] . ' "></span>';
					echo '<ul>';
					echo '<li>'.$background['color'].'</li>';
					echo '</ul>';
				}
			} else {
				echo "no entry";
			}; ?>
			</span>
			</dd>
			</dl>

			<dl>
			<dt>type: colorpicker</dt>
			<dd>of_get_option('colorpicker'):
			<span style="color:<?php echo of_get_option( 'example_colorpicker', '#000' ); ?>">
			<?php echo of_get_option( 'example_colorpicker', 'no entry' ); ?>
			</span>
			</dd>
			</dl>

			<dl>
			<dt>type: typography</dt>
			<dd>of_get_option('typography'):
			<?php $typography = of_get_option('example_typography');
			if ( $typography ) {
				echo '<ul>';
				foreach ( $typography as $i => $param ) {
					echo '<li>'.$i . ' = ' . $param . '</li>';
				}
				echo '</ul>';
				echo '<span style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">Some sample text in your style</span>';
			} else {
				echo "no entry";
			} ?>
			</dd>
			</dl>

			<hr>

			<h3>Editor</h3>

			<dl>
			<dt>type: editor</dt>
			<dd>of_get_option('example_editor'):<br>
			<?php echo of_get_option( 'example_editor', 'no entry'); ?>
			</dd>
			</dl>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php get_footer(); ?>