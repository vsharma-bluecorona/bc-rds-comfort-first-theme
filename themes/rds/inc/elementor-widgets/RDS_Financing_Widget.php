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
 * cta style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Financing_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->Financing_array = json_decode(get_option('rds_template'), TRUE);
        $Financings = $this->Financing_array['globals']['financing'];
        $this->Financing = $Financings;
        $this->variationIsset = false;
        if (count($this->getFileVariations('fullwidth-cta')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('fullwidth-cta');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('fullwidth-cta'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve Financing widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-financing-widget';
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

    private $Financing_array = "";
    private $Financing = "";

    /**
     * Get widget title.
     *
     * Retrieve Financing  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Financing', 'rds-global-financing-widget');
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
        return 'eicon-single-post';
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
        return ['financing', 'tabs', 'toggle'];
    }

    /**
     * Register Financing  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_financing_widget',
                [
                    'label' => esc_html__('Global Financing Widget', 'rds-global-Financing-widget'),
                ]
        );
        
        if ($this->variationIsset) {
            $options = array();
            foreach ($this->allVariation as $key => $value) {
                $options[$key] = esc_html__($value, 'rds-global--widget');
            }
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-Financing-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => $this->Financing['variation'],
                        'options' =>  $options,
                     )
             ); 
        }

        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->Financing['heading'],
                )
        );

        $this->add_control(
                'subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->Financing['subheading'],
                )
        );

        $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Financing['button_text'],
                    'condition' => [
                        'variation' => ['a', 'c'], 
                    ],
                )
        );

        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Financing['button_link'],
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
        $args = $this->Financing_array;
        if($this->variationIsset){
            $args['globals']['financing']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['globals']['financing']['variation'] = sanitize_text_field($settings['variation']);
        $args['globals']['financing']['heading'] = sanitize_text_field($settings['heading']);
        $args['globals']['financing']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['globals']['financing']['button_link'] = sanitize_text_field($settings['button_link']);
        $args['globals']['financing']['button_text'] = sanitize_text_field($settings['button_text']);
        $variation = sanitize_text_field($settings['variation']);
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        //Display content
            if ($this->variationIsset) {
                get_template_part('global-templates/fullwidth-cta/'.$args['globals']['financing']['variation'], null, $args);
            }else{
             get_template_part('global-templates/fullwidth-cta/'.$this->singleVariation, null, $args);
            
        }
    }

}
