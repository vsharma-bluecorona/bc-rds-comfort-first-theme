<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Team_widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
        if (count($this->getFileVariations('team')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('team');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('team'))[0];
        }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-team-widget';
    }

    public function get_title() {
        return 'Team Page Widget';
    }

    public function get_icon() {
        return 'eicon-tags';
    }

    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $teams = $args['page_templates']['team_page'];

        $this->start_controls_section(
            'rds_team',
            array(
                'label' => __('Team Widget', 'rds-team-widget'),
            )
        );

        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->teams['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }

        // Subheading control
        $this->add_control(
                'team_subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $teams['subheading'],
                )
        );
        $this->end_controls_section();
    }
  
    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();

        if (!empty($settings) && is_array($settings)) {
            if($this->variationIsset){
                $args['page_templates']['team_page']['variation'] = sanitize_text_field($settings['variation']);
            }
            $args['page_templates']['team_page']['subheading'] = sanitize_text_field($settings['team_subheading']);
            if(is_admin()){    
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
                if ($this->variationIsset) {
                    get_template_part('global-templates/team/'.$args['page_templates']['team_page']['variation'], null, $args);
                }else{
                 get_template_part('global-templates/team/'.$this->singleVariation, null, $args);
            }
        }
    }
}

?>
