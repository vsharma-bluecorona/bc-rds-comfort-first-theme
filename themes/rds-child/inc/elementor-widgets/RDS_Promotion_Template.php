<?php

use Elementor\Controls_Manager;

require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Promotion_Template extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->promotion_arrya = json_decode(get_option('rds_template'), TRUE);
        $promotion = $this->promotion_arrya['page_templates']['promotions'];
        $this->promotion = $promotion;
        $this->variationIsset = false;
        if (count($this->getFileVariations('promotion/promotion-template')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('promotion/promotion-template');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('promotion/promotion-template'))[0];
        }
        
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-promotion-widget';
    }

    protected $promotion_arrya = "";
    protected $promotion = "";


    public function get_title() {
        return 'Promotion Template Widget';
    }

    public function get_icon() {
        return 'eicon-tags';
    }
    public function get_gravity_forms_list() {
        global $wpdb;
        $forms_table = $wpdb->prefix . 'gf_form';
        $forms = $wpdb->get_results("SELECT * FROM $forms_table");
        $form_list = array();
        foreach ($forms as $form) {
            $form_list["$form->id"] = $form->title;
        }
        return $form_list;
    }
    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $promotion = $args['page_templates']['promotions'];
        $promotionCategory = array(
            'taxonomy' => 'bc_promotion_category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );
       
        $categoryNames = get_categories($promotionCategory);

        // $catName = [];
        $catName = array(
            'all' => esc_html__('all', 'rds-promotions-widget') // Static 'All' field
        );
        foreach ($categoryNames as $value) {
            $catName[$value->name] =  $value->name;
        }
        
        if (!empty($categoryNames) && !is_wp_error($categoryNames)) {
            foreach ($categoryNames as $category) {
                $catName[$category->name] = esc_html__($category->name, 'rds-promotions-widget');
            }
        }

        $this->start_controls_section(
            'rds_promotions',
            array(
                'label' => __('Promotion Widget 1', 'rds-promotions-widget'),
            )
        );
       
        $this->add_control(
                'enable_sidebar',
                array(
                    'name' => 'enable',
                    'label' => 'Enable Sidebar',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->promotion['subpage_sidebar']) ?"yes":"",
                    'default' => 'yes',
                )
        );

        if ($this->variationIsset) {
           
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-promotions-widget'),
                        'type' => Controls_Manager::SELECT,
                        // 'default' => isset($this->promotion['variation']) ? $this->promotion['variation'] : 'a',
                        'default' => $this->promotion['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }

         $this->add_control(
            'category_filter',
            [
                'label' => esc_html__( 'Select Category', 'rds-promotions-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  $catName,
                'default' => $promotion['category_filter'],
            ]
        );

        $this->add_control(
                'popup_form_heading',
                array(
                    'label' => 'Popup Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['popup_form_heading'],
                    )
        );
        $this->add_control(
                'popup_form_subheading',
                array(
                    'label' => 'Popup Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['popup_form_subheading'],
                )
        );
        // $this->add_control(
        //     'coupon_button_text',
        //     array(
        //         'label' => 'Coupon Button Text',
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => $this->promotion['coupon_button_text'],
        //     )
        // );
    //     $this->add_control(
    //         'request_button_link',
    //         array(
    //             'label' => 'Request Button Link',
    //             'type' => \Elementor\Controls_Manager::TEXT,
    //             'default' => $this->promotion['request_button_link'],
    //         )
    // );
        $Form_list = $this->get_gravity_forms_list();
        $this->add_control(
                'popup_gravity_form_id',
                array(
                    'label' => 'Gravity Forms',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => $Form_list,
                    'default' => $this->promotion['popup_gravity_form_id'],
                )
        );
        // Gravity Forms list end
        $this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings();
        $args = $this->promotion_arrya;
        $enable_sidebar = sanitize_text_field($settings['enable_sidebar']);
        $selected_category = $settings['category_filter'];
        if($this->variationIsset){
           $args['page_templates']['promotions']['variation'] = $settings['variation'];
        }

        // if (!empty($settings) && is_array($settings)) {
            $args['page_templates']['promotions']['subpage_sidebar'] = $settings['enable_sidebar'] ? true : false;
            $args['page_templates']['promotions']['popup_form_heading'] = sanitize_text_field($settings['popup_form_heading']);
            $args['page_templates']['promotions']['popup_form_subheading'] = sanitize_text_field($settings['popup_form_subheading']);
            //$args['page_templates']['promotions']['coupon_button_text'] = sanitize_text_field($settings['coupon_button_text']);
            //$args['page_templates']['promotions']['request_button_link'] = sanitize_text_field($settings['request_button_link']);
            $args['page_templates']['promotions']['popup_gravity_form_id'] = sanitize_text_field($settings['popup_gravity_form_id']);
            $args['page_templates']['promotions']['category_filter'] = $settings['category_filter'];
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));

            $args['widget_id'] = 32541; // Adding widget_id to the $args array
            $args['enable_sidebar'] = $enable_sidebar;
            $args['category_taxonomy'] = $selected_category;
            if ($this->variationIsset) {
                // echo $args['page_templates']['promotions']['variation'];
                get_template_part('global-templates/promotion/promotion-template/'.$args['page_templates']['promotions']['variation'], null, $args);
            }else{
             get_template_part('global-templates/promotion/promotion-template/'.$this->singleVariation, null, $args);
            }
          
        // }
    }
       
}