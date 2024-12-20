<?php


if (!defined('ABSPATH')) {
exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
* Elementor accordion widget.
*
* Elementor widget that displays a collapsible display of content in an
* promotion style, showing only one item at a time.
*
* @since 1.0.0
*/
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Promotion_new_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->promotion_arrya = json_decode(get_option('rds_template'), TRUE);
        $promotion = $this->promotion_arrya['page_templates']['landing_page']['promotion'];
        $this->promotion = $promotion;
        $this->variationIsset = false;
        if (count($this->getFileVariations('promotion/promotion-new')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('promotion/promotion-new');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('promotion/promotion-new'))[0];
        }
    }

/**
* Get widget name.
*
* Retrieve promotion widget name.
*
* @since 1.0.0
* @access public
*
* @return string Widget name.
*/
public function get_name() {
    return 'rds-promotio-new-widget';
}

/* Get RDS Spec File.
*
* Retrieve rds spec file from wp options.
*
* @since 1.0.0
* @access public
*
* @return string Widget title.
*/

private $promotion_arrya = "";
private $promotion = "";

/**
* Get widget title.
*
* Retrieve promotion widget title.
*
* @since 1.0.0
* @access public
*
* @return string Widget title.
*/
public function get_title() {
    return esc_html__('Promotion Widget', 'rds-promotio-new-widget');
}

/**
* Get widget keywords.
*
* Retrieve the category the widget belongs to.
*
* @since 2.1.0
* @access public
*
* @return array Widget category.
*/
public function get_categories() {
    return ['rds-global-widgets'];
}

/**
* Get widget icon.
*
* Retrieve promotion widget icon.
*
* @since 1.0.0
* @access public
*
* @return string Widget icon.
*/
public function get_icon() {
    return 'eicon-tags';
}

/**
* Get widget keywords.
*
* Retrieve the list of keywords the widget belongs to.
*
* @since 2.1.0
* @access public
*
* @return array Widget keywords.
*/
public function get_keywords() {
    return ['promotion widget', 'tabs', 'toggle'];
}

/**
* Register Gravity form lists.
*
* Adds different input fields to allow the user to change and customize the widget settings.
*
* @since 3.1.0
* @access public
*/
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

/**
* Register promotion widget controls.
*
* Adds different input fields to allow the user to change and customize the widget settings.
*
* @since 3.1.0
* @access protected
*/
protected function register_controls() {
    $args = json_decode(get_option('rds_template'), TRUE);
    $promotion = $args['page_templates']['landing_page']['promotion'];
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
        'rds_promotion_widget',
        [
            'label' => esc_html__('Promotion Widget', 'rds-promotio-new-widget'),
        ]
    );
   
  

    if ($this->variationIsset) {
        $options = array();
        foreach ($this->allVariation as $key => $value) {
            $options[$key] = esc_html__($value, 'rds-promotio-new-widget');
        }
        $this->add_control(
                 'variation',
                 array(
                    'label' => esc_html__('Variation', 'rds-promotio-new-widget'),
                    'type' => Controls_Manager::SELECT,
                    'default' => $this->promotion['variation'],
                     'options' =>  $options,
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
   
//Promotion popup heading Start
    $this->add_control(
        'popup_form_heading',
        array(
            'label' => 'Popup Heading',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => $this->promotion['popup_form_heading'],
        )
    );

// Promotion popup Subheading control start
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

    // $this->add_control(
    //     'request_button_link',
    //     array(
    //         'label' => 'Request Button Link',
    //         'type' => \Elementor\Controls_Manager::TEXT,
    //         'default' => $this->promotion['request_button_link'],
    //     )
    // );

// Gravity Forms list start
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

/**
* Render promotion widget output on the frontend.
*
* Written in PHP and used to generate the final HTML.
*
* @since 1.0.0
* @access protected
*/
protected function render() {
    $settings = $this->get_settings();
    $args = $this->promotion_arrya;
    $widget_id = $this->get_id();
    $selected_category = $settings['category_filter'];
   

    if($this->variationIsset){
        $args['page_templates']['landing_page']['promotion']['variation'] = sanitize_text_field($settings['variation']);
    } 

    $args['page_templates']['landing_page']['promotion']['popup_form_heading'] = sanitize_text_field($settings['popup_form_heading']);
    $args['page_templates']['landing_page']['promotion']['popup_form_subheading'] = sanitize_text_field($settings['popup_form_subheading']);
    //$args['page_templates']['landing_page']['promotion']['coupon_button_text'] = sanitize_text_field($settings['coupon_button_text']);
    //$args['page_templates']['landing_page']['promotion']['request_button_link'] = sanitize_text_field($settings['request_button_link']);
    $args['page_templates']['landing_page']['promotion']['popup_gravity_form_id'] = sanitize_text_field($settings['popup_gravity_form_id']);
    $args['page_templates']['landing_page']['promotion']['category_filter'] = $settings['category_filter'];
    $variation = sanitize_text_field($settings['variation']);
    if(is_admin()){    
    global $wpdb;
    $tableName = $wpdb->prefix . 'options';
    $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
    }
    $args['globals']['promotion']['widget_id'] = $widget_id;
    $args['category_taxonomy'] = $selected_category;
    $call_back = "rds_variation_promotion_new_html";
        $this->$call_back($args);
}

/**
* Render promotion widget output in the editor.
*
* Written as a Backbone JavaScript template and used to generate the live preview.
*
* @since 2.9.0
* @access protected
*/
public function rds_variation_promotion_new_html($args) {
    if ($this->variationIsset) {
        get_template_part('global-templates/promotion/promotion-new/'.$args['page_templates']['landing_page']['promotion']['variation'], null, $args);
    }else{
     get_template_part('global-templates/promotion/promotion-new/'.$this->singleVariation, null, $args);
    } 
}

}
