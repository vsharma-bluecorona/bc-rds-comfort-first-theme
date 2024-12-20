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
class RDS_Financing_Company_Service_Widget extends Widget_Base {
use FileVariations;
public $variationIsset = false;
public $allVariation;
public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->company_array = json_decode(get_option('rds_template'), TRUE);
        $companys = $this->company_array['page_templates']['finance_page']['company_services'];
        $this->company = $companys;

         $this->variationIsset = false;
         if (count($this->getFileVariations('financing/company-service')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('financing/company-service');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('financing/company-service'))[0];
         }
    }

    /**
     * Get widget name.
     *
     * Retrieve company widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-financing-company-service-widget';
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

    private $company_array = "";
    private $company = "";

    /**
     * Get widget title.
     *
     * Retrieve company service widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Financing Company Service', 'rds-financing-company-service-widget');
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
     * Retrieve company service  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tabs';
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
        return ['financing company service', 'tabs', 'toggle'];
    }

    
    /**
     * Register company service  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_financing_company_service_widget',
                [
                    'label' => esc_html__('Financing Company Service Widget', 'rds-financing-company-service-widget'),
                ]
        );  
        if ($this->variationIsset) {
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $this->company['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->company['heading'],
                )
        );

          $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->company['subheading'],
                )
        );
          
          $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->company['button_text'],
                )
        );

          $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->company['button_link'],
                    'condition' => [
                         'button_text!' => '',
                    ]
                )
        );
        $this->add_control(
            'target',
            array(
                'label' => 'Open In New Window',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'true',
                'label_off' => 'false',
                'return_value' => isset($this->company['target']) ? "yes" : "",
                'condition' => [
                     'button_text!' => '',
                ]
            )
    );

          $this->add_control(
                'content',
                array(
                    'label' => 'Content',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->company['description_html_allowed'],
                )
        );


  
     
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
        $args = $this->company_array;
        if($this->variationIsset){
          $args['page_templates']['finance_page']['company_services']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['finance_page']['company_services']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['finance_page']['company_services']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['finance_page']['company_services']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['finance_page']['company_services']['button_link'] = sanitize_text_field($settings['button_link']);
        echo $args['page_templates']['finance_page']['company_services']['target'] = sanitize_text_field($settings['target']) ? true : false;

        $args['page_templates']['finance_page']['company_services']['description_html_allowed'] = $settings['content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        if (!empty($args['page_templates']['finance_page']['company_services'])) { 
          
                if ($this->variationIsset) {
                get_template_part('global-templates/financing/company-service/'.$args['page_templates']['finance_page']['company_services']['variation'], null, $args);
            }else{
             get_template_part('global-templates/financing/company-service/'.$this->singleVariation, null, $args);
            }
             
         }
    }

}