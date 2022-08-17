<?php

// Add custom style in child theme 

function wpr_add_style()
{
    wp_enqueue_style(
        'wpr-academy-style',
        get_stylesheet_directory_uri() . '/style.css',
        [],
        null
    );
}

add_action('wp_enqueue_scripts', 'wpr_add_style');

//Add topbar before header 

function add_before_headers()
{
    echo '<div class="before-header">Facebook Instagram</div>';
}

add_action('astra_head_top', 'add_before_headers');

// Add custom post templates 

function include_template_files($template)
{
    $themedir = dirname(__FILE__);

    if ('post' == get_post_type()) {
        $templatefilename = 'single-post.php';
        $template = $themedir . '/templates/' . $templatefilename;
        return $template;
    }
    return $template;
}

add_filter('template_include', 'include_template_files');
