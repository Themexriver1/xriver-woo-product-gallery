<?php 
//namespace
namespace Raziul\ProductGallery;

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

class Product_Option{
    public function __construct(){
        $this->themeOption();
    }
    public function themeOption(){
        //
    // Set a unique slug-like ID
    $prefix = 'woopsg_opt';

    //
    // Create options
    \CSF::createOptions( $prefix, array(
        'menu_title'         => 'Gallery Option',
        'menu_slug'          => 'woopsg-theme-option',
        'menu_type'          => 'submenu',
        'menu_parent'          => 'wooc-product-swiper-gallery',
        'enqueue_webfont'    => true,
        'show_in_customizer' => true,
        'theme'                   => '',
        'nav'                   => 'inline',
        'class'                   => 'woopsg-porduct-opt',
        'menu_icon' => 'dashicons-category',
        'framework_title'    => '',
        'footer_text'    => wp_kses_post( 'The Plugin will Created By Themexriver ' ),
        'show_footer'             => false,
        'show_all_options'        => false,
        'show_form_warning'       => true,
        'sticky_header'           => false,
        'show_search'             => false,
        'show_reset_all'          => false,
    ) );



    /*-------------------------------------------------------
     ** Footer  Options
    --------------------------------------------------------*/
    
    \CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Slider Settings', 'wooc-product-swiper-gallery' ),
        'icon'   => 'fas fa-sliders-h',
        'fields' => array(
            
            array(
                'id'      => 'woopsg_autoplay',
                'type'    => 'switcher',
                'title'   => __('Slider Autoplay', 'wooc-product-swiper-gallery'),
                'label'   => __('You Can control Slider Autoplay Here', 'wooc-product-swiper-gallery'),
                'default' => true,
            ),
            array(
                'id'      => 'woopsg_slider_loop',
                'type'    => 'switcher',
                'title'   => __('Slider Loop', 'wooc-product-swiper-gallery'),
                'label'   => __('Infinity loop. Duplicate last and first items to get loop illusion.', 'wooc-product-swiper-gallery'),
                'default' => true
            ),
            array(
                'id'      => 'mousewheel',
                'type'    => 'switcher',
                'title'   => __('Mouse Wheel Scroll', 'wooc-product-swiper-gallery'),
                'label'   => __('You can scroll Slider in your Mouse Wheel Scroll', 'wooc-product-swiper-gallery'),
                'default' => false,
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                
            ),
            array(
                'id'      => 'st_keyboard',
                'type'    => 'switcher',
                'title'   => __('KeyBoard Scroll', 'wooc-product-swiper-gallery'),
                'label'   => __('You can scroll Slider in your Keyboard Arrow key', 'wooc-product-swiper-gallery'),
                'default' => false
            ),
            array(
                'id'      => 'st_navigation',
                'type'    => 'switcher',
                'title'   => __('Navigation Arrow', 'wooc-product-swiper-gallery'),
                'label'   => __('Slider Navigation Arrow Disable And enable Here', 'wooc-product-swiper-gallery'),
                'default' => false,
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'      => 'st_pagination',
                'type'    => 'switcher',
                'title'   => __('Pagination', 'wooc-product-swiper-gallery'),
                'label'   => __('Slider Pagination Dot Enabel or Disable Here', 'wooc-product-swiper-gallery'),
                'default' => false,
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            
            array(
                'id'      => 'st_speed',
                'type'    => 'slider',
                'title'   => __('Slider Speed', 'wooc-product-swiper-gallery'),
                'desc'   => __('Added Here Sliding Speed ', 'wooc-product-swiper-gallery'), 
                'default' => 15,
                'min'     => 0,
                'max'     => 5000000,
                'default' => 1000,
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
        ),
    ) );

    \CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Zoom Settings', 'wooc-product-swiper-gallery' ),
        'icon'   => 'fas fa-search-minus',
        'fields' => array(
            array(
                'id'      => 'lightbox_enable',
                'type'    => 'switcher',
                'title'   => __('Lightbox Image pupup', 'wooc-product-swiper-gallery'),
                'label'   => __('You can enable/disable image popup', 'wooc-product-swiper-gallery'),
                'default' => true
            ),
        ),
    ) );

    \CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Thumbnail Settings', 'wooc-product-swiper-gallery' ),
        'icon'   => 'fas fa-thumbtack',
        'fields' => array(
            array(
                'id'      => 'st_disable_thumbnail',
                'type'    => 'switcher',
                'title'   => __('Disable Thumbnail', 'wooc-product-swiper-gallery'),
                'label'   => __('You can Diable Thumbnail Here', 'wooc-product-swiper-gallery'),
                'default' => true,
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'          => 'page-spacing-blog',
                'type'        => 'spacing',
                'title'       => 'Active Thumbnail Padding',
                'output'      => '.product-details-slider-nav .swiper-slide-thumb-active',
                'output_mode' => 'padding', // or margin, relative
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'      => 'st_spaceBetween',
                'type'    => 'slider',
                'title'   => __('Space Between', 'wooc-product-swiper-gallery'),
                'desc'   => __('Slider Thumbnail Space Between', 'wooc-product-swiper-gallery'), 
                'default' => 15,
            ),
            array(
                'id'      => 'desktop_count',
                'type'    => 'slider',
                'title'   => __('Desktop Thumbnail Item', 'wooc-product-swiper-gallery'),
                'desc'   => __('Added Here Sliding Speed ', 'wooc-product-swiper-gallery'), 
                'max'     => 100,
                'default' => 4,
            ),
            array(
                'id'      => 'laptop_count',
                'type'    => 'slider',
                'title'   => __('Laptop Thumbnail Item', 'wooc-product-swiper-gallery'),
                'desc'   => __('Added Here Sliding Speed ', 'wooc-product-swiper-gallery'), 
                'max'     => 100,
                'default' => 4,
            ),
            array(
                'id'      => 'tablet_count',
                'type'    => 'slider',
                'title'   => __('Tablet Thumbnail Item', 'wooc-product-swiper-gallery'),
                'desc'   => __('Added Here Sliding Speed ', 'wooc-product-swiper-gallery'), 
                'max'     => 100,
                'default' => 3,
            ),
            array(
                'id'      => 'mobile_count',
                'type'    => 'slider',
                'title'   => __('Mobile Thumbnail Item', 'wooc-product-swiper-gallery'),
                'desc'   => __('Added Here Sliding Speed ', 'wooc-product-swiper-gallery'), 
                'max'     => 100,
                'default' => 3,
            ),
        ),
    ) );

    \CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Color Settings', 'wooc-product-swiper-gallery' ),
        'icon'   => 'fas fa-tint',
        'fields' => array(
           
            array(
                'id'    => 'slider_bg_color',
                'type'  => 'color',
                'title'   => __('Slider BG Color', 'wooc-product-swiper-gallery'),
                'output'      => '.product-details-slider-for',
                'output_mode' => 'background-color',
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'    => 'arrow_color',
                'type'  => 'color',
                'title'   => __('Arrow Color', 'wooc-product-swiper-gallery'),
                'output'      => '.ptx-product-details-slider .ptx-slider-arrow',
                'output_mode' => 'color',
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'    => 'arrow_bg_color',
                'type'  => 'color',
                'title'   => __('Arrow BG Color', 'wooc-product-swiper-gallery'),
                'output'      => '.ptx-product-details-slider .ptx-slider-arrow',
                'output_mode' => 'background-color',
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'    => 'dot_bg_color',
                'type'  => 'color',                
                'output'      => '.ptx-product-details-slider .swiper-pagination-bullet-active',
                'output_mode' => 'background-color',
                'title'   => __('Dot BG Color', 'wooc-product-swiper-gallery'),
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'    => 'slider_bg_thumb_color',
                'type'  => 'color',
                'title'   => __('Slider Thumb BG Color', 'wooc-product-swiper-gallery'),
                'output'      => '.product-details-nav',
                'output_mode' => 'background-color',
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'    => 'slider_thumb_border_color',
                'type'  => 'color',
                'title'   => __('Slider Thumb Border Color', 'wooc-product-swiper-gallery'),
                'output'      => '.product-details-slider-nav .swiper-slide-thumb-active',
                'output_mode' => 'border-color',
                'class'    => 'thx-pro-item',
                'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
        ),
    ) );
    \CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Gallery Video Settings', 'wooc-product-swiper-gallery' ),
        'icon'   => 'fab fa-youtube',
        'fields' => array(
            array(
                'id'      => 'gallery_video__opt',
                'type'    => 'switcher',
                'title'   => __('Gallery Video Option', 'wooc-product-swiper-gallery'),
                'label'   => __('Woocommerce Gallery Video Option Enable And Disable Here', 'wooc-product-swiper-gallery'),
                'default' => true,
                // 'class'    => 'thx-pro-item',
                // 'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'      => 'iframe_video_height',
                'type'    => 'slider',
                'title'   => __('Iframe Video Height', 'wooc-product-swiper-gallery'),
                'desc'   => __('Add Iframe Video Height', 'wooc-product-swiper-gallery'), 
                'min'     => 0,
                'max'     => 5000000,
                'output'      => '.product-details-for iframe',
                'output_mode' => 'min-height',
                // 'class'    => 'thx-pro-item',
                // 'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
            array(
                'id'      => 'iframe_video_thumb_height',
                'type'    => 'slider',
                'title'   => __('Iframe Video Thumbnail Height', 'wooc-product-swiper-gallery'),
                'desc'   => __('Add Iframe Thumbnail Video Height', 'wooc-product-swiper-gallery'), 
                'min'     => 0,
                'max'     => 5000000,
                'output'      => '.product-details-nav iframe',
                'output_mode' => 'height',
                // 'class'    => 'thx-pro-item',
                // 'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
            ),
        ),
    ) );
}
}


