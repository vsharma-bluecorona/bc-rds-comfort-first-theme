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
    class RDS_Financing_Middle_Content_Widget extends Widget_Base {
        use FileVariations;
        public $variationIsset = false;
        public $allVariation;
        public $singleVariation;
        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->financingContent_array = json_decode(get_option('rds_template'), TRUE);
            $financingContents = $this->financingContent_array['page_templates']['finance_page']['middle_content'];
            $this->financingContent = $financingContents;
            $this->variationIsset = false;

         if (count($this->getFileVariations('financing/middle-content')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('financing/middle-content');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('financing/middle-content'))[0];
         }
        }

    /**
    * Get widget name.
    *
    * Retrieve Financing Middle content widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'rds-financing-middle-content-widget';
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

    private $financingContent_array = "";
    private $financingContent = "";

    /**
    * Get widget title.
    *
    * Retrieve Financing Middle content widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__('Financing Middle Content Widget', 'rds-financing-middle-content-widget');
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
    * Retrieve financingContent  widget icon.
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
        return ['financing middle content widget ', 'tabs', 'toggle'];
    }


    /**
    * Register Financing Middle content widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 3.1.0
    * @access protected
    */
    protected function register_controls() {
        $this->start_controls_section(
            'rds_financingContent_widget',
            [
                'label' => esc_html__('Financing Middle Content Widget', 'rds-financing-middle-content-widget'),
            ]
        );

         if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->financingContent['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }
        $this->add_control(
            'middle_content',
            array(
                'label' => 'Middle Content',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => $this->financingContent['content'],

            )
        );

        $this->end_controls_section();

    }

    /**
    * Render Financing Middle Content widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->financingContent_array;
         if($this->variationIsset){
            $args['page_templates']['finance_page']['middle_content']['variation'] = sanitize_text_field($settings['variation']);
          }
        $args['page_templates']['finance_page']['middle_content']['content'] = $settings['middle_content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
       
              if ($this->variationIsset) {
                get_template_part('global-templates/financing/middle-content/'.$args['page_templates']['finance_page']['middle_content']['variation'], null, $args);
            }else{
             get_template_part('global-templates/financing/middle-content/'.$this->singleVariation, null, $args);
            }
            
        
    }
}