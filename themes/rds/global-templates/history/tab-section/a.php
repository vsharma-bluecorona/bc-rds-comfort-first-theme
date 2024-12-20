<div class="container-fluid history_page pt-1 pt-lg-5 pb-3 pb-lg-5 mb-4">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 ">
                                <div class=" history_tabs">
                                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <?php $tabItems = $args['page_templates']['history_page']['tab_section']['items']; 
                                    $i = 1;
                                    foreach ($tabItems as $value) {
                                        if ($i == 1) {
                                            $active_class = 'active';
                                        }
                                      echo'<li class="nav-item" role="presentation">
                                        <button class="nav-link '.$active_class.' h6" id="y'.$i.'-tab" data-bs-toggle="tab" data-bs-target="#y'.$i.'" type="button" role="tab" aria-controls="'.$i.'" aria-selected="true">'.$value['title'].'</button>
                                      </li>';
                                      $active_class ='';
                                      $i++;
                                    }
                                      ?>
                                      
                              
                                    </ul>
                                    <div class="tab-content p-lg-5 p-3 shadow" id="myTabContent">

                                    <?php
$j = 1;
foreach ($tabItems as $value) {
    if ($j == 1) {
        $active_class = 'active show';
    }

    echo '<div class="tab-pane fade ' . $active_class . '" id="y' . $j . '" role="tabpanel" aria-labelledby="y' . $j . '-tab">
        <div class="row align-items-center">
            <div class="col-md-8 order-md-1 order-1">
                <h3 class="pb-2">' . $value['heading'] . '</h3>
                <p class="mb-0 pb-4">' . $value['content'] . '</p>
            </div>
            <div class="col-md-4 pb-md-0 pb-3 order-md-2 order-2">
                <img src="' . get_exist_image_url('history', 'undraw_segment') . '" srcset="' . get_exist_image_url('history', 'undraw_segment') . ' 1x, ' . get_exist_image_url('history', 'undraw_segment@2x') . ' 2x, ' . get_exist_image_url('history', 'undraw_segment@3x') . ' 3x" class="img-fluid" alt="History Logo" width="320" height="157">
            </div>
        </div>
    </div>';
    $j++;
    $active_class = '';
}
?>


                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>