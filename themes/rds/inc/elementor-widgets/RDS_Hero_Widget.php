<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Hero_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->hero_array = rds_template();
        $promotion = $this->hero_array['globals']['hero'];
        $this->hero = $promotion;
         $this->variationIsset = false;
         if (count($this->getFileVariations('hero')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('hero');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('hero'))[0];
         }
    }

    /**
     * Get widget categories.
     *
     * Retrieve Hero widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_categories() {
        return ['rds-global-widgets'];
    }

    /**
     * Get widget name.
     *
     * Retrieve Hero widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_name() {
        return 'rds-hero-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Hero widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_title() {
        return 'Hero';
    }

    private $hero_array = "";
    private $hero = "";

    /**
     * Get widget icon.
     *
     * Retrieve promotions widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-banner';
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
     * Render hero widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    public function render() {
        $args = $this->hero_array;
        $settings = $this->get_settings();
        if (!empty($settings) && is_array($settings)) {
             if($this->variationIsset){
          $args['globals']['hero']['variation'] = sanitize_text_field($settings['variation']);
        }
            $button_link = isset($settings['hero_button_link']) ? sanitize_text_field($settings['hero_button_link']) : "";
            $variation = sanitize_text_field($settings['hero_variation']);
            $args['globals']['hero']['button_link'] = $button_link;
            $args['globals']['hero']['heading'] = sanitize_text_field($settings['hero_heading']);
            $args['globals']['hero']['subheading'] = sanitize_text_field($settings['hero_subheading']);
            $args['globals']['hero']['footer_text'] = sanitize_text_field($settings['hero_footer_text']);
            $args['globals']['hero']['form_heading'] = sanitize_text_field($settings['hero_form_heading']);
            $args['globals']['hero']['form_subheading'] = sanitize_text_field($settings['hero_form_subheading']);
            $args['globals']['hero']['variation'] = sanitize_text_field($settings['hero_variation']);
            $args['globals']['hero']['button_text'] = sanitize_text_field($settings['hero_button_text']);
            $args['globals']['hero']['desktop_gravity_form_id'] = sanitize_text_field($settings['hero_desktop_gravity_form_id']);
            $args['globals']['hero']['mobile_gravity_form_id'] = sanitize_text_field($settings['hero_mobile_gravity_form_id']);
            $args['globals']['hero']['schedule_online']['type'] = sanitize_text_field($settings['hero_schedule_online_type']);
            $args['globals']['hero']['schedule_online']['url'] = sanitize_text_field($settings['hero_schedule_online_url']);
            $args['globals']['hero']['schedule_online']['label'] = sanitize_text_field($settings['hero_schedule_online_lable']);
            $args['globals']['hero']['schedule_online']['icon_class'] = sanitize_text_field($settings['hero_schedule_online_icon_class']);
            if(is_admin()){    
            //Update template spec file
            global $wpdb;
//            $order = sanitize_text_field($settings['order']);
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
               if ($this->variationIsset) {
                get_template_part('global-templates/hero/'.$args['globals']['hero']['variation'], null, $args);
            }else{
             get_template_part('global-templates/hero/'.$this->singleVariation, null, $args);
            }
            
            get_template_part('global-templates/form/hero/desktop/' . $variation, null, $args);
  
        }
    }

    /**
     * Register hero widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $this->hero = $args['globals']['hero'];

        $this->start_controls_section(
                'hero',
                array(
                    'label' => __('Hero', 'rds-hero-widget'),
                )
        );
        if ($this->variationIsset) {
        $this->add_control(
                'hero_variation',
                array(
                    'label' => 'Variation',
                    'type' => Controls_Manager::SELECT,
                    'default' => $this->hero['variation'],
                    'options' =>  $this->allVariation,
                )
        );
        }
        $this->add_control(
                'hero_heading',
                array(
                    'label' => 'Heading',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['heading'],
                )
        );

        // Subheading control
        $this->add_control(
                'hero_subheading',
                array(
                    'label' => 'Subheading',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['subheading'],
                )
        );

        // Subheading control
        $this->add_control(
                'hero_footer_text',
                array(
                    'label' => 'Footer Text',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['footer_text'],
                )
        );

        $this->add_control(
                'hero_button_link',
                array(
                    'label' => 'Button Link',
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => $this->hero['button_link'],
                    'default' => $this->hero['button_link'],
                )
        );

        $this->add_control(
                'hero_button_text',
                array(
                    'label' => 'Button Text',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['button_text'],
                )
        );
        //  Forms Section Start
        $this->add_control(
                'hero_form_heading',
                array(
                    'label' => 'Form Heading',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['form_heading'],
                    'condition' => [
                        'hero_variation' => ['a', 'b', 'c','d'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        $this->add_control(
                'hero_form_subheading',
                array(
                    'label' => 'Form Sub Heading',
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => $this->hero['form_subheading'],
                    'condition' => [
                        'hero_variation' => ['a', 'd'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        //  Forms Section Start
        // Gravity Forms list end
        $Form_list = $this->get_gravity_forms_list();
        $this->add_control(
                'hero_desktop_gravity_form_id',
                array(
                    'label' => 'Desktop Forms',
                    'type' => Controls_Manager::SELECT,
                    'options' => $Form_list,
                    'default' => $this->hero['desktop_gravity_form_id'],
                    'type' => Controls_Manager::SELECT,
                    'condition' => [
                        'hero_variation' => ['a', 'b', 'c'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        $this->add_control(
                'hero_mobile_gravity_form_id',
                array(
                    'label' => 'Mobile Forms',
                    'type' => Controls_Manager::SELECT,
                    'options' => $Form_list,
                    'default' => $this->hero['mobile_gravity_form_id'],
                    'condition' => [
                        'hero_variation' => ['a', 'b', 'c'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        // Gravity Forms list end
        //Schedule online
        $this->add_control(
                'hero_schedule_online_type',
                array(
                    'label' => 'Schedule Online Type',
                    'type' => Controls_Manager::SELECT,
                    'options' => array(
                        'service_titan' => "service_titan",
                        'schedule_engine' => "schedule_engine",
                        'url' => 'URL'
                    ),
                    'default' => $this->hero['schedule_online']['type'],
                    'condition' => [
                        'hero_variation' => ['d'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        $this->add_control(
                'hero_schedule_online_url',
                array(
                    'label' => 'Schedule Online URL',
                    'type' => Controls_Manager::TEXT,
                    'default' => $this->hero['schedule_online']['url'],
                    'condition' => [
                        'hero_schedule_online_type' => ['url'],
                        'hero_variation' => ['d'],
                    ],
                )
        );
        $this->add_control(
                'hero_schedule_online_lable',
                array(
                    'label' => 'Schedule Online Label',
                    'type' => Controls_Manager::TEXT,
                    'default' => $this->hero['schedule_online']['label'],
                    'condition' => [
                        'hero_variation' => 'd',
                    ],
                )
        );
        $this->add_control(
                'hero_schedule_online_icon_class',
                array(
                    'label' => 'Schedule Online Class',
                    'type' => Controls_Manager::TEXT,
                    'default' => $this->hero['schedule_online']['icon_class'],
                    'condition' => [
                        'hero_variation' => ['d'], // Show the control only if "type" is set to "option1"
                    ],
                )
        );
        $this->end_controls_section();
    }


}

