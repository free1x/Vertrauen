<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery('#example_showhidden').click(function() {
                jQuery('#section-example_text_hidden').fadeToggle(400);
            });

            if (jQuery('#example_showhidden:checked').val() !== undefined) {
                jQuery('#section-example_text_hidden').show();
            }

        });
    </script>

<?php
}

/*
 * This is an example of filtering menu parameters <a href="". get_permalink($post->ID) . "">阅读更多</a>
 */

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );
function prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Vertrauen 主题设置', 'Vertrauen_Setting');
	$menu['menu_title'] = __( '主题设置', 'Vertrauen_Setting');
	$menu['menu_slug'] = 'Vertrauen-options';
	return $menu;
}


add_filter('admin_footer_text', 'Vertrauen_footer_text');
function Vertrauen_footer_text() {
    $copy = '<span id="footer-thankyou">Thanks for using <a href="https://nco.im/">Vertrauen</a> Theme By WordPress.</span>';
    return $copy;
}

add_filter( 'wp_title', 'Vertrauen_wp_title', 10, 2 );
function Vertrauen_wp_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
        return $title;
    if(is_search())
        return $title;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page()) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'Vertrauen' ), max( $paged, $page ) );
    return $title;
}

register_nav_menus( array(
    'headerTools'    => '顶部辅助栏',
    'headerNav'    => '顶部导航栏',
    'footerNav'    => '底部导航栏',
) );


add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ){
    add_image_size( 'category-thumb', 1000, 400 );
    add_image_size( 'homepage-thumb', 1000, 400);
    add_image_size( 'search-thumb', 1000, 400);
}


function Vertrauen_widgets($id){
	register_sidebar(array(
		'name' => '侧边栏',
		'id' => 'sidebar',
		'before_widget' => '<div class="side-widget">','after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

add_action('widgets_init', 'Vertrauen_widgets');


function custom_posts_per_page($query){
	if(is_home()){
		$query->set('posts_per_page', of_get_option( 'page_list_num', '4' ));//首页每页显示8篇文章
	}
	if(is_search()){
		$query->set('posts_per_page',-1);//搜索页显示所有匹配的文章，不分页
	}
	if(is_archive()){
		$query->set('posts_per_page',25);//archive每页显示25篇文章
	}//endif
}//function

//this adds the function above to the 'pre_get_posts' action
add_action('pre_get_posts','custom_posts_per_page');


function Vertrauen_page( $range = 4 ) {
	global $paged,$wp_query;
	$max_page = '';
	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
	if( $max_page >1 ) {
		echo "<div class='paging'>";
		if( !$paged ){
			$paged = 1;
		}
//		if( $paged != 1 ) {
//			echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
//		}

		if ( $max_page >$range ) {
			if( $paged <$range ) {
				for( $i = 1; $i <= ($range +1); $i++ ) {
					echo "<a href='".get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";echo ">$i</a>";
				}
			}elseif($paged >= ($max_page -ceil(($range/2)))){
				for($i = $max_page -$range;$i <= $max_page;$i++){
					echo "<a href='".get_pagenum_link($i) ."'";
					if($i==$paged)echo " class='current'";echo ">$i</a>";
				}
			}elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
				for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
					echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
				}
			}
		}else{
			for($i = 1;$i <= $max_page;$i++){
				echo "<a href='".get_pagenum_link($i) ."'";
				if($i==$paged)echo " class='current'";echo ">$i</a>";
			}
		}
		next_posts_link('<i class="fas fa-chevron-right"></i>');
		previous_posts_link('<i class="fas fa-chevron-left"></i>');
//		if($paged != $max_page){
//			echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
//		}
//		echo '<span>共['.$max_page.']页</span>';
		echo "</div>\n";
	}
}


add_filter( 'pre_option_link_manager_enabled', '__return_true' );