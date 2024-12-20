<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Request_Service_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->request_arrya = json_decode(get_option('rds_template'), TRUE);
        $requests = $this->request_arrya['globals']['request_service'];
        $this->request = $requests;
        $this->variationIsset = false;
        if (count($this->getFileVariations('request-service')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('request-service');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('request-service'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve request widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-request-service-widget';
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

    private $request_arrya = "";
    private $request = "";

    /**
     * Get widget title.
     *
     * Retrieve request service widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Request Service', 'rds-global-request-service-widget');
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
     * Retrieve request service  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-site-identity';
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
        return ['request service', 'tabs', 'toggle'];
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
     * Register request service  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_request_service_widget',
                [
                    'label' => esc_html__('Global Request Service Widget', 'rds-global-request-service-widget'),
                ]
        );
   
        if ($this->variationIsset) {
            $options = array();
            foreach ($this->allVariation as $key => $value) {
                $options[$key] = esc_html__($value, 'rds-global-request-service-widget');
            }
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-request-service-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => $this->request['variation'],
                        'options' =>  $options,
                     )
             ); 
         }

        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->request['heading'],
                )
        );

  
              // Gravity Forms list start
        $Form_list = $this->get_gravity_forms_list();
        $this->add_control(
                'gravity_form_id',
                array(
                    'label' => 'Gravity Forms',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => $Form_list,
                    'default' => $this->request['gravity_form_id'],
                )
        );
        // Gravity Forms list end
        $this->end_controls_section();

    }

    /**
     * Render request widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->request_arrya;
        if($this->variationIsset){
            $args['globals']['request_service']['variation'] = sanitize_text_field($settings['variation']);
        }
       
        $args['globals']['request_service']['heading'] = sanitize_text_field($settings['heading']);
        $args['globals']['request_service']['variation'] = sanitize_text_field($settings['variation']);
        $args['globals']['request_service']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
        $variation = sanitize_text_field($settings['variation']);
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        //Display content
            if ($this->variationIsset) {
                get_template_part('global-templates/request-service/'.$args['globals']['request_service']['variation'], null, $args);
            }else{
             get_template_part('global-templates/request-service/'.$this->singleVariation, null, $args);
        }
    }
}
