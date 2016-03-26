<?php


// правильный способ подключить стили и скрипты
function theme_name_index() {
    wp_enqueue_style( 'vendorcss', get_template_directory_uri().'/css/vendor.css' );

    if (is_front_page())
        wp_enqueue_style('indexcss', get_template_directory_uri() . '/css/index.css');
    else if (is_page(78)) {
        wp_enqueue_style('indexcss', get_template_directory_uri() . '/css/contact.css');
  //      wp_enqueue_script('grecaptcha','https://www.google.com/recaptcha/api.js');  //для страницы контактов дополнительно подключаем grecapthca
    }
    else
        wp_enqueue_style( 'portfoliocss', get_template_directory_uri().'/css/portfolio.css' );

    wp_enqueue_style( 'wpcss', get_template_directory_uri().'/css/wp.css' ); //дополнительный css - для изменений от исходных


 //   wp_enqueue_script('vendorjs', get_template_directory_uri() . '/js/vendor.js',true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js',true);
}


add_action( 'wp_enqueue_scripts', 'theme_name_index' );


add_theme_support( 'post-thumbnails' );//поддержка миниатюр в постах


function theme_register_nav_menu() {
    register_nav_menus ( array(
        'primary' => 'Главное меню',
        'primary2' => 'Верхнее меню'
    ) );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

