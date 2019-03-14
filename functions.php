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


add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Image' );
	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Nav_Menu_Widget' );


}

include_once get_stylesheet_directory() . '/inc/weigets/search.php';


function is_has_friend_ico($url){
	$link = $url.'/favicon.ico';
	$transfer = get_stylesheet_directory_uri().'/static/';
	if(@file_get_contents($link,0,null,0,1))
		return $link;
	else
		return $transfer.'/images/links.png';

}

function cmp_breadcrumbs() {
	$delimiter = '>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div  id="crumbs">'.__( null , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo '正文';
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}

add_action('wp_ajax_nopriv_Vertrauen_like', 'Vertrauen_like');
add_action('wp_ajax_Vertrauen_like', 'Vertrauen_like');
function Vertrauen_like(){
	global $wpdb,$post;
	$id = $_POST["um_id"];
	$action = $_POST["um_action"];
	if ( $action == 'ding'){
		$Vertrauen_raters = get_post_meta($id,'Vertrauen_ding',true);
		$expire = time() + 99999999;
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
		setcookie('Vertrauen_ding_'.$id,$id,$expire,'/',$domain,false);
		if (!$Vertrauen_raters || !is_numeric($Vertrauen_raters)) {
			update_post_meta($id, 'Vertrauen_ding', 1);
		}
		else {
			update_post_meta($id, 'Vertrauen_ding', ($Vertrauen_raters + 1));
		}

		echo get_post_meta($id,'Vertrauen_ding',true);

	}

	die;
}


