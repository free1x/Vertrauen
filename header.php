<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php  $transfer = get_stylesheet_directory_uri().'/static/'; ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
            <title><?php wp_title('-','-');?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo $transfer.'/css/bootstrap.min.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo $transfer.'/css/style.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo $transfer.'/fonts/all.css'?>" type="text/css">
        <script src="<?php echo $transfer.'/js/jquery-3.3.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo $transfer.'/js/bootstrap.min.js' ?>" type="text/javascript"></script>
    </head>

<body <?php body_class(); ?>>
    <div class="container">123</div>



	<div id="page">