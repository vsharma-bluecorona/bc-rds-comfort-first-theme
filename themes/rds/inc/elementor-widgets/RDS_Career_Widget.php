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
class RDS_Career_Widget extends Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->career_array = json_decode(get_option('rds_template'), TRUE);
        $careers = $this->career_array['page_templates']['career_page'];
        $this->career = $careers;
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
        return 'rds-template-career-widget';
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
        return esc_html__('Career Template', 'rds-template-career-widget');
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
        $args = json_decode(get_option('rds_template'), TRUE);
        $youubeItems = $args['page_templates']['career_page']['video']['items'];
        $itemsArray = array();
        $i = 0;
        $j = 0;
        $k = 0;
        foreach ($youubeItems as $itesm) {
            $itemsArray[$i] = array(
                'item_video_url' => __($itesm['video_url'], 'rds-career-video-widget'),
                              
            );
            $i++;
        } 
        $perkItems = $args['page_templates']['career_page']['perks']['items'];
        $perkArray = array();
        foreach ($perkItems as $itemp) {
            $perkArray[$i] = array(
                'item_heading' => __($itemp['heading'], 'rds-career-perk-widget'),
                'item_icon' => __($itemp['icon'], 'rds-career-perk-widget'),
                'item_description' => __($itemp['description'], 'rds-career-perk-widget'),
                              
            );
            $j++;
        } 
        $employeItems = $args['page_templates']['career_page']['employee_Of_the_month']['items'];
        $employeArray = array();
        foreach ($employeItems as $iteme) {
            $employeArray[$i] = array(
                'item_name' => __($iteme['name'], 'rds-career-employe-widget'),
                'item_month' => __($iteme['month'], 'rds-career-employe-widget'),
                 'item_position' => __($iteme['position'], 'rds-career-employe-widget'),
                'item_description' => __($iteme['description'], 'rds-career-employe-widget'),
                'item_instagram_link' => __($iteme['instagram_link'], 'rds-career-employe-widget'),
                'item_facebook_link' => __($iteme['facebook_link'], 'rds-career-employe-widget'),
                              
            );
            $k++;
        }
        $this->start_controls_section(
                'rds_career_banner_widget',
                [
                    'label' => esc_html__('Career Banner Widget 1', 'rds-career-banner-widget'),
                ]
        );
        $this->add_control(
                'checkbox_value',
                array(
                    'label' => 'Enable Career',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->career['enable']) ? "yes" : "",
                    'default' => 'yes',
                )
        );
         $this->add_control(
                'banner_content',
                array(
                    'label' => 'Banner Content',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['banner']['content'],
                )
        );
          $this->add_control(
                'banner_button_text',
                array(
                    'label' => 'Banner Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->career['banner']['button_text'],
                )
        );
        //    $this->add_control(
        //         'banner_button_link',
        //         array(
        //             'label' => 'Banner Buton Link',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $this->career['banner']['button_link'],
        //         )
        // );

        $this->end_controls_section();

 
     $this->start_controls_section(
                'rds_career_1_widget',
                [
                    'label' => esc_html__('Careers Header Widget 2', 'rds-career-1-widget'),
                ]
        );
         $this->add_control(
                'widget_1_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['heading'],
                )
        );
          $this->add_control(
                'widget_1_subheading',
                array(
                    'label' => 'Sub Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['subheading'],
                )
        );
           $this->add_control(
                'widget_1_content',
                array(
                    'label' => 'Content',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['content'],
                )
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'rds_career_perk_widget',
                [
                    'label' => esc_html__('Career Perk Widget 3', 'rds-career-perk-widget'),
                ]
        );
        
         $this->add_control(
                'perks_checkbox_value',
                array(
                    'label' => 'Enable',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->career['perks']['enable']) ? "yes" : "",
                    'default' => 'yes',
                )
        );

          $this->add_control(
                'perk_variation',
                array(
                    'label' => 'Variation',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => $this->career['perks']['variation'],
                    'options' => [
                        'a' => 'A',
                        'b' => 'B'
                    ],
                )
        );

        $this->add_control(
                'perk_items',
                array(
                    'label' => __('Perks Items', 'rds-career-perk-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_heading',
                            'label' => __('Heading', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_icon',
                            'label' => __('Icon', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                          array(
                            'name' => 'item_description',
                            'label' => __('Description', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                    
                    ),
                    'default' =>
                    $perkArray,
                    'heading_field' => '{{{ item_heading }}}', 
                    'icon_field' => '{{{ item_icon }}}', 
                    'description_field' => '{{{ item_description }}}', 
                    
                )
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'rds_career_employe_widget',
                [
                    'label' => esc_html__('Career Employee Of The Month Widget 4', 'rds-career-employe-widget'),
                ]
        );
        
          $this->add_control(
                'employe_checkbox_value',
                array(
                    'label' => 'Enable',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->career['employee_Of_the_month']['enable']) ? "yes" : "",
                    'default' => 'yes',
                )
        );
          $this->add_control(
                'employe_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['employee_Of_the_month']['heading'],
                  
                )
        );

        $this->add_control(
                'employe_items',
                array(
                    'label' => __('Employes Items', 'rds-career-employe-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_name',
                            'label' => __('Name', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_month',
                            'label' => __('Month', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                          array(
                            'name' => 'item_position',
                            'label' => __('Position', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_description',
                            'label' => __('Description', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_instagram_link',
                            'label' => __('Instagram Link', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                          array(
                            'name' => 'item_facebook_link',
                            'label' => __('Facebook Link', 'rds-career-employe-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employe-widget'),
                            'label_block' => true,
                        ),
                    
                    ),
                    'default' =>
                    $employeArray,
                    'name_field' => '{{{ item_name }}}', 
                    'icon_month' => '{{{ item_month }}}', 
                    'position_field' => '{{{ item_position }}}', 
                    'description_field' => '{{{ item_description }}}', 
                    'instagram_link_field' => '{{{ item_instagram_link }}}', 
                    'facebook_link_field' => '{{{ item_facebook_link }}}', 
                    
                )
        );
        $this->end_controls_section();


        $this->start_controls_section(
                'rds_career_job_widget',
                [
                    'label' => esc_html__('Career Job Widget 5', 'rds-career-job-widget'),
                ]
        );

          $this->add_control(
                'position_checkbox_value',
                array(
                    'label' => 'Enable',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->career['position']['enable']) ? "yes" : "",
                    'default' => 'yes',
                )
        );
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


        $this->start_controls_section(
                'rds_career_video_widget',
                [
                    'label' => esc_html__('Career Video Widget 6', 'rds-career-video-widget'),
                ]
        );
          $this->add_control(
                'video_checkbox_value',
                array(
                    'label' => 'Enable',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->career['video']['enable']) ? "yes" : "",
                    'default' => 'yes',
                )
        );
         $this->add_control(
                'video_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['video']['heading'],
                )
        );

        $this->add_control(
                'videos_item',
                array(
                    'label' => __('Video URL items', 'rds-career-video-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_video_url',
                            'label' => __('Video URL', 'rds-career-video-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-video-widget'),
                            'label_block' => true,
                        ),
                    
                    ),
                    'default' =>
                    $itemsArray,
                    'youtube_field' => '{{{ item_video_url }}}', 
                    
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
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();


        $itemsArray = array();
        $perkArray = array();
        $employeArray = array();
        $i = 0;
        $j = 0;
        $k = 0;
           if (!empty($settings['videos_item'])) {
        foreach ($settings['videos_item'] as $item1) {
             $itemsArray[$i]['video_url'] = sanitize_text_field($item1['item_video_url']);
            $i++;
        } 
    }
      
          if (!empty($settings['perk_items'])) {
        foreach ($settings['perk_items'] as $item2) {
             $perkArray[$j]['heading'] = sanitize_text_field($item2['item_heading']);
               $perkArray[$j]['icon'] = sanitize_text_field($item2['item_icon']);
                 $perkArray[$j]['description'] = sanitize_text_field($item2['item_description']);
            $j++;
        } 
    }
        
              if (!empty($settings['employe_items'])) {
        foreach ($settings['employe_items'] as $item3) {
            $employeArray[$k]['name'] = sanitize_text_field($item3['item_name']);
            $employeArray[$k]['month'] = sanitize_text_field($item3['item_month']);
            $employeArray[$k]['position'] = sanitize_text_field($item3['item_position']);
            $employeArray[$k]['description'] = sanitize_text_field($item3['item_description']);
            $employeArray[$k]['instagram_link'] = sanitize_text_field($item3['item_instagram_link']);
            $employeArray[$k]['facebook_link'] = sanitize_text_field($item3['item_facebook_link']);
            $k++;
        } 
    }

        $args['page_templates']['career_page']['enable'] = sanitize_text_field($settings['checkbox_value']) ? true : false;

        $args['page_templates']['career_page']['position']['enable'] = sanitize_text_field($settings['position_checkbox_value']) ? true : false;
        $args['page_templates']['career_page']['video']['enable'] = sanitize_text_field($settings['video_checkbox_value']) ? true : false;
        $args['page_templates']['career_page']['perks']['enable'] = sanitize_text_field($settings['perks_checkbox_value']) ? true : false;
        $args['page_templates']['career_page']['employee_Of_the_month']['enable'] = sanitize_text_field($settings['employe_checkbox_value']) ? true : false;

        $args['page_templates']['career_page']['heading'] = sanitize_text_field($settings['widget_1_heading']);
        $args['page_templates']['career_page']['subheading'] = sanitize_text_field($settings['widget_1_subheading']);
        $args['page_templates']['career_page']['content'] = sanitize_text_field($settings['widget_1_content']);
        $args['page_templates']['career_page']['banner']['content'] = sanitize_text_field($settings['banner_content']);
        $args['page_templates']['career_page']['banner']['button_text'] = sanitize_text_field($settings['banner_button_text']);
        // $args['page_templates']['career_page']['banner']['button_link'] = sanitize_text_field($settings['banner_button_link']);
        $args['page_templates']['career_page']['position']['wp_job_board'] = sanitize_text_field($settings['job_wp_job_board']) ? true : false;
        $args['page_templates']['career_page']['position']['heading'] = sanitize_text_field($settings['wpjob_heading']);
         $args['page_templates']['career_page']['position']['button_text'] = sanitize_text_field($settings['wpjob_button_text']);
          $args['page_templates']['career_page']['position']['button_link'] = sanitize_text_field($settings['wpjob_button_link']);

        $args['page_templates']['career_page']['video']['heading'] = sanitize_text_field($settings['video_heading']);
        $args['page_templates']['career_page']['video']['items'] = $itemsArray;
        $args['page_templates']['career_page']['perks']['variation'] = sanitize_text_field($settings['perk_variation']);
        $args['page_templates']['career_page']['perks']['items'] = $perkArray;
         $args['page_templates']['career_page']['employee_Of_the_month']['heading'] = sanitize_text_field($settings['employe_heading']);
        $args['page_templates']['career_page']['employee_Of_the_month']['items'] = $employeArray;
        
        
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        $get_alt_text = rds_alt_text();
$career_banner_alt = "";
foreach ($get_alt_text as $value) {
    if (in_array("careers-banner.webp", $value))
        $career_banner_alt = 'alt="' . $value[3] . '"';
}

    if ($settings['checkbox_value']) {
        ?>

  
    <!-- carrer banner starts -->
    <div class="container-fluid px-0 mb-5 pb-lg-5">
        <div class="row mx-lg-0 mx-0">
            <div class="col-lg-7 ps-lg-0 px-0 pe-lg-3">
                <div class="mh-lg-502 rounded-30 shadow-md-alt overflow-hidden">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/careers-banner.webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/careers-banner.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/careers-banner@2x.webp 2x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/careers-banner@3x.webp 3x" width="1075" height="502" <?php echo $career_banner_alt; ?> class="img-fluid mh-lg-502 mw-lg-100 object-fit d-lg-block d-none">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/m-careers-banner.webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/m-careers-banner.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/m-careers-banner@2x.webp 2x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/m-careers-banner@3x.webp 3x" width="1075" height="502" <?php echo $career_banner_alt; ?> class="img-fluid mh-lg-502 mw-lg-100 object-fit d-lg-none d-block">
                </div>
            </div>
            <div class="col-lg-5 pt-lg-5 pb-lg-5 pt-sm-4 pt-2 pb-3 position-relative carrer_banner_content">
                <div class="mw-lg-445 pt-lg-5 pb-lg-5">
                    <span class="display1 d-block pt-lg-5"><?php the_title(); ?></span>
                    <p class=""><?php echo $args['page_templates']['career_page']['banner']['content']; ?></p>
                    <div class="pb-lg-5 mb-lg-5">
                        <?php if(!empty($args['page_templates']['career_page']['banner']['button_text'])){ ?>
                        <button onclick="scrollSmoothTo('open_position')" class="btn btn-primary mw-248"><?php echo $args['page_templates']['career_page']['banner']['button_text']; ?></button>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- carrer banner ends -->
    <!-- carrer content start -->
    <div class="container-fluid mb-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="pb-lg-2"><?php echo $args['page_templates']['career_page']['heading']; ?></h1>
                    <h2 class=""><?php echo $args['page_templates']['career_page']['subheading']; ?></h2>
                </div>
                <div class="col-lg-8">
                    <p class="pe-lg-2">
                        <?php
                       
                        echo $args['page_templates']['career_page']['content'];
                        
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- carrer content end -->
    <!-- carrer icons -->
    <?php
    if ($args['page_templates']['career_page']['perks']['variation'] == 'a' && $args['page_templates']['career_page']['perks']['enable'] ) {
        get_template_part('global-templates/careers/perks/a', null, $args);
    } elseif ($args['page_templates']['career_page']['perks']['variation'] == 'b' && $args['page_templates']['career_page']['perks']['enable'] ) {
        get_template_part('global-templates/careers/perks/b', null, $args);
    }
    ?>
    <!-- carrer icons -->
    <!-- employee review -->
    <?php
    if ($args['page_templates']['career_page']['employee_Of_the_month'] && $args['page_templates']['career_page']['employee_Of_the_month']['enable']) {
        get_template_part('global-templates/careers/employee-Of-the-month/a', null, $args);
    }
    ?>
    <!-- employee review -->
    <?php
    if ($args['page_templates']['career_page']['position'] && $args['page_templates']['career_page']['position']['enable']) {
        if ($args['page_templates']['career_page']['position']['wp_job_board'] == true) {
            ?>
            <div class="container-fluid" id="open_position">
                <div class="container pb-5">
                        <div  class="row">
                            <div class="col-lg-12">
                                <h4 class="mb-0 pb-4"><?php echo $args['page_templates']['career_page']['position']['heading']; ?></h4>
                <?php
                echo do_shortcode('[wpjb_jobs_list]');
                ?>
            </div>
            </div>
            </div>
            </div>
            <?php
        } else {
            ?>
            <!-- open positions -->
            <?php
            $team_args = array('post_type' => 'bc_position', 'posts_per_page' => -1, 'order' => 'DESC', 'post_status' => 'publish');
            $query = new WP_Query($team_args);
                ?>
                <div class="container-fluid" id="open_position">
                    <div class="container pb-5">
                        <div  class="row">
                            <div class="col-lg-12">
                                <h4 class="mb-0 pb-4"><?php echo $args['page_templates']['career_page']['position']['heading']; ?></h4>
                                    <?php if(!empty($args['page_templates']['career_page']['position']['button_text'])){ ?>
                                    <a href="<?php echo get_home_url().$args['page_templates']['career_page']['position']['button_link']; ?>/" class="mb-4 btn btn-primary mw-206">
                                            <?php echo $args['page_templates']['career_page']['position']['button_text']; ?> 
                                            <i class="icon-chevron-right1 ms-2 text_16 line_height_16"></i>
                                        </a>
                                <?php } ?>
                            </div>

                            <div id="career_services_swiper" class="swiper swiper-container pb-5">
                            <div class="abc swiper-wrapper "> 
                            
                            <?php if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="swiper-slide mb-lg-0 mb-4">
                                    <div class="color_quaternary_bg p-4">
                                        <h6 class="position_title"><?php the_title() ?></h6>
                                        <p class="text_bold"><?php echo get_post_meta(get_the_ID(), 'team_position', true); ?></p>
                                        <p class="h-120"><?php 
                                        if (get_post_meta(get_the_ID(), 'team_custom_content', true)) {
                                           
                                           echo wp_trim_words(get_post_meta(get_the_ID(), 'team_custom_content', true), 25, '...');
                                        }else{   
                                                        
                                            
                                            echo wp_trim_words(get_the_content(), 25, '...');
                                         }?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary mw-206">
                                            View position 
                                            <i class="icon-chevron-right1 ms-2 text_16 line_height_16"></i>
                                        </a>
                                        
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();

                            endif;
                            ?>
                              
                        </div>
                          <div class="swiper-pagination   swiper-pagination-service "></div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
            
        }
    }
    ?> 
    <!-- open positions -->
    <?php if ($args['page_templates']['career_page']['faq'] && $args['page_templates']['career_page']['faq']['enable']) { ?>
        <!-- Faq Start --> 
        <div class="container-fluid pb-5" >
            <div class="container career_faq">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="pb-3"><?php echo $args['page_templates']['career_page']['faq']['heading'] ?></h4>
                        <?php
                        $faqData = $args['page_templates']['career_page']['faq']['data'];
                        $accordion = '';
                        foreach ($faqData as $value) {
                            $accordion .= '[bc_card title="' . $value['question'] . '"] ' . $value['content'] . '[/bc_card]';
                        }
                        ?>
                        <?php echo do_shortcode('[bc_accordion]' . $accordion . '[/bc_accordion]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq End -->
    <?php } ?>

    <!-- culture area starts -->
    <div class="container-fluid">
        <div class="container">
            <?php
            if ($args['page_templates']['career_page']['video'] && $args['page_templates']['career_page']['video']['enable']) {
                get_template_part('global-templates/careers/videos/a', null, $args);
            }
            ?>
            <!-- culture area ends -->
            <!-- carrer gallery -->
            <?php
            get_template_part('global-templates/careers/gallery/a', null, $args);
            ?>
            <!-- carrer gallery -->
    
                <div class="modal fade request_form px-lg-0 px-0 pt-5 pt-md-0" id="view_position_form" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="requestcoupon_Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered px-lg-0 px-2 " role="document">
                    <div class="modal-content border-0 rounded-0 text-center">
                        <div class="modal-header border-0 p-0">
                            <button type="button" class="close coupon-popup-close position-absolute bg-transparent border-0 pb-0 px-0" data-bs-dismiss="modal" aria-label="Close" style="opacity:1; z-index: 999; color:#fff ;">
                                <i class="icon-xmark1 text_30 line_height_26"></i>
                            </button>
                        </div>
                        <div class="modal-body p-lg-4 p-2 w-100 my-auto mx-auto coupons">
                            <div class="border-dashed-7 pt-lg-4 pb-lg-4 py-4 footer_form_A ui_kit_footer_form">
                                <h3 class="px-lg-0 px-4">Job Application</h3>
                                <div class="my-md-0 mt-lg-4 mt-3 w-lg-260 mx-auto text-start text-lg-center d-flex align-items-center justify-content-center pb-4 px-lg-0 px-4">
                                    </div>
                                <div class="px-lg-5 mx-lg-4 px-4">
                                    <?php
                                    echo do_shortcode('[gravityforms id="12" ajax=true]');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script>
                function scrollSmoothTo(elementId) {
                    var offset = <?php echo wp_is_mobile() ? 80 : 220; ?>;

jQuery("html, body").animate({
    scrollTop: jQuery('#open_position').offset().top - offset
}, 500);

                }
                //Job Application js
                function viewPostionButtonClick(attr) {
                    var jobTitle = jQuery(attr).siblings('.position_title').text();
                    console.log(jobTitle);
                    jQuery(".job-title").find('input:text').val(jobTitle);
                }


                jQuery(document).ready(function () {
        var CountSlider = "<?php echo $query->found_posts; ?>";
        var loop = false;
        if (CountSlider > 3) {
            loop = true;
        } 
        if (CountSlider < 3) {
           
            jQuery(".abc.swiper-wrapper").addClass("justify-content-center");
        }       
    
     var swiper = new Swiper("#career_services_swiper", {
      
      slidesPerView: 1,
      spaceBetween: 10,
      autoplay: {enabled: true},
      noSwiping: true,
      pagination: {
        el: ".swiper-pagination-service",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
          autoplay: {enabled: true},
          noSwiping: true,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
          autoplay: {enabled: true},
          noSwiping: true,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
          autoplay: {enabled: true},
          noSwiping: true,
        },
      },
    });

    });
            </script>

    <?php 
    }
         
    }

    /**
     * Render request widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     * @access protected
     */
}