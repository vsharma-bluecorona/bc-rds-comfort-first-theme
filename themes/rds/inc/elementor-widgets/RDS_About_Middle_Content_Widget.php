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
    class RDS_About_Middle_Content_Widget extends Widget_Base {
        use FileVariations;
        public $variationIsset = false;
        public $allVariation;
        public $singleVariation;
    
        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->aboutContent_array = json_decode(get_option('rds_template'), TRUE);
            $aboutContents = $this->aboutContent_array['page_templates']['about_us_page'];
            $this->aboutContent = $aboutContents;
            $this->variationIsset = false;
    
            if (count($this->getFileVariations('about-us/middle-content')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('about-us/middle-content');
            } else {
                $this->singleVariation = array_keys($this->getFileVariations('about-us/middle-content'))[0];
            }
        }

    /**
    * Get widget name.
    *
    * Retrieve About Middle content widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'rds-global-about-middle-content-widget';
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

    private $aboutContent_array = "";
    private $aboutContent = "";

    /**
    * Get widget title.
    *
    * Retrieve About Middle content widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__('About Middle Content Widget', 'rds-global-about-middle-content-widget');
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
    * Retrieve aboutContent  widget icon.
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
        return ['about middle content widget ', 'tabs', 'toggle'];
    }


    /**
    * Register About Middle content widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 3.1.0
    * @access protected
    */
    protected function register_controls() {
        $this->start_controls_section(
            'rds_global_aboutContent_widget',
            [
                'label' => esc_html__('About Middle Content Widget', 'rds-global-about-middle-content-widget'),
            ]
        );

        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->aboutContent['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }

        $this->add_control(
            'middle_content',
            array(
                'label' => 'Middle Content',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => $this->aboutContent['middle_content'],

            )
        );

        $this->end_controls_section();

    }

    /**
    * Render About Middle Content widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->aboutContent_array;
        if($this->variationIsset){
            $args['page_templates']['about_us_page']['variation'] = sanitize_text_field($settings['variation']);
          }
        $args['page_templates']['about_us_page']['middle_content'] = $settings['middle_content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        if (!empty($settings['middle_content'])) {
            if ($this->variationIsset) {
                get_template_part('global-templates/about-us/middle-content/'.$args['page_templates']['about_us_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/about-us/middle-content/'.$this->singleVariation, null, $args);
            }
        }
    }
}