<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if (of_get_option( 'content_prayer', 'no entry' )){echo 'style="FILTER: gray;-webkit-filter: grayscale(100%);"';}  ?>>
    <head>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <?php  $transfer = get_stylesheet_directory_uri().'/static/'; ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
            <title><?php wp_title('-','-');?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo $transfer.'/css/bootstrap.min.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo $transfer.'/css/style.css' ?>" type="text/css">
        <?php  if (of_get_option( 'content_icon', 'no entry' )){ ?>
        <link rel="stylesheet" href="<?php echo $transfer.'/fonts/all.css'?>" type="text/css">
        <?php } ?>
        <script src="<?php echo $transfer.'/js/jquery-3.3.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo $transfer.'/js/bootstrap.min.js' ?>" type="text/javascript"></script>
        <?php  if (of_get_option( 'content_fonts', 'no entry' )){ ?>
        <style>@import "https://fonts.googleapis.com/earlyaccess/notosanssc.css";*{font-family: Noto Sans SC,sans-serif}</style>
        <?php } ?>
    </head>

<body <?php body_class(); ?> style="background:<?php echo of_get_option( 'content_color', '#000' ); ?>">


<?php  if (of_get_option( 'content_nav', 'no entry' )){ ?>
    <div class="container-fluid headerTools" >
        <div class="container Tools_container">
            <div class="headerToolsTime">
                <?php echo "当前时间 : ",date("Y 年 m 月 d 日",time()),"<br>" ?>
            </div>
            <div class="headerToolsNav">
                <?php
                wp_nav_menu( array( 'theme_location' => 'headerTools','顶部辅助栏'  => 'headerTools-Nav','container_class'  => 'headerTools-Nav', 'fallback_cb' => 'default_menu' ) );
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } ?>

<header class="container-fluid header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container header_container ">
            <a href="<?php echo home_url(); ?>" class="header_home_url">
                <div class="header_logo">
                    <?php  if (of_get_option( 'content_logo', 'no entry' )){ ?>
                        <img src="<?php echo of_get_option( 'content_logo' ); ?>" alt="233">
                    <?php } ?>
                    <span><?php echo of_get_option( 'seo_title', 'no entry' ); ?></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="header_nav">
                        <?php
                            wp_nav_menu( array( 'theme_location' => 'headerNav','顶部辅助栏'  => 'headerNav','container_class'  => 'headerNav', 'fallback_cb' => 'default_menu' ) );
                        ?>
                    </li>
                </ul>
                <?php  if (of_get_option( 'content_search', 'no entry' )){ ?>
                <form class="form-inline my-2 my-lg-0"  method="get" action="<?php echo home_url( '/' ); ?>">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" value="" name="s" id="s">
                    <button type="submit" class="form-submit"><i class="fas fa-search"></i></button>
                </form>
                 <?php } ?>
            </div>
        </div>
    </nav>
</header>

	<div id="page">