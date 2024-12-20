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
require_once (get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Contact_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->contact_array = json_decode(get_option('rds_template'), TRUE);
        $this->contact = $this->contact_array;
        $this->variationIsset = false;
        if (count($this->getFileVariations('contact-us')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('contact-us');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('contact-us')) [0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve contact  widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-contact-widget';
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

    private $contact_array = "";
    private $contact = "";

    /**
     * Get widget title.
     *
     * Retrieve contact widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Contact Page Widget', 'rds-global-contact-widget');
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
     * Retrieve contact widget icon.
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
        return ['contact', 'tabs', 'toggle'];
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
     * Register contact widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $this->start_controls_section(
                'rds_global_contact_widget',
                [
                    'label' => esc_html__('Contact Page Widget', 'rds-global-contact-widget'),
                ]
        );
         if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->contact['page_templates']['contact_page']['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }

        // $this->add_control(
        //         'variation',
        //         [
        //             'label' => esc_html__('Variation', 'rds-global-contact-widget'),
        //             'type' => Controls_Manager::SELECT,
        //             'options' => [
        //                 'a' => esc_html__('A', 'rds-global-contact-widget'),
        //                 'b' => esc_html__('B', 'rds-global-contact-widget'),
        //                 'c' => esc_html__('C', 'rds-global-contact-widget'),
                        
        //             ],
        //             'default' => $this->contact['page_templates']['contact_page']['variation'],
        //         ]
        // );
        $this->add_control(
                'content',
                array(
                    'label' => 'Content Section',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                )
        );
        $Form_list = $this->get_gravity_forms_list();
                $this->add_control(
                        'gravity_form_id',
                        array(
                            'label' => 'Gravity Forms',
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $Form_list,
                            'default' => $this->contact['page_templates']['contact_page']['gravity_form_id'],
                        )
        );
         $this->add_control(
                'hours_heading',
                array(
                    'label' => 'Hours Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'condition' => [
                        'variation' => ['b','c'],
                    ],
                    'default' => $this->contact['page_templates']['contact_page']['hours_heading'],

                )
        );
          $this->add_control(
                'address_heading',
                array(
                    'label' => 'Address Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'condition' => [
                        'variation' => ['c'],
                    ],
                    'default' => $this->contact['page_templates']['contact_page']['address_heading'],
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
        $args = $this->contact_array;
        if($this->variationIsset){
            $args['page_templates']['contact_page']['variation'] = sanitize_text_field($settings['variation']);
          }
        $args['page_templates']['contact_page']['content'] = $settings['content'];
        $args['page_templates']['contact_page']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
        $args['page_templates']['contact_page']['hours_heading'] = sanitize_text_field($settings['hours_heading']);
        $args['page_templates']['contact_page']['address_heading'] = sanitize_text_field($settings['address_heading']);
        if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }
            if ($this->variationIsset) {
                get_template_part('global-templates/contact-us/'.$args['page_templates']['contact_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/contact-us/'.$this->singleVariation, null, $args);
            }        
        }
    }