<?php

/*

Template Name: 友情链接

*/
?>

<?php get_header(); ?>
	<div class="search_header" style="background: url('<?php echo of_get_option( 'friend_banner' ); ?>') no-repeat center;">
		<h1><?php wp_title( '#'); ?></h1>
	</div>

	<div class="container friends p-0" role="main">
		<div class="row">
			<?php
			$bookmarks = get_bookmarks( array(
				'orderby'        => 'name',
				'order'          => 'ASC',
			));
			foreach ( $bookmarks as $bookmark ) {
				printf( '
                    <li class="col-3 friend_card">
                        <a class="friend_content" target="_blank" href="'.$bookmark->link_url.'">
                            <span>'. $bookmark->link_name .'</span>
                            <span>'.$bookmark->link_url.'</span>
                            <span>'.$bookmark->link_description.'</span>
                            <span><img src="'.is_has_friend_ico($bookmark->link_url).'" alt=""></span>
                        </a>
                    </li>');
			}
			?>





		</div>
	</div>


<?php get_footer(); ?>