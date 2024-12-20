<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
//use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Career_Job_Widget extends Widget_Base {
use FileVariations;
        public $variationIsset = false;
        public $allVariation;
        public $singleVariation;
        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->career_array = json_decode(get_option('rds_template'), TRUE);
            $careers = $this->career_array['page_templates']['career_page'];
            $this->career = $careers;
            $this->variationIsset = false;
            if (count($this->getFileVariations('careers/job')) > 1) {
                $this->variationIsset = true;
                $this->allVariation = $this->getFileVariations('careers/job');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('careers/job'))[0];
            }
        }

    /**
     * Get widget name.
     *
     * Retrieve career widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-career-job-widget';
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

    private $career_array = "";
    private $career = "";

    /**
     * Get widget title.
     *
     * Retrieve career widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Career Job Widget', 'rds-career-job-widget');
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
        return ['rds-template-widgets'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve career  widget icon.
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
        return ['career', 'tabs', 'toggle'];
    }

    /**
     * Register history template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {   
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $this->start_controls_section(
                'rds_career_job_widget',
                [
                    'label' => esc_html__('Career Job Widget 5', 'rds-career-job-widget'),
                ]
        );
           if ($this->variationIsset) {
            // $variationKey = array_keys($allVariations)[0];
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $this->career['position']['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
         $this->add_control(
                'wpjob_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['position']['heading'],
                )
        );
         $this->add_control(
                'wpjob_button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->career['position']['button_text'],
                )
        );
          $this->add_control(
                'wpjob_button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->career['position']['button_link'],
                    'condition' => [
                         'wpjob_button_text!' => '',
                    ]
                )
        );

          $this->add_control(
                'job_wp_job_board',
                array(
                    'label' => 'Wp Job Board',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'true',
                    'label_off' => 'false',
                    'return_value' => isset($this->career['position']['wp_job_board']) ? "yes" : "",
                    'default' => 'yes',
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
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
           if($this->variationIsset){
          $args['page_templates']['career_page']['position']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['career_page']['position']['wp_job_board'] = sanitize_text_field($settings['job_wp_job_board']) ? true : false;
        $args['page_templates']['career_page']['position']['heading'] = sanitize_text_field($settings['wpjob_heading']);
         $args['page_templates']['career_page']['position']['button_text'] = sanitize_text_field($settings['wpjob_button_text']);
          $args['page_templates']['career_page']['position']['button_link'] = sanitize_text_field($settings['wpjob_button_link']);
          if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
          }
            if ($this->variationIsset) {
                get_template_part('global-templates/careers/job/'.$args['page_templates']['career_page']['position']['variation'], null, $args);
            }else{
             get_template_part('global-templates/careers/job/'.$this->singleVariation, null, $args);
            }
    }
}