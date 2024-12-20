<?php

/* * *Register RDS Widget Start** */

function register_rds_elemetor_widgets($widgets_manager) {

     function include_first_existing_file($file) {
             $file_path = get_stylesheet_directory().'/inc/elementor-widgets/' . $file;
            if (file_exists($file_path)) {
                require_once($file_path);
                return; 
            }else{
                $parent_file_path = get_template_directory().'/inc/elementor-widgets/' . $file; 
                require_once($parent_file_path);
                return; 
            }
        
        
    }


   include_first_existing_file('RDS_Accordion_Widget.php' );

   $widgets_manager->register(new \RDS_Accordion_Widget());

    include_first_existing_file('RDS_Discover_The_Difference_Widget.php' );

    $widgets_manager->register(new \RDS_Discover_The_Difference_Widget());

    include_first_existing_file('RDS_Financing_CTA_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_CTA_Widget());

    include_first_existing_file('RDS_Testimonial_Widget.php' );

    $widgets_manager->register(new \RDS_Testimonial_Widget());

    include_first_existing_file('RDS_Services_Widget.php' );

    $widgets_manager->register(new \RDS_Services_Widget());

    include_first_existing_file('RDS_Promotion_Widget.php' );

    $widgets_manager->register(new \RDS_Promotion_Widget());

    include_first_existing_file('RDS_Promotion_new_Widget.php' );

    $widgets_manager->register(new \RDS_Promotion_new_Widget());

    include_first_existing_file('RDS_Request_Service_Widget.php' );

    $widgets_manager->register(new \RDS_Request_Service_Widget());


    include_first_existing_file('RDS_Service_Area_Widget.php' );

    $widgets_manager->register(new \RDS_Service_Area_Widget());

    include_first_existing_file('RDS_Annoucement_Bar_Widget.php' );

    $widgets_manager->register(new \RDS_Annoucement_Bar_Widget());

    include_first_existing_file('RDS_Hero_Widget.php' );

    $widgets_manager->register(new \RDS_Hero_Widget());

    include_first_existing_file('RDS_Cta_Widget.php' );

    $widgets_manager->register(new \RDS_Cta_Widget());

    include_first_existing_file('RDS_Header_Widget.php' );

    $widgets_manager->register(new \RDS_Header_Widget());

    // include_first_existing_file('RDS_Header_Top_Widget.php' );

    // $widgets_manager->register(new \RDS_Header_Top_Widget());

    include_first_existing_file('RDS_Financing_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_Widget());

    include_first_existing_file('RDS_Schedule_Service_Widget.php' );

    $widgets_manager->register(new \RDS_Schedule_Service_Widget());

    include_first_existing_file('RDS_Free_Widget.php' );

    $widgets_manager->register(new \RDS_Free_Widget());


    include_first_existing_file('RDS_Affiliation_Widget.php' );

    $widgets_manager->register(new \RDS_Affiliation_Widget());

    include_first_existing_file('RDS_Footer_Widget.php' );

    $widgets_manager->register(new \RDS_Footer_Widget());

    include_first_existing_file('RDS_Career_Header_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Header_Widget());

    include_first_existing_file('RDS_Career_Banner_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Banner_Widget());

    include_first_existing_file('RDS_Career_Perk_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Perk_Widget());

    include_first_existing_file('RDS_Career_Employee_Of_The_Month_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Employee_Of_The_Month_Widget());

    include_first_existing_file('RDS_Career_Job_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Job_Widget());

    include_first_existing_file('RDS_Career_Video_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Video_Widget());

    include_first_existing_file('RDS_Company_Service_Widget.php' );

    $widgets_manager->register(new \RDS_Company_Service_Widget());

    include_first_existing_file('RDS_We_are_hiring_Widget.php' );

    $widgets_manager->register(new \RDS_We_are_hiring_Widget());

    include_first_existing_file('RDS_Seo_Widget.php' );

    $widgets_manager->register(new \RDS_Seo_Widget());

    include_first_existing_file('RDS_Subpage_Widget.php' );

    $widgets_manager->register(new \RDS_Subpage_Widget());

    include_first_existing_file('RDS_Service_Subpage_Banner_Widget.php' );

    $widgets_manager->register(new \RDS_Service_Subpage_Banner_Widget());

    include_first_existing_file('RDS_Contact_Widget.php' );

    $widgets_manager->register(new \RDS_Contact_Widget());

    include_first_existing_file('RDS_Subpagesidebar_Widget.php' );

    $widgets_manager->register(new \RDS_Subpagesidebar_Widget());

     include_first_existing_file('RDS_Subpagesidebar_Request_Widget.php' );

    $widgets_manager->register(new \RDS_Subpagesidebar_Request_Widget());

    include_first_existing_file('RDS_Subpagesidebar_Promotion_Widget.php' );

    $widgets_manager->register(new \RDS_Subpagesidebar_Promotion_Widget());

    include_first_existing_file('RDS_Subpagesidebar_Financing_Widget.php' );

    $widgets_manager->register(new \RDS_Subpagesidebar_Financing_Widget());

    include_first_existing_file('RDS_Service_Subpagesidebar_Request_Widget.php' );

    $widgets_manager->register(new \RDS_Service_Subpagesidebar_Request_Widget());

    include_first_existing_file('RDS_Service_Subpagesidebar_Services_Widget.php' );

    $widgets_manager->register(new \RDS_Service_Subpagesidebar_Services_Widget());

    include_first_existing_file('RDS_Service_Subpagesidebar_Financing_Widget.php' );

    $widgets_manager->register(new \RDS_Service_Subpagesidebar_Financing_Widget());

    include_first_existing_file('RDS_Promotion_Template.php' );

    $widgets_manager->register(new \RDS_Promotion_Template());

     include_first_existing_file('RDS_About_Middle_Content_Widget.php' );

    $widgets_manager->register(new \RDS_About_Middle_Content_Widget());

    include_first_existing_file('RDS_About_Meet_The_Team_Widget.php');

    // include_first_existing_file('RDS_About_Meet_The_Team_Widget.php' );

    $widgets_manager->register(new \RDS_About_Meet_The_Team_Widget());

    include_first_existing_file('RDS_Career_Gallery_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Gallery_Widget());

    include_first_existing_file('RDS_Team_Widget.php' );

    $widgets_manager->register(new \RDS_Team_Widget());

    include_first_existing_file('RDS_Career_Seo_Widget.php' );

    $widgets_manager->register(new \RDS_Career_Seo_Widget());

    include_first_existing_file('RDS_Financing_Content_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_Content_Widget());

    include_first_existing_file('RDS_Financing_Affiliation_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_Affiliation_Widget());

    include_first_existing_file('RDS_Financing_form_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_form_Widget());

    include_first_existing_file('RDS_Financing_Company_Service_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_Company_Service_Widget());

     include_first_existing_file('RDS_Financing_Middle_Content_Widget.php' );

    $widgets_manager->register(new \RDS_Financing_Middle_Content_Widget());
    
    include_first_existing_file('RDS_Testimonial_Template.php' );

    $widgets_manager->register(new \RDS_Testimonial_Template());

    include_first_existing_file('RDS_Landing_Page_Banner_Widget.php' );

    $widgets_manager->register(new \RDS_Landing_Page_Banner_Widget());

    include_first_existing_file('RDS_History_Middle_Content_Widget.php' );

    $widgets_manager->register(new \RDS_History_Middle_Content_Widget());

    include_first_existing_file('RDS_History_CTA_Widget.php' );

    $widgets_manager->register(new \RDS_History_CTA_Widget());

    include_first_existing_file('RDS_History_Tab_Section_Widget.php' );

    $widgets_manager->register(new \RDS_History_Tab_Section_Widget());

    include_first_existing_file('RDS_Thankyou.php' );

    $widgets_manager->register(new \RDS_Thankyou());

    include_first_existing_file('RDS_Gallery_Widget.php' );

    $widgets_manager->register(new \RDS_Gallery_Widget());

    include_first_existing_file('RDS_Blog_Page_Widget.php' );

    $widgets_manager->register(new \RDS_Blog_Page_Widget());

    include_first_existing_file('RDS_Recent_post_Widget.php' );

    $widgets_manager->register(new \RDS_Recent_post_Widget());

    include_first_existing_file('RDS_Blog_Financing_Widget.php' );

    $widgets_manager->register(new \RDS_Blog_Financing_Widget());


    include_first_existing_file('RDS_Whychooseus_Widget.php' );

    $widgets_manager->register(new \RDS_Whychooseus_Widget());

     include_first_existing_file('RDS_Whychooseus_template_Widget.php' );

    $widgets_manager->register(new \RDS_Whychooseus_template_Widget());

     include_first_existing_file('RDS_Comfort_template_Widget.php' );

    $widgets_manager->register(new \RDS_Comfort_template_Widget());

    include_first_existing_file('RDS_Giving_Back_template_Widget.php' );

    $widgets_manager->register(new \RDS_Giving_Back_template_Widget());


}

add_action('elementor/widgets/register', 'register_rds_elemetor_widgets');
/* * *Register RDS Widget End** */

/* * *Register RDS Elemetor Panel Category Start** */

function rds_elementor_widget_category($elements_manager) {
    $elements_manager->add_category(
            'rds-global-widgets',
            [
                'title' => __('RDS Global Widgets', 'rds-global-widgets'),
                'icon' => 'fa fa-plug', // Replace with your desired icon
            ]
    );

    $elements_manager->add_category(
            'rds-template-widgets',
            [
                'title' => __('RDS Template Widgets', 'rds-template-widgets'),
                'icon' => 'fa fa-plug', // Replace with your desired icon
            ]
    );

}

add_action('elementor/elements/categories_registered', 'rds_elementor_widget_category');
/* * *Register RDS Elemetor Panel Category End** */

function custom_widget_shortcode() {
    // Get the widget instance
    $widgets_manager = \Elementor\Plugin::$instance->widgets_manager;
    $widget_class = $widgets_manager->get_widget_types()['rds-discover-the-difference-widget'];
    ob_start();
    $widget_class->render();
    $output = ob_get_clean();
    return $output;
}

//add_shortcode('cvbcvbc', 'custom_widget_shortcode');
// Register a sidebar
function register_elementor_sidebar() {
    register_sidebar(array(
        'name' => esc_html__('Elementor Sidebar', 'elementor-sidebar'),
        'id' => 'elementor-sidebar',
        'description' => esc_html__('Add widgets here for the elementor sidebar.', 'elementor-sidebar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'register_elementor_sidebar');

function enqueue_custom_js_for_elementor_backend() {
    ?>
       <script>
        //Select Option Script
            var x, i, j, selElmnt, a, b, c;
            /*look for any elements with the class "custom-select":*/
            function bc_update_select_design() {
                x = document.querySelectorAll(".dropdown-select .ginput_container_select");
                for (i = 0; i < x.length; i++) {
                    selElmnt = x[i].getElementsByTagName("select")[0];
                    /*for each element, create a new DIV that will act as the selected item:*/
                    a = document.createElement("DIV");
                    a.setAttribute("class", "select-selected rounded-0");
                    a.setAttribute("tabindex", 0);
                    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                    x[i].appendChild(a);
                    /*for each element, create a new DIV that will contain the option list:*/
                    b = document.createElement("DIV");
                    b.setAttribute("class", "select-items select-hide");
                    for (j = 1; j < selElmnt.length; j++) {
                        /*for each option in the original select element,
                         create a new DIV that will act as an option item:*/
                        c = document.createElement("DIV");
                        c.innerHTML = selElmnt.options[j].innerHTML;
                        b.appendChild(c);
                    }
                    x[i].appendChild(b);
                    /*For form keydown and up*/
                }
            }
            function closeAllSelect(elmnt) {
                // console.log('click');
                /*a function that will close all select boxes in the document,
                 except the current select box:*/
                var x, y, i, arrNo = [];
                x = document.getElementsByClassName("select-items");
                y = document.getElementsByClassName("select-selected");
                for (i = 0; i < y.length; i++) {
                    if (elmnt == y[i]) {
                        arrNo.push(i);
                    } else {
                        y[i].classList.remove("select-arrow-active");
                    }
                }
                for (i = 0; i < x.length; i++) {
                    if (arrNo.indexOf(i)) {
                        x[i].classList.add("select-hide");
                    }
                }
            }
            /*if the user clicks anywhere outside the select box,
             then close all select boxes:*/

            window.onload = (event) => {
                bc_update_select_design();
                document.addEventListener("click", closeAllSelect);
            };
        </script>
        <?php
        wp_enqueue_script('rds-select-script', get_template_directory_uri() . '/src/js/custom-select-option.js');
  
}
add_action( 'elementor/editor/before_enqueue_scripts', 'enqueue_custom_js_for_elementor_backend' );


add_action('elementor/editor/after_save', 'my_custom_function_after_save_template', 10, 2);

function my_custom_function_after_save_template($post_id, $editor_data) {


    $dynamic_post_data = array(
        39478 => 'homepage',
        40758 => 'about_us_page',
        40930 => 'landing_page',
        41084 => 'history_page'
        // Add more mappings for other post IDs here
    );
    if (isset($post_id) && ($post_id == 40844 || $post_id == 41084)) {
        $args = json_decode(get_option('rds_template'), TRUE);
        $rdsAccordionData = []; 
        foreach ($editor_data as $section) {
            if ($section['elType'] === 'section' && isset($section['elements'])) {
                foreach ($section['elements'] as $element) {
                    if ($element['elType'] === 'column' && isset($element['elements'])) {
                        foreach ($element['elements'] as $widget) {
                            if ($widget['elType'] === 'widget' && $widget['widgetType'] === 'rds-accordion-widget') {
                                $widgetSettings = $widget['settings'];
                                // unset($args['page_templates']['finance_page']["accordion"]);
                                if ($post_id == 41084) {
                                     $accordion_items = $widgetSettings['accordion_items'];
                                    foreach ($accordion_items as $item) {
                                        $rdsAccordionData[] = [
                                            "question" => $item["item_title"],
                                            "content" => $item["item_content"]
                                        ];
                                    }
                                    $args['page_templates']['history_page']["accordion"] = $rdsAccordionData;
                                }else{

                                      $accordion_items = $widgetSettings['accordion_items'];
                                    foreach ($accordion_items as $item) {
                                        $rdsAccordionData[] = [
                                            "question" => $item["item_title"],
                                            "content" => $item["item_content"]
                                        ];
                                    }
                                    $args['page_templates']['finance_page']["accordion"] = $rdsAccordionData;

                                }
                              

                            }

                           
                        }
                    }
                }
            }
        }
          // Convert $args back to JSON
        $json_args = json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        // Update the option value in the database
        update_option('rds_template', $json_args);
    }
    if (isset($dynamic_post_data[$post_id])) {

        $args = json_decode(get_option('rds_template'), TRUE);
        $page_template_key = $dynamic_post_data[$post_id];

        foreach ($editor_data as $section) {
            if ($section['elType'] === 'section' && isset($section['elements'])) {
                foreach ($section['elements'] as $element) {
                    if ($element['elType'] === 'column' && isset($element['elements'])) {
                        foreach ($element['elements'] as $widget) {
                            if ($widget['elType'] === 'widget' && $widget['widgetType'] === 'rds-template-seo-widget') {
                                $widgetSettings = $widget['settings'];

                                // Access settings for the "rds-template-seo-widget"
                                $heading = $widgetSettings['heading'];
                                $variation = $widgetSettings['seo_variation'];
                                $subheading = $widgetSettings['subheading'];
                                $before_read_more_content = $widgetSettings['before_read_more_content'];
                                $after_read_more_content = $widgetSettings['after_read_more_content'];

                                // Update the $args array based on $post_id
                                $args['page_templates'][$page_template_key]['seo_section']['variation'] = $variation;
                                $args['page_templates'][$page_template_key]['seo_section']['heading'] = $heading;
                                $args['page_templates'][$page_template_key]['seo_section']['subheading'] = $subheading;
                                $args['page_templates'][$page_template_key]['seo_section']['before_read_more_content'] = $before_read_more_content;
                                $args['page_templates'][$page_template_key]['seo_section']['after_read_more_content'] = $after_read_more_content;

                            }

                           
                        }
                    }
                }
            }
        }

        // Convert $args back to JSON
        $json_args = json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        // Update the option value in the database
        update_option('rds_template', $json_args);
    }
}


