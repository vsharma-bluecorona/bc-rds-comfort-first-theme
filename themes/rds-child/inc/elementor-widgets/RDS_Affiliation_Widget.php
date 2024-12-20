<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Affiliation_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
    
        if (count($this->getFileVariations('affiliation')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('affiliation');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('affiliation'))[0];
        }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-affiliation-widget';
    }

    public function get_title() {
        return 'RDS Affiliation';
    }

    public function get_icon() {
        return 'eicon-nested-carousel';
    }

    public function render() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();
        if($this->variationIsset){
          $args['globals']['affiliation']['variation'] = sanitize_text_field($settings['affiliation_variation']);
        }
            $args['globals']['affiliation']['count'] = sanitize_text_field($settings['affiliation_count']);
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
             $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
                if ($this->variationIsset) {
                get_template_part('global-templates/affiliation/'.$args['globals']['affiliation']['variation'], null, $args);
            }else{
             get_template_part('global-templates/affiliation/'.$this->singleVariation, null, $args);
            }
    }

    public function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $affiliation = $args['globals']['affiliation'];
           $this->start_controls_section(
                'affiliation_section',
                array(
                    'label' => __('Affiliation', 'rds-affiliation-widget'),
                )
        );

        if ($this->variationIsset) {
           $this->add_control(
                'affiliation_variation',
                array(
                    'label' => 'Variation',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => $affiliation['variation'],
                    'options' => $this->allVariation,
                )
        );
       }

         $this->add_control(
                'affiliation_count',
                array(
                    'label' => 'Count',
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => isset($affiliation['count']) ? $affiliation['count'] : 1,
                    'min'=>1
                )
        );
        $this->end_controls_section();
       
    }

}
 