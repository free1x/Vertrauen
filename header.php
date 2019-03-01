<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php  $transfer = get_stylesheet_directory(); ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
            <title><?php wp_title('-','-');?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo $transfer.'/static/css/style.css' ?>" type="text/css">
        <script src=""></script>
    </head>

<body <?php body_class(); ?>>

	<div id="page">