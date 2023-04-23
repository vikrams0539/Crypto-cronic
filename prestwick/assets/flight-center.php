<section>
    <div class="container">
        <div class="row">
            <div class='center'>
                <?php
                    $flight_id = 14;
                    $heading = "";
                    $para = "";

                    $flightCenter = $fun_obj->commonSelect_table("cms_pages", "page_ID^page_name^filename", "WHERE flag=$flight_id");
                    while($flightRun = mysqli_fetch_assoc($flightCenter)){
                        $Fids = $flightRun['page_ID'];
                        $Fpage_name = $flightRun['page_name'];
                        $Ffilename = $flightRun['filename'];

                        $flight_h4 = $fun_obj->TextArray($Fids, "heading");
                        $flight_p = $fun_obj->TextArray($Fids, "p");


                        $FImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$Fids' AND img_for_slider!=1"); 
                        $num_row = mysqli_num_rows($FImg);
                        // if($num_row > 0){
                            $fetchGallery = mysqli_fetch_assoc($FImg);
                            $pagename = strtolower(str_replace(" ", "-", $fetchGallery['pagename']));
                            $imgName = $fetchGallery['small_img'];

                            
                        if($flight_h4[0] != "") $heading = "<h4>".$flight_h4[0]."</h4>";
                        if($flight_p[0] != "") $para = "<p>".$flight_p[0]."</p>";
                         
                        //  if($flight_p[0] != ""){
                        //     $para = "<p>$flight_p[0]</p>";
                        //  }
                            $div = "<div class='flightWrap'>";                            
                            $div .= "<div class='flightImg'>";
                            $div .= "<img src='".$imgPath.$pagename."/".$imgName."' alt=''  class='img-fluid' />";
                            $div .= "<div class='flightText'>";
                            $div .=  $heading;
                            $div .= $para;
                            $div .= "</div>";
                            $div .= "</div>";
                            $div .= "</div>";

                            echo $div;
                        // }
                    }
                ?>
            </div>
        </div>
    </div>
</section>