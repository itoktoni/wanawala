<?php

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
Filter::add('body_class', function ($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
});

Filter::add('excerpt_length', function(){
    return 20;
});

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
Action::add('wp_head', function () {
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="' . esc_url(get_bloginfo('pingback_url')) . '">';
    }
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
Action::add('after_setup_theme', function () {
    $GLOBALS['content_width'] = 640;
}, 0);

Action::add('customize_register', function ($wp_customize) {

    $wp_customize->add_setting(
        'theme_block',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'theme_block',
        array(
            'label'      => __('Template Thumnail', 'textdomain'),
            'description' => __('how number box for thumnail', 'textdomain'),
            'settings'   => 'theme_block',
            'priority'   => 10,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ));

    $wp_customize->add_setting(
        'citraleka_block',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'citraleka_block',
        array(
            'label'      => __('Citraleka Thumnail', 'textdomain'),
            'description' => __('how number box for Citraleka', 'textdomain'),
            'settings'   => 'citraleka_block',
            'priority'   => 10,
            'section'    => 'title_tagline',
            'type'       => 'text',
        )
    ));

    $wp_customize->add_setting(
        'error',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'error',
        array(
            'label'      => __('Description Error', 'textdomain'),
            'description' => __('how number box for Citraleka', 'textdomain'),
            'settings'   => 'error',
            'priority'   => 10,
            'section'    => 'title_tagline',
            'type'       => 'textarea',
        )
    ));

});

Action::add('after_setup_theme', function(){
    remove_theme_support( 'widgets-block-editor' );
});