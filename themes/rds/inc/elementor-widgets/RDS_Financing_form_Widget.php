<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Financing_form_Widget extends \Elementor\Widget_Base {
use FileVariations;
public $variationIsset = false;
public $allVariation;
public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
         $this->variationIsset = false;
         if (count($this->getFileVariations('financing/form')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('financing/form');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('financing/form'))[0];
         }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-financing-form-widget';
    }

    public function get_title() {
        return 'Financing Form Widget';
    }

    public function get_icon() {
        return 'eicon-tabs';
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


    public function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        if($this->variationIsset){
          $args['page_templates']['finance_page']['variation'] = sanitize_text_field($settings['variation']);
        }

            $args['page_templates']['finance_page']['gravity_form_heading'] = sanitize_text_field($settings['gravity_form_heading']);
            $args['page_templates']['finance_page']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
            if(is_admin()){    
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
             $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
            if ($settings['gravity_form_id']) { 
                  if ($this->variationIsset) {
                get_template_part('global-templates/financing/form/'.$args['page_templates']['finance_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/financing/form/'.$this->singleVariation, null, $args);
            }
             
                
             }
        
    }

    public function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $affiliation = $args['page_templates']['finance_page'];
           $this->start_controls_section(
                'financing_form_section',
                array(
                    'label' => __('Financing Form Widget', 'rds-financing-form-widget'),
                )
        );

        if ($this->variationIsset) {
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $affiliation['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
         $this->add_control(
                'gravity_form_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' =>$affiliation['gravity_form_heading'],
                )
        );

         $Form_list = $this->get_gravity_forms_list();
                $this->add_control(
                        'gravity_form_id',
                        array(
                            'label' => 'Gravity Forms',
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $Form_list,
                            'default' => $affiliation['gravity_form_id'],
                        )
        );

        $this->end_controls_section();
       
    }

}