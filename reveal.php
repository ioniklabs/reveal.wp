<?php

if ( !defined( 'WPINC' ) ) die;

if (!is_admin() && is_user_logged_in()) {

  add_action('after_setup_theme', function () {
    add_theme_support('admin-bar', array('callback' => '__return_false'));
  });

  add_action( 'wp_enqueue_scripts', function() {
    $css = "#wpadminbar{
              -webkit-transform: translateY(-100%);
              -ms-transform: translateY(-100%);
              transform: translateY(-100%);
              -webkit-transition: -webkit-transform 0.3s;
              transition: transform 0.3s;
              -webkit-transition-delay: 2s;
              transition-delay: 2s;
            }
            #wpadminbar:after{
              content: '';
              display: block;
              height: 5px;
              background: #23282d;
              width: 80px;
              position: absolute;
              bottom: -5px;
              left: 50%;
              margin-left: -40px;
              -webkit-transform: translateY(0);
              -ms-transform: translateY(0);
              transform: translateY(0);
              -webkit-transition: -webkit-transform 0.3s;
              transition: transform 0.3s;
              -webkit-transition-delay: 2s;
              transition-delay: 2s;
            }
            #wpadminbar:hover{
              -webkit-transform: translateY(0);
              -ms-transform: translateY(0);
              transform: translateY(0);
              -webkit-transition-delay: 0.3s;
              transition-delay: 0.3s;
            }
            #wpadminbar:hover:after{
              -webkit-transform: translateY(-5px);
              -ms-transform: translateY(-5px);
              transform: translateY(-5px);
              -webkit-transition-delay: 0.3s;
              transition-delay: 0.3s;
            }";
    wp_enqueue_style('reveal-wp', 'reveal.css');
    wp_add_inline_style( 'reveal-wp', $css );
  } );

}