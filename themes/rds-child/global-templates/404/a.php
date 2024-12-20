<?php $get_alt_text = rds_alt_text();
$alt = "";   

foreach ($get_alt_text as $value) {

if (in_array("404-img-1.webp", $value))
   $alt =  'alt="'.$value[3].'"'; 

}
 ?>  
       <div class="container-fluid pt-lg-4">
        <div class="container py-5 px-0 px-md-3">
            <div class="row mx-0">
                <div class="col-md-7 px-lg-0">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/404/404-img.svg"  width="482" height="392" class="img-fluid mx-auto" <?php echo $alt;  ?>></div>
                <div class="col-md-5 text-center pt-4">  
                    <h1 class="mt-4 pt-4 alt_color8 pt-lg-5">Oops!</h1>
                    <h2 class="alt_color8 d-block pb-4 mb-2 mt-4">Page Not Found</h2>
                    <div class="text-center">
                        <a href="<?php echo get_home_url(); ?>" class="btn btn-primary mw-255 mh-60" name="Return to Home">Return home</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-4 pt-lg-5">
                <div class="col-lg-12 col-xl-12 mx-auto">
                    <div class="py-4 5 text-center bg-secondary-alt rounded-9"> 
                        <h6 class="d-lg-inline d-block mr-md-3 mr-0 mb-3 text-capitalize text_23 line_height_28 text_normal default_font_family_c">Or Jump To...</h6>
                        <div class="d-sm-inline-block d-flex flex-column page_main_links">
                            <?php
                            $i = 1;
                            $name = $args['globals']['404']['menu_name'];
                            $menu = get_term_by('name', $name, 'nav_menu');
                            $menu_items = wp_get_nav_menu_items($menu);
                            $site_id = get_current_blog_id();
                            if (isset($menu_items) && !empty($menu_items)) :
                                foreach ($menu_items as $key => $value) :
                                    $class = ''; 
                                    $href=$value->url;
                                    $id = 'id-' . $i; 
                                    
                                   if($site_id==1) {
                                    if (in_array($id, array('id-1', 'id-2', 'id-3','id-4'))) {
                                        $class = "openModalBtn"; 
                                        $href="javascript:void(0)";
                                    }
                                }
                            ?>
                                    <a id="<?php echo $id; ?>" href="<?php echo  $href; ?>" target="<?php echo $value->target; ?>" class="<?php echo $class; ?> Btn mx-1 mx-md-2 my-lg-0 my-2 text_16 line_height_40 default_font_family_c text_bold text-capitalize no_hover_underline "> <?php echo $value->post_title; ?></a>
                            <?php
                                    $i++;
                                endforeach;
                            endif;
                            ?>

                           
                        </div>
                        <span class="error-pipe position-relative d-none d-md-inline-block"></span>                       
                            <form onsubmit="return validateSearchFormdesktop()" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group search d-inline-flex align-items-center error-search-box">
                          
                            <div class="input-group-prepend pl-5 pl-sm-0">
                                <button id="searchsubmit" aria-label="magnifying glass" type="submit" class="input-group-text bg-transparent  border-0 h-56 text-center m_w_45 rounded-0 focus-outline-0 cursor-pointer"><i class="icon-magnifying-glass1 true_black text_18 line_height_18 mx-auto"></i></button>
                            </div>
                            <input type="text" value="<?php echo get_search_query();?>" name="s" id="headrSearch" class="form-control rounded-0 empty-search error-search bc_font_alt_1 bc_text_semibold border-0  h-56" placeholder="SEARCH">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          function validateSearchFormdesktop() {
            var searchQuery = document.getElementById('headrSearch').value.trim();
            console.log(searchQuery)

            if (searchQuery === '') {
             
              return false;
            }
            return true;
          }
        </script>