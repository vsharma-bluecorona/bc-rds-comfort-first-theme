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
class RDS_About_Meet_The_Team_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->aboutmeet_array = json_decode(get_option('rds_template'), TRUE);
        $aboutmeets = $this->aboutmeet_array['page_templates']['about_us_page']['meet_the_team'];
        $this->aboutmeet = $aboutmeets;
        $this->variationIsset = false;

        if (count($this->getFileVariations('about-us/meet-the-team')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('about-us/meet-the-team');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('about-us/meet-the-team'))[0];
        }
    }
    /**
    * Get widget name.
    *
    * Retrieve About Meet The Content widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'rds-global-meet-the-team-widget';
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

    private $aboutmeet_array = "";
    private $aboutmeet = "";

    /**
    * Get widget title.
    *
    * Retrieve About Meet The Content widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__('About Meet The Team Widget', 'rds-global-meet-the-team-widget');
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
    * Retrieve aboutmeet  widget icon.
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
        return ['about Meet The Content widget ', 'tabs', 'toggle'];
    }
    /**
    * Register About Meet The Content widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 3.1.0
    * @access protected
    */
    protected function register_controls() {
        $this->start_controls_section(
            'rds_global_aboutmeet_widget',
            [
                'label' => esc_html__('About Meet The Team Widget', 'rds-global-meet-the-team-widget'),
            ]
        );

        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->aboutmeet['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }

        $this->add_control(
            'heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->aboutmeet['heading'],

            )
        );
        $this->end_controls_section();
    }

    /**
    * Render About Meet The Content widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {
        $settings = $this->get_settings();
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}

        if($this->variationIsset){
            $args['page_templates']['about_us_page']['meet_the_team']['variation'] = sanitize_text_field($settings['variation']);
          }
        $args['page_templates']['about_us_page']['meet_the_team']['heading'] = sanitize_text_field($settings['heading']);
        if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }
            if ($this->variationIsset) {
                get_template_part('global-templates/about-us/meet-the-team/'.$args['page_templates']['about_us_page']['meet_the_team']['variation'], null, $args);
            }else{
             get_template_part('global-templates/about-us/meet-the-team/'.$this->singleVariation, null, $args);
            }

    }
}