<?php

/*

Template Name: 精华模板

*/

?>

<?php get_header(); ?>

	<!-- Container -->

	<div class="CON" style="width: 980px;">

		<!-- Start SC -->

		<div class="SC" style="width: 960px;">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="Post" id="post-<?php the_ID(); ?>">

					<h2 class="pagetitle"><?php the_title(); ?></h2>

					<?php the_content('<p class="serif">阅读全部 &raquo;</p>'); ?>

					<?php if(function_exists('wp_thumbnails_for_popular_posts')) { wp_thumbnails_for_popular_posts('num=100'); } ?>

				</div>

				<?php if ( comments_open() ) comments_template(); ?>

			<?php endwhile; endif; ?>

			<?php edit_post_link('编辑本文.', '<p>', '</p>'); ?>

		</div>

		<!-- End SC -->

	</div>

	<!-- End CON -->

<?php get_footer(); ?>