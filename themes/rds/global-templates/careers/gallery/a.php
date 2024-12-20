<?php
$get_alt_text = rds_alt_text();
$alt_texts = array();

foreach ($get_alt_text as $value) {
    $image_filename = $value[0];
    $alt_texts[$image_filename] = 'alt="' . $value[3] . '"';
}


?>
        <div class="container-fluid pb-lg-0 mb-lg-5 pt-lg-5">
            <div class="row pb-lg-1">
                <div class="col-lg-12">
                    <div class="grid">
                   

                        <?php
for ($i = 1; $i <= 13; $i++) {

    $alt_text = $alt_texts['careers-gallery-'.$i.'.webp'];

    $image_url = get_exist_image_url('careers', 'careers-gallery-'.$i.'');
     $image_url2x = get_exist_image_url('careers', 'careers-gallery-'.$i.'@2x');
     $image_url3x = get_exist_image_url('careers', 'careers-gallery-'.$i.'@3x');
    ?>
    <div class="grid_inner mb-32">
        <img src="<?php echo $image_url; ?>" <?php echo $alt_text; ?> class="img-fluid" srcset="<?php echo $image_url; ?> 1x, <?php echo $image_url2x; ?> 2x, <?php echo $image_url3x; ?> 3x ">
    </div>
    <?php
}
?>

                    </div>
                </div>
            </div>
        </div>