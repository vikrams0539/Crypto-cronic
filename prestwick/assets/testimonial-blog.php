<section class='testimonialWrap'>
    <div class="container">
        <div class='row one-time mt-5 mb-5'>
                <?php
                    $blog_id = 17;

                    $blog_Center = $fun_obj->commonSelect_table("cms_pages", "page_ID^page_name^filename", "WHERE flag=$blog_id");
                    while($blog_Run = mysqli_fetch_assoc($blog_Center)){

                        $blog_child_id = $blog_Run['page_ID'];

                        $blog_h4 = $fun_obj->TextArray($blog_child_id, "h4");
                        $blog_p = $fun_obj->TextArray($blog_child_id, "p");
                        if($blog_p[0] != "") $blog_p = "<p class='text-center'><span class='before'><img src='".$imgPath."before.png' alt='' class='img-fluid' /></span>".$blog_p[0]."<span class='after'><img src='".$imgPath."after.png' alt='' class='img-fluid' /></span></p>";

                        $blogImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$blog_child_id'");  
                        $num_row = mysqli_num_rows($blogImg);
                        if($num_row > 0){
                            $fetchGalery = mysqli_fetch_assoc($blogImg);
                            $pagename = str_replace(" ", "-", $fetchGalery['pagename']);
                            $imgName = $fetchGalery['small_img'];
                        }
                        echo"<div class='row d-flex align-items-center'>";
                            echo"<div class='col-12 col-lg-4'>";                            
                                if( $imgName != ""){
                                    echo"<img src='".$imgPath.$pagename."/".$imgName."' alt=''  class='img-fluid' />";
                                }                             
                            echo"</div>"; 
                            
                            echo "<div class='col-12 col-lg-8'>$blog_p</div>";
                        echo"</div>";

                            
                        
                    }
                ?>
                
        </div>  
    </div>
</section>