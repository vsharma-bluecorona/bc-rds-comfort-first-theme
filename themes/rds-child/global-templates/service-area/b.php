<div class="d-block">
        <?php
            //exaple how to set image sizewise
            // ['dektop', 'ipad', 'mobile']

            $img1x = [
                get_exist_image_url('service-area', 'service-map'),
                get_exist_image_url('service-area', 'service-map'),
                get_exist_image_url('service-area', 'm-service-map')
            ];
            
            $img2x = [
                get_exist_image_url('service-area', 'service-map@2x'),
                get_exist_image_url('service-area', 'service-map@2x'),
                get_exist_image_url('service-area', 'm-service-map@2x')
            ];
            
            $img3x = [
                get_exist_image_url('service-area', 'service-map@3x'),
                get_exist_image_url('service-area', 'service-map@3x'),
                get_exist_image_url('service-area', 'm-service-map@3x')
            ];

            $img1x = Implode(',', $img1x);
            $img2x = Implode(',', $img2x);
            $img3x = Implode(',', $img3x);

        ?>
    <?php  $siteid = get_current_blog_id(); ?>        
        <?php 
if ($siteid == 1) {
    echo do_shortcode('[display-map id="62776"]');
} else {
    echo do_shortcode('[custom-bg-srcset class="proudly-serving-b" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]');
}
?>

<?php 
if ($siteid == 1) {
    ?>
    <!-- interactive map for mobile -->
    <div class="d-lg-none container-fluid proudly_serving_area proudly-serving-b px-md-3 px-0 pb-md-5 pb-1 pt-md-5" style="background-size: cover; background-repeat: no-repeat; background-position: center center !important;">
        <div class="container py-md-5 pt-4 pb-5 px-md-3 px-3 mb-md-0 mb-5">
            <div class="row align-item-center py-xl-5 py-md-5 pb-5 mb-md-0 mb-5 my-lg-3">
                <div class="col-md-6 pb-md-0 pb-5 mb-md-0 mb-5 mb-lg-4">
                    <div class="d-block px-xl-5 mb-5 mb-md-0 px-4 py-4 py-lg-5 true_white_bg custom-margin shadow-md mb-md-0 mb-0 border-radius-8">
                        <h4 class="pb-1 mb-0 h1"><?php echo $args['globals']['service_area']['heading']; ?> </h4>
                        <h2 class="mb-0 pb-0 text_22 line_height_30 pe-lg-5 pe-5"><?php echo $args['globals']['service_area']['description_html_allowed']; ?></h2>
                        
                        <div class="text-center pt-3">
                            <form id="service-area-form" class="service-area-zip">
                                <input type="text" name="zip" id="zip-input" placeholder="Enter your Zip Code" maxlength="5">
                                <button type="submit"><i class="icon-arrow-right1 position-relative top-3px text_20 line_height_25"></i></button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- interactive map for mobile -->
    
    <!-- interactive map for desktop -->
    <div class="d-none d-lg-block container-fluid" style="background-size: cover; background-repeat: no-repeat; background-position: center center !important;">
        <div class="position-absolute" style="top: 50%;left: 0;transform: translateY(-50%);width:50%;">
            <div class="container">
                <div class="row">
                    <div class="col-9 offset-3">
                        <div class="d-block px-xl-5 mb-5 mb-md-0 px-4 py-4 py-lg-5 true_white_bg custom-margin shadow-md mb-md-0 mb-0 border-radius-8">
                            <h4 class="pb-1 mb-0 h1"><?php echo $args['globals']['service_area']['heading']; ?> </h4>
                            <h2 class="mb-0 pb-0 text_22 line_height_30 pe-lg-5 pe-5"><?php echo $args['globals']['service_area']['description_html_allowed']; ?></h2>
                            
                            <div class="text-center pt-3">
                                <form id="service-area-form" class="service-area-zip">
                                    <input type="text" name="zip" id="zip-input" placeholder="Enter your Zip Code" maxlength="5">
                                    <button type="submit"><i class="icon-arrow-right1 position-relative top-3px text_20 line_height_25"></i></button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- interactive map for desktop -->
    <?php 
} else {
    ?>
    <div class="container-fluid proudly_serving_area mb-5 proudly-serving-b px-md-3 px-0 pb-md-5 pb-5 pt-md-5" style="background-size: cover; background-repeat: no-repeat; background-position: center center !important;">
        <div class="container py-md-5 pt-4 pb-5 px-md-3 px-3 mb-md-0 mb-5">
            <div class="row align-item-center py-xl-5 py-md-5 pb-5 mb-md-0 mb-5 my-lg-3">
                <div class="col-md-6 pb-md-0 pb-5 mb-md-0 mb-5 mb-lg-4">
                    <div class="d-block px-xl-5 mb-5 mb-md-0 px-4 py-4 py-lg-5 true_white_bg custom-margin shadow-md mb-md-0 mb-0 border-radius-8">
                        <h4 class="pb-1 mb-0 h1"><?php echo $args['globals']['service_area']['heading']; ?> </h4>
                        <h2 class="mb-0 pb-0 text_22 line_height_30 pe-lg-5 pe-5"><?php echo $args['globals']['service_area']['description_html_allowed']; ?></h2>
                        
                        <div class="pt-2 pb-3 pb-lg-4">
                            <a href="<?php echo get_home_url() . $args['globals']['service_area']['button_link']; ?>" class="btn btn-primary mw-206">
                                <?php echo $args['globals']['service_area']['button_text']; ?> 
                                <i class="icon-chevron-right ms-2 me-0 bc_text_18 bc_line_height_18 transform_lg position-relative top_n2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
}
?>


</div>
<script>
    // Function to handle input for zip code
    document.getElementById("zip-input").addEventListener("input", function(event) {
        const zipInput = this.value.trim(); // Get the entered zip code and remove leading/trailing spaces
        const maxLength = parseInt(this.getAttribute("maxlength")); // Get the maximum length allowed

        // Remove any non-numeric characters and limit the length to maxLength
        const sanitizedZip = zipInput.replace(/\D/g, "").slice(0, maxLength);
        
        // Update the input value with the sanitized zip code
        this.value = sanitizedZip;
    });
</script>
<script>
    
    function generateZipCodeLocations(locations) {
        const zipCodeLocations = {};
        locations.forEach(location => {
            location.zipCodes.forEach(zip => {
                zipCodeLocations[zip] = location.url;
            });
        });
        return zipCodeLocations;
    }

    const locations = [
        { zipCodes: ['27278', '27312', '27208', '27502', '27510', '27511', '27513', '27514', '27516', '27517', '27518', '27519', '27523', '27526', '27529', '27539', '27540', '27545', '27559', '27560', '27562', '27571', '27587', '27591', '27592', '27596', '27597', '27601', '27603', '27604', '27606', '27607', '27608', '27609', '27610', '27612', '27613', '27614', '27615', '27616', '27617', '27701', '27703', '27704', '27705', '27707', '27712', '27713', '27243', '27252', '27253', '27258', '27298', '27302', '27344', '27349', '27355', '28315', '27504', '27501', '27505', '28323', '28326', '28327', '27521', '28334', '28339', '28306', '28312', '28301', '28303', '28304', '28305', '28311', '28314', '28344', '28348', '27281', '27546', '28356', '28371', '28374', '28376', '27325', '27332', '27330', '28387', '28390', '28391', '28394', '27376', '28395'], url: '<?php echo get_home_url();?>/triangle-area/"' },
        { zipCodes: ['27006', '27010', '27012', '27023', '27028', '27094', '27098', '27099', '27102', '27103', '27104', '27107', '27108', '27109', '27110', '27111', '27113', '27114', '27115', '27116', '27117', '27120', '27127', '27130', '27150', '27152', '27155', '27198', '27199', '27235', '27260', '27262', '27263', '27265', '27268', '27282', '27284', '27285', '27292', '27293', '27294', '27295', '27299', '27310', '27351', '27373', '27374', '28039', '28072', '28138', '28144', '28146', '28147', '28159', '27203', '27205', '27214', '27215', '27217', '27233', '27244', '27249', '27263', '27283', '27301', '27313', '27316', '27317', '27358', '27377', '27401', '27403', '27405', '27406', '27407', '27408', '27409', '27410', '27455'], url: '<?php echo get_home_url();?>/triad-area/' },
        { zipCodes: ['28079', '28101', '28104', '28105', '28110', '28112', '28134', '28173', '28202', '28203', '28204', '28205', '28206', '28207', '28208', '28209', '28210', '28211', '28212', '28215', '28217', '28226', '28227', '28274', '28277', '28278', '28001', '28023', '28025', '28027', '28031', '28036', '28075', '28078', '28081', '28083', '28088', '28097', '28107', '28115', '28117', '28124', '28128', '28129', '28163', '28213', '28216', '28223', '28262', '28269', '28006', '28012', '28016', '28032', '28034', '28037', '28052', '28054', '28056', '28630', '28080', '28092', '28098', '28120', '28125', '28164', '28166', '28214', '28601', '28602', '28609', '28610', '28613', '28625', '28637', '28650', '28658', '28673', '28677', '28682', '28667', '28638','28270','28273'], url: '<?php echo get_home_url();?>/charlotte-area/' },
        { zipCodes: ['28512', '28516', '28528', '28532', '28553', '28555', '28557', '28560', '28562', '28570', '28573', '28579', '28582', '28584', '28594', '28445', '28454', '28460', '28521', '28539', '28540', '28541', '28542', '28543', '28544', '28546', '28547', '28574'], url: '<?php echo get_home_url();?>/jacksonville-area/' },
        { zipCodes: ['27958', '27909', '27915', '27916', '27917', '27919', '27920', '27921', '27923', '27926', '27927', '27929', '27932', '27936', '27937', '27938', '27939', '27941', '27943', '27944', '27946', '27947', '27948', '27949', '27950', '27954', '27956', '27959', '27964', '27966', '27968', '27972', '27973', '27974', '27976', '27979', '27980', '27981', '27982', '27925', '27978', '27953'], url: '<?php echo get_home_url();?>/outer-banks-area/' },


       
    ];

    const zipCodeLocations = generateZipCodeLocations(locations);

    // Function to handle form submission
    document.getElementById("service-area-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        
        const zipCode = document.getElementById("zip-input").value.trim(); // Get the entered zip code
        
        if (zipCode.length === 5 && zipCodeLocations.hasOwnProperty(zipCode)) {
            const redirectUrl = zipCodeLocations[zipCode];
            window.location.href = redirectUrl; // Redirect to the corresponding URL
        } else {
            alert("Invalid Zip Code or Location not found!"); // Display an error message if the zip code is invalid or location not found
        }
    });
</script>
