<?php


class Search_Widget extends WP_Widget {

	function Search_Widget()
	{
		$widget_ops = array('description' => '主题定制搜索栏','classname' => 'widget_search');
		parent::WP_Widget(false,$name='搜索栏',$widget_ops);
	}
	function widget($args, $instance) {
		getContent();
	}
}
register_widget('Search_Widget');
function getContent() {
	echo '<section class="side-widget">
          	<form role="search" method="get" id="searchform" class="searchform" action="'.home_url('/').'">
				<div class="search_form_content">
					<input type="text" value="" name="s" id="s" placeholder="请输入关键词搜索">
					<button type="submit" class="sidebar_form-submit"><i class="fas fa-search"></i></button>
				</div>
			</form>
    </section>';
}




