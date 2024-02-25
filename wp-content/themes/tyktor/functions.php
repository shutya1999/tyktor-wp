<?php

add_action( 'wp_enqueue_scripts', 'tyktor_srtle');

function tyktor_srtle() {
//    wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
    wp_enqueue_style( 'components', get_stylesheet_directory_uri() . '/assets/css/components.css' , null, '1.2');

    wp_enqueue_script( 'components', get_stylesheet_directory_uri() . '/assets/js/components.min.js', array(), '1.2', true );
}

add_theme_support( 'post-thumbnails' );

// Register menu
add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'main_menu' => 'Головне меню',
    ) );
});


function getSocial($name){
    $socialArr = [];
    if (get_field('instagram', 14) !== ''){
        $socialArr['instagram'] = get_field('instagram', 14);
    }

    if (get_field('facebook', 14) !== ''){
        $socialArr['facebook'] = get_field('facebook', 14);
    }

    if (get_field('telegram', 14) !== ''){
        $socialArr['telegram'] = get_field('telegram', 14);
    }

    if (get_field('tik-tok', 14) !== ''){
        $socialArr['tik-tok'] = get_field('tik-tok', 14);
    }

    if (get_field('twitter', 14) !== ''){
        $socialArr['twitter'] = get_field('twitter', 14);
    }

    if (get_field('monobank', 14) !== ''){
        $socialArr['monobank'] = get_field('monobank', 14);
    }

    if (get_field('patreon', 14) !== ''){
        $socialArr['patreon'] = get_field('patreon', 14);
    }
    return get_field($name, 14);
}
