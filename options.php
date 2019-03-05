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
        'std' => 'White',
        'type' => 'color',
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
        'name' => __( '关键字设置', 'Vertrauen_Setting' ),
        'desc' => __( '请用,区分间隔符', 'Vertrauen_Setting' ),
        'id' => 'SEO_KEYWORD',
        'placeholder' => 'Vertrauen,主题,极简',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '站点描述', 'Vertrauen_Setting' ),
        'desc' => __( '站点描述', 'Vertrauen_Setting' ),
        'id' => 'SEO_DES',
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
        'id' => "PAGE_LAYOUT",
        'std' => "1col-fixed",
        'type' => "images",
        'options' => array(
            '1col-fixed' => $imagepath . '1col.png',
            '2c-r-fixed' => $imagepath . '2cr.png'
        )
    );

    $options[] = array(
        'name' => __( '搜索页面头图', 'Vertrauen_Setting' ),
        'desc' => __( '添加一张图在搜索页面展示.', 'Vertrauen_Setting' ),
        'id' => 'search_banner',
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
        'name' => __( '推荐文章ID', 'Vertrauen_Setting' ),
        'desc' => __( '头图推荐ID.', 'Vertrauen_Setting' ),
        'id' => 'banner_title',
        'placeholder' => '文章ID',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '文章推荐描述', 'Vertrauen_Setting' ),
        'desc' => __( '填写推荐描述内容.', 'Vertrauen_Setting' ),
        'id' => 'banner_info',
        'placeholder' => 'The minimalist design of the front end creates this perfect Vertrauen theme, giving it a unique soul!',
        'type' => 'textarea'
    );

    //页脚设置
    $options[] = array(
        'name' => __( '页脚设置', 'Vertrauen_Setting' ),
        'type' => 'heading'
    );



    //结束

    $options[] = array(
		'name' => __( 'Basic Settings', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Input Text Mini', 'theme-textdomain' ),
		'desc' => __( 'A mini text input field.', 'theme-textdomain' ),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input Text', 'theme-textdomain' ),
		'desc' => __( 'A text input field.', 'theme-textdomain' ),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input with Placeholder', 'theme-textdomain' ),
		'desc' => __( 'A text input field with an HTML5 placeholder.', 'theme-textdomain' ),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Textarea', 'theme-textdomain' ),
		'desc' => __( 'Textarea description.', 'theme-textdomain' ),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Input Select Small', 'theme-textdomain' ),
		'desc' => __( 'Small Select Box.', 'theme-textdomain' ),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Input Select Wide', 'theme-textdomain' ),
		'desc' => __( 'A wider select box.', 'theme-textdomain' ),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array
	);

	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', 'theme-textdomain' ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', 'theme-textdomain' ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	if ( $options_tags ) {
		$options[] = array(
			'name' => __( 'Select a Tag', 'options_check' ),
			'desc' => __( 'Passed an array of tags with term_id and term_name', 'options_check' ),
			'id' => 'example_select_tags',
			'type' => 'select',
			'options' => $options_tags
		);
	}

	$options[] = array(
		'name' => __( 'Select a Page', 'theme-textdomain' ),
		'desc' => __( 'Passed an pages with ID and post_title', 'theme-textdomain' ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);

	$options[] = array(
		'name' => __( 'Input Radio (one)', 'theme-textdomain' ),
		'desc' => __( 'Radio select with default options "one".', 'theme-textdomain' ),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Example Info', 'theme-textdomain' ),
		'desc' => __( 'This is just some example information you can put in the panel.', 'theme-textdomain' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Input Checkbox', 'theme-textdomain' ),
		'desc' => __( 'Example checkbox, defaults to true.', 'theme-textdomain' ),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Advanced Settings', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Check to Show a Hidden Text Input', 'theme-textdomain' ),
		'desc' => __( 'Click here and see what happens.', 'theme-textdomain' ),
		'id' => 'example_showhidden',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Hidden Text Input', 'theme-textdomain' ),
		'desc' => __( 'This option is hidden unless activated by a checkbox click.', 'theme-textdomain' ),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Uploader Test', 'theme-textdomain' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'example_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'name' =>  __( 'Example Background', 'theme-textdomain' ),
		'desc' => __( 'Change the background CSS.', 'theme-textdomain' ),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => __( 'Multicheck', 'theme-textdomain' ),
		'desc' => __( 'Multicheck description.', 'theme-textdomain' ),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array
	);

	$options[] = array(
		'name' => __( 'Colorpicker', 'theme-textdomain' ),
		'desc' => __( 'No color selected by default.', 'theme-textdomain' ),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array( 'name' => __( 'Typography', 'theme-textdomain' ),
		'desc' => __( 'Example typography.', 'theme-textdomain' ),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography'
	);

	$options[] = array(
		'name' => __( 'Custom Typography', 'theme-textdomain' ),
		'desc' => __( 'Custom typography options.', 'theme-textdomain' ),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);

	$options[] = array(
		'name' => __( 'Text Editor', 'theme-textdomain' ),
		'type' => 'heading'
	);

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