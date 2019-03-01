<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if (of_get_option( 'content_prayer', 'no entry' )){echo 'style="FILTER: gray;-webkit-filter: grayscale(100%);"';}  ?>>
    <head>
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
        <div class="container">
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
        <div class="container header_container">
            <div class="header_logo">
                <img src="<?php echo of_get_option( 'content_logo' ); ?>" alt="233">
                <span><?php echo of_get_option( 'seo_title', 'no entry' ); ?></span>
                <div class="clearfix"></div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <div class="header_nav">
                        <?php
                        wp_nav_menu( array( 'theme_location' => 'headerNav','顶部辅助栏'  => 'headerNav','container_class'  => 'headerNav', 'fallback_cb' => 'default_menu' ) );
                        ?>
                    </div>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
       <div class="container">


       </div>
</header>

	<div id="page">