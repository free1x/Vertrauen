<?php


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// 载入后台框架
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );


add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

//提交后台基本配置
function prefix_options_menu_filter( $menu ) {
$menu['mode'] = 'menu';
$menu['page_title'] = __( ' Vertrauen 主题设置', 'textdomain');
$menu['menu_title'] = __( '主题设置', 'textdomain');
$menu['menu_slug'] = 'VertrauenSetting';
return $menu;
}

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );

//修改后台底部版权
function Vertrauen_footer_text($text) {

    $text = '<span id="footer-thankyou">感谢使用 <a href="https://nco.im/">Vertrauen</a> 主题. 基于 WordPress 开发.</span>';

    return $text;

}
add_filter('admin_footer_text', 'Vertrauen_footer_text');


//

