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
 * This is an example of filtering menu parameters
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
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
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