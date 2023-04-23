<?php 
$page_ID = 1;
    include("assets/header.php"); 
?>
<body>
    <main>
        <header>
            <div class="headerImg">
                <!-- <img src="<?php //$website_domain?>images/signature.png" alt=""> -->
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-5"></div>
                        <div class="col-12 col-lg-7">
                            <aside>
                                <div class="header-content-section">
                                    <div class="logoSection">
                                        <img src="<?= $website_domain?>images/<?= $hotel_info_array['header_logo'] ?>" alt="" class='img-fluid'>
                                    </div>
                                    <div class="contextSection">
                                        <?php if($h2[0] != '') echo"<h2>".$h2[0]."</h2>"; ?>
                                        <?php if($p[0] != '') echo"<p>".$p[0]."</p>"; ?>
                                        <div class="buttonWrap">
                                            <button Type="button" class="buttons">Buy Now</button>
                                        </div>
                                    </div>
                                    <div class="featuresSection">
                                        <ul>
                                            <li>
                                                <div class="featureBlock">
                                                    <div class="featureImg">
                                                        <img src="<?= $website_domain?>images/feature/f1.png" alt="" class='img-fluid'>
                                                    </div>
                                                    <div class="featureText">
                                                        <h4>Antioxidants & Polyphenols</h4>
                                                        <p>Our olives are harvested when the level of polyphenols and antioxidants are at their highest.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="featureBlock">
                                                    <div class="featureImg">
                                                        <img src="<?= $website_domain?>images/feature/f2.png" alt="" class='img-fluid'>
                                                    </div>
                                                    <div class="featureText">
                                                        <h4>Pesticide Free</h4>
                                                        <p>Some of our trees are over a hundred years old, and all of them are carefully maintained.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="featureBlock">
                                                    <div class="featureImg">
                                                        <img src="<?= $website_domain?>images/feature/f3.png" alt="" class='img-fluid'>
                                                    </div>
                                                    <div class="featureText">
                                                        <h4>High in Oleic Acid</h4>
                                                        <p>Oleic acid has a healing effect on the body, reduces inflammation and is good for skin and hair health.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php include("assets/where-it-grown.php"); ?>
        <?php include("assets/about-us.php"); ?>
        <?php include("assets/product-benefits.php"); ?>
        <?php include("assets/gallery.php"); ?>
        <?php include("assets/contact-us.php"); ?>
    </main>    

    <?php include("assets/footer.php"); ?>
</body>
</html>

