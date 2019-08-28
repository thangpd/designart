<?php
add_action('wp_enqueue_scripts', 'add_script_frontend');
function add_script_frontend() {
    //congfig for js
    $scriptsConfig=[
        'script_demo'  =>  'script_demo.js',
        'cookies'  =>  'cookies.js',
        'main-js'  =>  'main.js',
        'pageload-js'  =>  'loader.js'
    ];
    //congfig for css
    $stylesConfig=[
        'style_demo'  =>  'style.css',
        'base'  =>  'base.css',
        'top-page'  =>  'top.css',
        'exhibiter-page'  =>  'exhibiter.css',
        'top-black-page' => 'top-black.css',
        'blog-page' => 'blogs.css',
        'about-page' => 'about.css',
        'event-party' => 'event-party.css',
        'official-goodcafe' => 'official-goodcafe.css',
        'access' => 'access.css',
    ];

    foreach ($scriptsConfig as $id => $linkJs) {
        wp_enqueue_script($id, URL_STATICS.'/js/'.$linkJs, ['jquery']);
    }

    foreach ($stylesConfig as $id => $linkCss) {
        wp_enqueue_style($id, URL_STATICS.'/css/'.$linkCss);
    }

}
