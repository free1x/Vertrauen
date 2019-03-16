<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/static/images/';

	$options = array();



	//主题设置开始
    //全局设置
    $options[] = array(
        'name' => __( '全局设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '站点 LOGO', 'Vertrauen_Setting' ),
        'desc' => __( '不添加显示文字标题，推荐图片尺寸 50px*50px，保存成功则自动显示Logo图片.', 'Vertrauen_Setting' ),
        'id' => 'content_logo',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '站点配色', 'Vertrauen_Setting' ),
        'desc' => __( '站点头部颜色', 'Vertrauen_Setting' ),
        'id' => 'content_color',
        'std' => '#eef3f9',
        'type' => 'color',
    );

	$options[] = array(
		'name' => __( 'LOGO文字描述', 'Vertrauen_Setting' ),
		'desc' => __( '是否开启LOGO文字描述', 'Vertrauen_Setting' ),
		'id' => 'content_logo_text',
		'std' => '1',
		'type' => 'checkbox'
	);

    $options[] = array(
        'name' => __( '头部辅助栏', 'Vertrauen_Setting' ),
        'desc' => __( '是否开启辅助栏', 'Vertrauen_Setting' ),
        'id' => 'content_nav',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __( '导航栏浮动', 'Vertrauen_Setting' ),
        'desc' => __( '开启后导航栏跟随页面顶部', 'Vertrauen_Setting' ),
        'id' => 'content_header',
        'std' => '1',
        'type' => 'checkbox'
    );
    $options[] = array(
        'name' => __( '搜索功能', 'Vertrauen_Setting' ),
        'desc' => __( '是否开启 搜索功能', 'Vertrauen_Setting' ),
        'id' => 'content_search',
        'std' => '1',
        'type' => 'checkbox'
    );
    $options[] = array(
        'name' => __( 'Font Awesome 图标', 'Vertrauen_Setting' ),
        'desc' => __( '是否开启 Font Awesome 图标库', 'Vertrauen_Setting' ),
        'id' => 'content_icon',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __( '思源黑体 CDN', 'Vertrauen_Setting' ),
        'desc' => __( '是否开启 思源黑体 CDN 加载', 'Vertrauen_Setting' ),
        'id' => 'content_fonts',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __( '站点黑白', 'Vertrauen_Setting' ),
        'desc' => __( '是否启用站点黑白功能(一般常用于悼念日)', 'Vertrauen_Setting' ),
        'id' => 'content_prayer',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __( '打赏链接', 'Vertrauen_Setting' ),
        'id' => 'example_placeholder',
        'type' => 'upload'
    );
    //全局结束

    //SEO
    $options[] = array(
        'name' => __( 'SEO设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '网站标题', 'Vertrauen_Setting' ),
        'desc' => __( '网站标题', 'Vertrauen_Setting' ),
        'id' => 'seo_title',
        'placeholder' => 'Vertrauen',
        'class' => 'mini',
        'std' => 'Vertrauen',
        'type' => 'text'
    );

	$options[] = array(
		'name' => __( '副标题设置', 'Vertrauen_Setting' ),
		'desc' => __( '请填写网站副标题', 'Vertrauen_Setting' ),
		'id' => 'seo_site_description',
		'placeholder' => '副标题',
		'type' => 'text'
	);

    $options[] = array(
        'name' => __( '关键字设置', 'Vertrauen_Setting' ),
        'desc' => __( '请用,区分间隔符', 'Vertrauen_Setting' ),
        'id' => 'seo_keyword',
        'placeholder' => 'Vertrauen,主题,极简',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '站点描述', 'Vertrauen_Setting' ),
        'desc' => __( '站点描述', 'Vertrauen_Setting' ),
        'id' => 'seo_des',
        'placeholder' => '前端的简约设计营造出完美的Vertrauen主题，赋予其独特的灵魂！',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __( '统计代码设置', 'Vertrauen_Setting' ),
        'desc' => __( '请用JavaScript代码录入，使用	&lt;script&gt;统计代码&lt;script&gt;', 'Vertrauen_Setting' ),
        'id' => 'SEO_SCRIPT',
        'placeholder' => '<script></script>',
        'type' => 'textarea'
    );

    //页面设置
    $options[] = array(
        'name' => __( '页面设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => "页面布局设置",
        'desc' => "页面布局供你选择展开式和分栏布局.",
        'id' => "page_layout",
        'std' => "true",
        'type' => "images",
        'options' => array(
            true => $imagepath . '1col.png',
            false => $imagepath . '2cr.png'
        )
    );

	$options[] = array(
		'name' => __( '首页文章展示数', 'Vertrauen_Setting' ),
		'desc' => __( '文章展示数', 'Vertrauen_Setting' ),
		'id' => 'page_list_num',
		'placeholder' => '4',
		'class' => 'mini',
		'std' => '5',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '全局页面头图', 'Vertrauen_Setting' ),
		'desc' => __( '添加一张图在全局页面展示.', 'Vertrauen_Setting' ),
		'id' => 'default_banner',
		'type' => 'upload'
	);

    $options[] = array(
        'name' => __( '搜索页面头图', 'Vertrauen_Setting' ),
        'desc' => __( '添加一张图在搜索页面展示.', 'Vertrauen_Setting' ),
        'id' => 'search_banner',
        'type' => 'upload'
    );

	$options[] = array(
		'name' => __( '友情链接页面头图', 'Vertrauen_Setting' ),
		'desc' => __( '添加一张图在友情链接页面展示.', 'Vertrauen_Setting' ),
		'id' => 'friend_banner',
		'type' => 'upload'
	);

    $options[] = array(
        'name' => __( '文章默认缩略图', 'Vertrauen_Setting' ),
        'desc' => __( '添加一张图在列表页面展示.', 'Vertrauen_Setting' ),
        'id' => 'search_thumb',
        'type' => 'upload'
    );



    //banner
    $options[] = array(
        'name' => __( '推荐设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '轮播图', 'Vertrauen_Setting' ),
        'desc' => __( '是否启用 Banner 推荐', 'Vertrauen_Setting' ),
        'id' => 'content_banner',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __( '推荐背景展现图', 'Vertrauen_Setting' ),
        'desc' => __( '添加一张图在首页背景展示.', 'Vertrauen_Setting' ),
        'id' => 'banner_back_content',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '推荐展现图', 'Vertrauen_Setting' ),
        'desc' => __( '添加一张图在首页展示.', 'Vertrauen_Setting' ),
        'id' => 'banner_content',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '推荐主文章ID', 'Vertrauen_Setting' ),
        'desc' => __( '头图推荐ID.', 'Vertrauen_Setting' ),
        'id' => 'banner_title',
        'placeholder' => '文章ID',
        'type' => 'text'
    );


	$options[] = array(
		'name' => __( '推荐分类ID', 'Vertrauen_Setting' ),
		'desc' => __( '分类ID.', 'Vertrauen_Setting' ),
		'id' => 'banner_id',
		'placeholder' => '分类ID',
		'type' => 'text'
	);

    //页脚设置
    $options[] = array(
        'name' => __( '页脚设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );



	$options[] = array(
		'name' => __( '页脚内容介绍标题', 'Vertrauen_Setting' ),
		'desc' => __( '介绍标题', 'Vertrauen_Setting' ),
		'id' => 'footer_title',
		'placeholder' => '标题',
		'class' => 'mini',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '页脚主内容', 'Vertrauen_Setting' ),
		'desc' => __( '填写页脚主内容.', 'Vertrauen_Setting' ),
		'id' => 'footer_content',
		'placeholder' => '页脚内容介绍',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( '微信二维码', 'Vertrauen_Setting' ),
		'desc' => __( '微信公众号或者个人微信二维码', 'Vertrauen_Setting' ),
		'id' => 'footer_wechat',
		'placeholder' => '',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Github 链接', 'Vertrauen_Setting' ),
		'desc' => __( 'Github 项目或者个人主页链接', 'Vertrauen_Setting' ),
		'id' => 'footer_github',
		'placeholder' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '底部自定义版权', 'Vertrauen_Setting' ),
		'desc' => __( '填写底部自定义版权内容', 'Vertrauen_Setting' ),
		'id' => 'footer_copy',
		'placeholder' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'ICP备案号', 'Vertrauen_Setting' ),
		'desc' => __( '填写底部ICP备案号内容', 'Vertrauen_Setting' ),
		'id' => 'footer_record',
		'placeholder' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '底部自定义菜单名称', 'Vertrauen_Setting' ),
		'desc' => __( '底部菜单名称', 'Vertrauen_Setting' ),
		'id' => 'footer_nav',
		'placeholder' => '菜单名称',
		'class' => 'mini',
		'std' => '',
		'type' => 'text'
	);
    //结束


	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	return $options;
}