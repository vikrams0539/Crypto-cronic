<?php
    $page_ID = 6;
    require("assets/header.php");
?>
</head>
    <body>
        <?php
            $pageBgImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$page_ID' AND img_for_slider=1");           
            $num_row = mysqli_num_rows($pageBgImg);
            if($num_row > 0){
                $fetchGalery = mysqli_fetch_assoc($pageBgImg);
                $pagename = strtolower(str_replace(" ", "-", $fetchGalery['pagename']));
                $imgName = $fetchGalery['small_img'];
            }
        ?>
        <section class="homeHeader" style="background-image: url('<?=$imgPath.$pagename."/".$imgName?>')">
            <?php require("assets/navbar.php"); ?>
            <?php require("assets/contact-caption.php"); ?>
        </section> 
        <section class="mt-5 mb-5 pt-5 pb-4">
            <div class="container">
                <div class="row">
                    <div class='col-12 text-center'>
                        <?php if($h4[0] != "") echo"<h2 class='w-75 mx-auto'>$h4[0]</h2>"; ?>
                        <?php if($p[0] != "") echo"<p class='w-75 mx-auto'>$p[0]</p>"; ?>
                    </div>
                </div>
            </div>
        </section>
        
        
        <?php require("assets/footer.php"); ?>
    </body>
</html>