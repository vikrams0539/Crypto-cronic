<nav class="navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="<?=$website_domain?>">
            <img src="<?=$imgPath.$hotel_info_array['header_logo']?>" alt="<?= $name ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarItems" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarItems">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               
                <?php
                    $navItems = $fun_obj->commonSelect_table("cms_pages", "page_ID^page_name^filename", "WHERE for_menu='active' ORDER BY page_order ASC");
                    while($fetchAll =  mysqli_fetch_assoc($navItems)){
                        $pageName = $fetchAll['page_name'];
                        $pageUrl = $fetchAll['filename'];
                        if($fetchAll['page_name'] == "index"){
                            $pageName ="Home";
                        }
                ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=$website_domain.$pageUrl?>"><?=$pageName?></a>
                        </li>
                <?php
                    }                    
                ?>
            </ul>
        </div>
    </div>
</nav>