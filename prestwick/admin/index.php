<?php
    require("components/admin-header-links-inc.php");
?>
</head>
<body>
    <main>
        <?php require("components/admin-left-inc.php"); ?>
        <?php require("components/admin-header-inc.php"); ?>
        <section>
            <div class="container">
                <div class="row">                    
                    <div class="col-12 pl-50 buttonWrap">
                        <a href="" class="buttonStyle active" data-items="Pilots">
                            <img src="<?=$adminImgURL?>flight_takeoff.png" class='img-fluid' /><span>Pilots Database</span>
                        </a>
                        <a href="" class="buttonStyle" data-items="Member">
                            <img src="<?=$adminImgURL?>person_filled.png" class='img-fluid' /><span>Member Databse</span>
                        </a>
                        <a href="" class="buttonStyle" data-items="Plane">
                            <img src="<?=$adminImgURL?>airplanemode_active.png" class='img-fluid' /><span>Aircraft Databse</span>
                        </a>
                    </div>                    
                    <div class="col-12">
                        <div class="displayRecord">

                            <!-- Pilot Database -->
                            <?php require("components/admin-pilot-table.php"); ?>   

                            <!-- Member Database -->  
                            <?php require("components/admin-member-table.php"); ?>

                            <!-- Plane Database -->  
                            <?php require("components/admin-aircraft-table.php"); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    require("components/admin-footer-inc.php");
?>  
</body>
</html>