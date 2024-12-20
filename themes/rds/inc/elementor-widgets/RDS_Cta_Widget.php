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
class RDS_Cta_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->cta_array = json_decode(get_option('rds_template'), TRUE);
        $ctas = $this->cta_array['globals']['in_content_cta'];
        $this->cta = $ctas;
        $this->variationIsset = false;

         if (count($this->getFileVariations('cta')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('cta');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('cta'))[0];
         }
    }

    /**
     * Get widget name.
     *
     * Retrieve cta widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-cta-widget';
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

    private $cta_array = "";
    private $cta = "";

    /**
     * Get widget title.
     *
     * Retrieve cta  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('CTA', 'rds-global-cta-widget');
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
        return 'eicon-shortcode';
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
        return ['cta', 'tabs', 'toggle'];
    }

    /**
     * Register Gravity form lists.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access public
     */

    /**
     * Register cta  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_cta_widget',
                [
                    'label' => esc_html__('Global CTA Widget', 'rds-global-cta-widget'),
                ]
        );
       
        if ($this->variationIsset) {
        $this->add_control(
                'variation',
                [
                    'label' => esc_html__('Variation', 'rds-global-cta-widget'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->allVariation,
                    'default' => $this->cta['variation'],
                ]
        );
        }
        $this->add_control(
                'icon_class',
                array(
                    'label' => 'Icon Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['icon_class'],
                    'condition' => [
                        'variation' => 'a',
                    ],
                )
        );

        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->cta['heading'],
                )
        );

        $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['button_text'],
                )
        );

        $this->add_control(
                'title_class',
                array(
                    'label' => 'Title Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['title_class'],
                )
        );

        $this->add_control(
                'button_class',
                array(
                    'label' => 'Button Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['button_class'],
                )
        );

        $this->add_control(
                'telephone_class',
                array(
                    'label' => 'Telephone Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['telephone_class'],
                    'condition' => [
                        'variation' => 'a',
                    ],
                )
        );
        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->cta['button_link'],
                )
        );
        $this->add_control(
                'target',
                array(
                    'label' => 'Open In New Window',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'true',
                    'label_off' => 'false',
                    'return_value' => isset($this->cta['target']) ? "yes" : "",
                    'default' => 'yes',
                )
        );
        $this->add_control(
                'phone',
                array(
                    'label' => 'Phone Number',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->cta['phone'],
                    'condition' => [
                        'variation' => 'a',
                    ],
                )
        );

        $this->add_control(
                'cta_id',
                [
                    'label' => esc_html__('ID', 'rds-global-cta-widget'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__('Select', 'rds-global--widget'),
                        'service_titan' => esc_html__('Service Titan', 'rds-global--widget'),
                        'schedule_engine' => esc_html__('Schedule Engine', 'rds-global--widget'),
                    ],
                    'default' => $this->cta['id'],
                    
                ]
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
        $args = $this->cta_array;
         if($this->variationIsset){
            $args['globals']['in_content_cta']['variation'] = sanitize_text_field($settings['variation']);
          }
        $args['globals']['in_content_cta']['icon_class'] = sanitize_text_field($settings['icon_class']);
        $args['globals']['in_content_cta']['title_class'] = sanitize_text_field($settings['title_class']);
        $args['globals']['in_content_cta']['button_class'] = sanitize_text_field($settings['button_class']);
        $args['globals']['in_content_cta']['telephone_class'] = sanitize_text_field($settings['telephone_class']);
        $args['globals']['in_content_cta']['heading'] = $settings['heading'];
        $args['globals']['in_content_cta']['target'] = sanitize_text_field($settings['target']) ? true : false;
        $args['globals']['in_content_cta']['phone'] = $settings['phone'];
        $args['globals']['in_content_cta']['button_link'] = sanitize_text_field($settings['button_link']);
        $args['globals']['in_content_cta']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['globals']['in_content_cta']['id'] = sanitize_text_field($settings['cta_id']);

        $variation = sanitize_text_field($settings['variation']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/cta/'.$args['globals']['in_content_cta']['variation'], null, $args);
            }else{
             get_template_part('global-templates/cta/'.$this->singleVariation, null, $args);
        }      
    }

}