<?php 
//namespace
namespace Raziul\ProductGallery\Admin;
if(!defined('ABSPATH')){
    exit;
}
class Dashboard{

    /**
     * class construct
     */
    public function __construct(){
       add_action('admin_menu', [$this, 'admin_dashboard']);
       add_action('admin_menu', array( $this, 'menu_remove' ), 99);
    }

    public function menu_remove(){
        remove_submenu_page('wooc-product-swiper-gallery', 'wooc-product-swiper-gallery');
    }

    /**
     * Admin Dashboard
     *
     * @return void
     */
    
    public function admin_dashboard(){
        add_menu_page(
            __('Themexriver', 'wooc-product-swiper-gallery'), 
            __('Themexriver', 'wooc-product-swiper-gallery'), 
            'manage_options', 
            'wooc-product-swiper-gallery', 
            [$this, 'plugin_page'], 
            'dashicons-table-row-before', 
            55
        );
    }

    /**
     * Plugin Page
     *
     * @return void
     */
    public function plugin_page(){
        echo __("Welcome To Woocommerce", 'wooc-product-swiper-gallery');
    }
}