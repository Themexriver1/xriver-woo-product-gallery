<?php 
//namespace
namespace Raziul\ProductGallery\Admin;
if(!defined('ABSPATH')){
    exit;
}

class Video {

    //Option Panel
    public $woospg_options;

    /**
     * class construct
     */
    public function __construct(){
        $this->woospg_options = get_option('woopsg_opt');
        if( 1 == $this->woospg_options['gallery_video__opt'] ){
            add_filter('woocommerce_product_data_tabs', [$this, 'woopgfs_product_settings_tabs'] );
            add_action('woocommerce_product_data_panels', [$this, 'woocommerce_product_get_data_panels']);
            add_action('woocommerce_process_product_meta', [$this, 'woocommerce_save_product_meta']);
        }        
    }

    /**
     * Woocommerce Custom Admin TAB
     *
     * @param [type] $tabs
     * @return void
     */
    public function woopgfs_product_settings_tabs($tabs){
        $tabs['woopgfs_product_page'] = array(
            'label'    => esc_html__('Themexriver Product Page', 'wooc-product-swiper-gallery'),
            'target'   => 'woopgfs_product_page_data',
            'priority' => 101
        );
        return $tabs;
    }

   /**
    * Added Option Video Type
    *
    * @return void
    */
    public function woocommerce_product_get_data_panels(){
        echo '<div id="woopgfs_product_page_data" class="panel woocommerce_options_panel hidden">';
            
            echo '<div class="woopgfs-panel-divider"></div>';
            echo '<h4 class="woopgfs-panel-subheading">'.esc_html__('Product Gallery Video Settings', 'wooc-product-swiper-gallery').'</h4>';

            // Add nonce field
            wp_nonce_field( 'woopgfs_save_video_settings', 'woopgfs_video_settings_nonce' );

            woocommerce_wp_select(
                array(
                    'id' => 'woopgfs_product_video_type',
                    'label' => esc_html__( 'Product Video Type?', 'wooc-product-swiper-gallery' ),
                    'options' => array(
                        '' => 'Select a type',
                        'popup' => esc_html__( 'Video Popup', 'wooc-product-swiper-gallery' ),
                        'iframe' => esc_html__( 'Video Iframe', 'wooc-product-swiper-gallery' ),
                    ),
                    'desc_tip' => false
                )
            );
            woocommerce_wp_text_input(
                array(
                    'id' => 'woopgfs_product_popup_video',
                    'label' => esc_html__( 'Popup Video URL', 'wooc-product-swiper-gallery' ),
                    'desc_tip' => true,
                    'description' => esc_html__( 'Add your youtube,vimeo,hosted video URL here', 'wooc-product-swiper-gallery' )
                )
            );
            woocommerce_wp_text_input(
                array(
                    'id' => 'woopgfs_product_iframe_video',
                    'label' => esc_html__( 'Youtube video ID', 'wooc-product-swiper-gallery' ),
                    'desc_tip' => true,
                    'description' => esc_html__( 'Add your youtube video ID here for background autoplay video.(Only Product Style Two)', 'wooc-product-swiper-gallery' ),
                    'rows' => 4
                )
            );
            
        echo '</div>';
    }

    /**
     * Save Product Meta
     *
     * @return void
     */
    public function woocommerce_save_product_meta( $_post_id ){
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return;
        }

        // Verify nonce
        if ( !isset( $_POST['woopgfs_video_settings_nonce'] ) || !wp_verify_nonce( $_POST['woopgfs_video_settings_nonce'], 'woopgfs_save_video_settings' ) ) {
            return;
        }

        $options = array(
            'woopgfs_product_video_type',
            'woopgfs_product_popup_video',
            'woopgfs_product_iframe_video',
        );
        foreach ( $options as $option ) {
            if ( isset( $_POST[$option] ) ) {
                update_post_meta( $_post_id, $option, $_POST[$option] );
            } else {
                delete_post_meta( $_post_id, $option );
            }
        }
    }

}