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
class RDS_Financing_Content_Widget extends Widget_Base {
use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->financecontent_array = json_decode(get_option('rds_template'), TRUE);
        $financecontents = $this->financecontent_array['page_templates']['finance_page'];
        $this->financecontent = $financecontents;
         $this->variationIsset = false;
         if (count($this->getFileVariations('financing/content')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('financing/content');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('financing/content'))[0];
         }
    }

    /**
     * Get widget name.
     *
     * Retrieve financing content widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-financing-content-widget';
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

    private $financecontent_array = "";
    private $financecontent = "";

    /**
     * Get widget title.
     *
     * Retrieve financing content  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Financing Content Widget', 'rds-global-financing-content-widget');
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
     * Retrieve financing content  widget icon.
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
        return ['financing content ', 'tabs', 'toggle'];
    }

    
    /**
     * Register financing content widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_financing_content_widget',
                [
                    'label' => esc_html__('Financing Content Widget', 'rds-global-financing-content-widget'),
                ]
        );
   
          if ($this->variationIsset) {
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $this->financecontent['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->financecontent['heading'],
                )
        );

          $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->financecontent['subheading'],
                )
        );
            $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->financecontent['button_text'],
                )
        );

          $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->financecontent['button_link'],
                )
        );

        $this->add_control(
            'target',
            array(
                'label' => 'Open In New Window',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'true',
                'label_off' => 'false',
                'return_value' => isset($this->financecontent['target']) ? "yes" : "",
            )
    );

          $this->add_control(
                'content',
                array(
                    'label' => 'Content',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->financecontent['content'],
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
        $args = $this->financecontent_array;
         if($this->variationIsset){
          $args['page_templates']['finance_page']['variation'] = sanitize_text_field($settings['variation']);
        }
       
        $args['page_templates']['finance_page']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['finance_page']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['finance_page']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['finance_page']['button_link'] = sanitize_text_field($settings['button_link']);
        $args['page_templates']['finance_page']['target'] = sanitize_text_field($settings['target']) ? true : false;


        $args['page_templates']['finance_page']['content'] = $settings['content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
               if ($this->variationIsset) {
                get_template_part('global-templates/financing/content/'.$args['page_templates']['finance_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/financing/content/'.$this->singleVariation, null, $args);
            }

    }
}