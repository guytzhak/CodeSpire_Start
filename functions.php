<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

Class CodeSpire_FrameWork {
    
    public function __construct() {

        add_action( 'after_setup_theme', array($this, 'cs_theme_setup') );
        add_action( 'wp_enqueue_scripts', array($this, 'cs_style_and_scripts'));
        $this->helper();
    }

    /**
     * Setup Theme Functions
     */
    public function cs_theme_setup() {
        load_theme_textdomain( 'cs', get_template_directory() . '/languages' );

        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-width' => true,
        ) );

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'image', 'gallery', 'video' ));
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array(
            'gallery',
            'caption',
        ) );

    }

    /** Call to JS & CSS **/
    function cs_style_and_scripts() {

        /*wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() .'/css/bootstrap.min.css' );
        if(is_rtl()){
            wp_enqueue_style( 'bootstrap-rtl-css', get_stylesheet_directory_uri() .'/css/bootstrap-rtl.min.css' );
        }
        wp_enqueue_style( 'bootstrap-accessibility-css', get_stylesheet_directory_uri() .'/css/bootstrap-accessibility.css' );*/
        wp_enqueue_style( 'main-css', get_stylesheet_uri() );


        /*wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
        wp_enqueue_script( 'bootstrap-accessibility-js', get_stylesheet_directory_uri() . '/js/bootstrap-accessibility.min.js', array('jquery'), '1.6.0', true );*/
        wp_enqueue_script( 'myscripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );

    }

    
    public function helper(){
        include_once('inc/core_func.php');
	include_once('inc/security.php');
    } 
    
}
// Install Theme
$theme = new CodeSpire_FrameWork();


?>
