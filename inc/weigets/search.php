<?php


class My_Widget extends WP_Widget {

	function My_Widget()
	{
		$widget_ops = array('description' => '主题定制搜索栏','classname' => 'widget_test');
		// $control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false,$name='搜索栏',$widget_ops);

		//parent::直接使用父类中的方法
		//$name 这个小工具的名称,
		//$widget_ops 可以给小工具进行描述等等。
		//$control_ops 可以对小工具进行简单的样式定义等等。一般没有特殊要求的话，不需要设置。
	}

	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<?php
	}
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在前台页面上
		extract( $args );
		// 标题
		$title = apply_filters('widget_title', empty($instance['title']) ? __('搜索') : $instance['title']);

		getContent($title);
	}
}
register_widget('My_Widget');

// 自定义DOM结构，可以按照你主题的风格来自定义编写
function getContent($title) {
	echo '<section class="side-widget">
            <h3>'.$title.'</h3>	
          	<form role="search" method="get" id="searchform" class="searchform" action="'.home_url('/').'">
				<div>
					<input type="text" value="" name="s" id="s">
					<button type="submit" class="sidebar_form-submit"><i class="fas fa-search"></i></button>
				</div>
			</form>
    </section>';
}
?>