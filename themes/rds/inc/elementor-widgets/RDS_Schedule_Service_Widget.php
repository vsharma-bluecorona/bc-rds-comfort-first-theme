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
class RDS_Schedule_Service_Widget extends Widget_Base {
use FileVariations;
public $variationIsset = false;
public $allVariation;
public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->schedule_array = json_decode(get_option('rds_template'), TRUE);
        $schedules = $this->schedule_array['page_templates']['schedule_service_page'];
        $this->schedule = $schedules;
         $this->variationIsset = false;
         if (count($this->getFileVariations('schedule-service')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('schedule-service');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('schedule-service'))[0];
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
        return 'rds-template-schedule-service-widget';
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

    private $schedule_array = "";
    private $schedule = "";

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
        return esc_html__('Schedule Service Template', 'rds-template-schedule-service-widget');
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
        return ['schedule service', 'tabs', 'toggle'];
    }

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
     * Register schedule service template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
         $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $this->start_controls_section(
                'rds_schedule_service_widget',
                [
                    'label' => esc_html__('Schedule Service Template Widget', 'rds-schedule-service-widget'),
                ]
        );
       
         if ($this->variationIsset) {
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $this->schedule['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
         $this->add_control(
                'first_icon_class',
                array(
                    'label' => 'First Icon Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['first_icon_class'],
                )
        );
        $this->add_control(
                'first_title',
                array(
                    'label' => 'First Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['first_title'],
                )
        );

        $this->add_control(
                'first_description',
                array(
                    'label' => 'First Description',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->schedule['first_description'],
    
                )
        );
           $this->add_control(
                'second_icon_class',
                array(
                    'label' => 'Second Icon Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['second_icon_class'],
                )
        );
        $this->add_control(
                'second_title',
                array(
                    'label' => 'Second Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['second_title'],
                )
        );

        $this->add_control(
                'second_description',
                array(
                    'label' => 'Second Description',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->schedule['second_description'],
    
                )
        );

         $this->add_control(
                'third_icon_class',
                array(
                    'label' => 'Third Icon Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['third_icon_class'],
                )
        );
        $this->add_control(
                'third_title',
                array(
                    'label' => 'Third Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->schedule['third_title'],
                )
        );

        $this->add_control(
                'third_description',
                array(
                    'label' => 'Third Description',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->schedule['third_description'],
    
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
                     'default' => $this->schedule['gravity_form_id'],
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
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $value = $args['page_templates']['schedule_service_page'];
        $settings = $this->get_settings();
         if($this->variationIsset){
          $args['page_templates']['schedule_service_page']['variation'] = sanitize_text_field($settings['variation']);
        }
            $args['page_templates']['schedule_service_page']['first_icon_class'] =    sanitize_text_field($settings['first_icon_class']);
            $args['page_templates']['schedule_service_page']['first_title'] =         sanitize_text_field($settings['first_title']);
            $args['page_templates']['schedule_service_page']['first_description'] =  sanitize_text_field($settings['first_description']); 
            $args['page_templates']['schedule_service_page']['second_icon_class'] =   sanitize_text_field($settings['second_icon_class']);
            $args['page_templates']['schedule_service_page']['second_title'] =        sanitize_text_field($settings['second_title']);
            $args['page_templates']['schedule_service_page']['second_description'] =   sanitize_text_field($settings['second_description']);
            $args['page_templates']['schedule_service_page']['third_icon_class'] =    sanitize_text_field($settings['third_icon_class']);
            $args['page_templates']['schedule_service_page']['third_title'] =         sanitize_text_field($settings['third_title']);
            $args['page_templates']['schedule_service_page']['third_description'] =  sanitize_text_field($settings['third_description']);
            $args['page_templates']['schedule_service_page']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
            if(is_admin()){    
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
        //Display content
               if ($this->variationIsset) {
                get_template_part('global-templates/schedule-service/'.$args['page_templates']['schedule_service_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/schedule-service/'.$this->singleVariation, null, $args);
          } 
    } 
} 