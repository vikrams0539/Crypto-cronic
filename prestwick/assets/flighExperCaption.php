<?php 
    $caption_id = 26;
    $caption_h1 = $fun_obj->TextArray($caption_id, "h1");
    $caption_p = $fun_obj->TextArray($caption_id, "p");
 ?>
<article class='pt-200 pb-200'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="typography pt-4rem text-center w-75 mx-auto">
                    <?php if($caption_h1[0] != "") echo"<h1>$caption_h1[0]</h1>"; ?>
                    <?php if($caption_p[0] != "") echo"<p>$caption_p[0]</p>"; ?>
                </div>
            </div>
        </div>
    </div>
</article>