<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Footer_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
            if (count($this->getFileVariations('footer')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('footer');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('footer'))[0];
            }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-footer-widget';
    }

    public function get_title() {
        return 'Footer';
    }

    public function get_icon() {
        return 'eicon-custom';
    }

    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        // $footerItems = $args['globals']['footer']['data']['social_media']['items'];
        // $itemsArray = array();
        // $i = 0;
        // foreach ($footerItems as $itesm) {
        //     $itemsArray[$i] = array(
        //         'item_icon_class' => __($itesm['icon_class'], 'rds_footer_widget'),
        //         'item_url' => __($itesm['url'], 'rds_footer_widget')
        //     );
        //     $i++;
        // }

        $footer = $args['globals']['footer'];
        $menus = wp_get_nav_menus(); // Get the list of available menus
        $menu_options = [];
        foreach ( $menus as $menu ) {
            $menu_options[ $menu->name ] = $menu->name;
        }
        $this->start_controls_section(
                'footer',
                array(
                    'label' => __('Footer', 'rds-footer-widget'),
                )
        );

        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $footer['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }

         $this->add_control(
                'footer_menu_1_heading',
                array(
                    'label' => 'Footer Menu 1 Name',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $footer['data']['footer_menu_1_heading'],
                    'condition' => [
                        'variation' => 'a',
                    ],

                )
        );

          $this->add_control(
            'footer_menu_1_name',
            [
                'label' => __( 'Select Menu 1', 'rds-footer-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $menu_options,
                'default' => $footer['data']['footer_menu_1_name'],
                'condition' => [
                            'variation' => 'a',
                        ],
            ]
        );

         $this->add_control(
                'footer_menu_2_heading',
                array(
                    'label' => 'Footer Menu 2 Name',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $footer['data']['footer_menu_2_heading'],
                    'condition' => [
                        'variation' => 'a',
                    ],
                )
        );

        $this->add_control(
            'footer_menu_2_name',
            [
                'label' => __( 'Select Menu 2', 'rds-footer-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $menu_options,
                'default' => $footer['data']['footer_menu_2_name'],
                'condition' => [
                            'variation' => 'a',
                        ],
            ]
        );
        //       $this->add_control(
        //         'follow_text',
        //         array(
        //             'label' => 'Social Media Heading',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $this->contact['globals']['footer']['heading'],
        //             'condition' => [
        //                 'variation' => ['a'],
        //             ]
        //         )
        // );
        //    $this->add_control(
        //         'social_items',
        //         array(
        //             'label' => __('Items', 'rds-footer-widget'),
        //             'type' => \Elementor\Controls_Manager::REPEATER,
        //             'fields' => array(
        //                 array(
        //                     'name' => 'item_icon_class',
        //                     'label' => __('Icon Class', 'rds-footer-widget'),
        //                     'type' => \Elementor\Controls_Manager::TEXT,
        //                     'default' => __("", 'rds-footer-widget'),
        //                     'label_block' => true,
        //                 ),
        //                 array(
        //                     'name' => 'item_url',
        //                     'label' => __('Url', 'rds-footer-widget'),
        //                     'type' => \Elementor\Controls_Manager::TEXT,
        //                     'default' => __("", 'rds-footer-widget'),
        //                     'label_block' => true,

        //                 ),
        //             ),

        //             'default' => $itemsArray,
        //             'icon_field' => '{{{ item_icon_class }}}', // Field to be used as the title in the editor
        //             'url_field' => '{{{ item_url }}}'
        //         )
        // );

        //   $this->add_control(
        //         'disclaimer_text',
        //         array(
        //             'label' => 'Disclaimer',
        //             'type' => \Elementor\Controls_Manager::WYSIWYG,
        //             'default' => $footer['data']['disclaimer_text'],
        //         )
        // );
        //     $this->add_control(
        //         'copyright_title',
        //         array(
        //             'label' => 'Copyright Title',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $footer['data']['copyright_title'],
        //         )
        // );
        // $this->add_control(
        //         'bluecorona_branding',
        //         array(
        //             'label' => 'Bluecorona Branding',
        //             'type' => \Elementor\Controls_Manager::SWITCHER,
        //             'label_on' => 'Yes',
        //             'label_off' => 'No',
        //             'return_value' => isset($footer['data']['bluecorona_branding'])?"yes":"",
        //             'default' => 'yes',
        //         )
        // );
       
        // $this->add_control(
        //         'bluecorona_link',
        //         array(
        //             'label' => 'Bluecorona Link',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $footer['data']['bluecorona_link'],
        //             'condition' => [
        //                 'bluecorona_branding' => 'yes',
          
        //             ],
                    
        //         )
        // );

        // $this->add_control(
        //         'privacy_policy_link',
        //         array(
        //             'label' => 'Privacy Policy Link',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $footer['data']['privacy_policy_link'],
        //         )
        // );
        $this->end_controls_section();
    }

    public function render() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();
           
        // $args['globals']['footer']['data']['social_media']['items'] = $items_Array;
        if (!empty($settings) && is_array($settings)) {   
          // $i = 0;    
          //   $items_Array = array();
          //   if (!empty($settings['social_items'])) {
          //       foreach ($settings['social_items'] as $item) {
          //           $items_Array[$i]['icon_class'] = sanitize_text_field($item['item_icon_class']);
                    // $items_Array[$i]['url'] = sanitize_text_field($item['item_url']);
          //           $i++;
          //       }
          //   }  
          //   $args['globals']['footer']['data']['social_media']['items'] = $items_Array;

            $args['globals']['footer']['data']['footer_menu_1_name'] = sanitize_text_field($settings['footer_menu_1_name']);
            
            $args['globals']['footer']['data']['footer_menu_1_heading'] = sanitize_text_field($settings['footer_menu_1_heading']);
            $args['globals']['footer']['data']['footer_menu_2_name'] = sanitize_text_field($settings['footer_menu_2_name']);
            $args['globals']['footer']['data']['footer_menu_2_heading'] = sanitize_text_field($settings['footer_menu_2_heading']);
            // $args['globals']['footer']['data']['disclaimer_text'] = $settings['disclaimer_text'];
            // $args['globals']['footer']['data']['copyright_title'] = sanitize_text_field($settings['copyright_title']);
            // $args['globals']['footer']['data']['bluecorona_link'] = sanitize_text_field($settings['bluecorona_link']);
            // $args['globals']['footer']['data']['privacy_policy_link'] = sanitize_text_field($settings['privacy_policy_link']);
            if($this->variationIsset){
                $args['globals']['footer']['variation'] = sanitize_text_field($settings['variation']);
            } 
            // $args['globals']['footer']['data']['bluecorona_branding'] =  sanitize_text_field($settings['bluecorona_branding']) ? true : false;
            //  $args['globals']['footer']['heading'] = sanitize_text_field($settings['follow_text']);
             $variation = sanitize_text_field($settings['variation']);
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $result = $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));

            if ($this->variationIsset) {
                get_template_part('global-templates/footer/'.$args['globals']['footer']['variation'], null, $args);
            }else{
             get_template_part('global-templates/footer/'.$this->singleVariation, null, $args);
            }                
                get_template_part('page-templates/common/footer-common');
        }
    }

   }
