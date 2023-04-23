<section class="servicesWrap">
    <div class="container">
        <div class="row">
            <?php
                $servicePage_id = 10;
                $serviceaPage = $fun_obj->commonSelect_table("cms_pages", "page_ID^page_name^filename", "WHERE flag='$servicePage_id'");

                while($fetchAll =  mysqli_fetch_assoc($serviceaPage)){
                    $child_id = $fetchAll['page_ID'];

                    $service_h4 = $fun_obj->TextArray($child_id, "h4");
                    $service_p = $fun_obj->TextArray($child_id, "p");
            ?>
            <div class="col-12 col-lg-4">
                <div class="servicesBlock">
                    <div class="servicesImg">
                        <?php
                            $pageImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$child_id'");  
                            $num_row = mysqli_num_rows($pageImg);
                            if($num_row > 0){
                                $fetchGalery = mysqli_fetch_assoc($pageImg);
                                $pagename = str_replace(" ", "-", $fetchGalery['pagename']);
                                $imgName = $fetchGalery['small_img'];
                                echo"<img src='".$imgPath.$pagename."/".$imgName."' alt=''  class='img-fluid' />";
                            }         
                        ?>
                    </div>                    
                    <div class="servicesText">
                        <?php if($service_h4[0] != "") echo"<h4>$service_h4[0]</h4>"; ?>
                        <?php if($service_p[0] != "") echo"<p class='text-center'>$service_p[0]</p>"; ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>