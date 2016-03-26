<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="<?php //echo get_template_directory_uri() ?>js/html5shiv.js"></script>
    <![endif]-->
    <title>Выпускной проект ученика LoftSchool</title>
    <meta name="keywords" content="спартак портфолио ученик loftschool">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" type="image/x-icon">
    <?php wp_head() ?>
</head>
<body class="portfolio">

<div class="wrapper">
    <header class="header ">
        <div class="header-container  " >
            <a href="<?php get_home_url() ?>" class="logo"  >
                <img src="<?php echo get_template_directory_uri() ?>/images/logo-logaster-shadow-24.png"  alt="loftschool. От мыслителя к создателю" class="logo-image">
                <span class="logo-text">loftschool. От мыслителя к создателю</span>
            </a>

            <ul class="socials ">
                <li class="social-item">
                    <a href="https://www.facebook.com/ViserMort?ref=bookmarks" class="social-item-link sprite facebook">
                        facebook
                    </a>
                </li>
                <li class="social-item">
                    <a href="http://vk.com/id1519895" class="social-item-link sprite vk">
                        vkontakte
                    </a>
                </li>
                <li class="social-item">
                    <a href="https://twitter.com/ViserMort" class="social-item-link sprite twitter">
                        twitter
                    </a>
                </li>
                <li class="social-item">
                    <a href="https://github.com/visermort" class="social-item-link sprite github">
                        github
                    </a>
                </li>
                <li class="social-item menu-button">
                    <a href="#" class="social-item-link sprite menu-button">
                        menu
                    </a>
                </li>
            </ul>
        </div>
        <?php
        wp_nav_menu ( array (
            "container_class" => "nav topmenu",
            "theme_location" => "primary2",
            "after" => ''
        ));
        ?>

    </header>
    <div class="content clearfix">