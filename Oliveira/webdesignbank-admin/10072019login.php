<?php
//session_start();
$page_ID=0;
include('php-function/function.php');
include('req-admin/head-include-admin.php');
?>
</head>
<body>
	<main>
    	<div id="main-wrapper">
        	<?php include('req-admin/header-admin.php'); ?>
        </div><!--end main-wrapper-->
  		<?php //include('req/slider.php'); ?>
        
  		<section class='login-wrap'>
        	<div class="admin-text-formation">
            	<div class='container'>
                	<div class="row">
                    	<div class="col-12">
                        	<div class="text-typography">                            	
                            	<div class="form-panel">
                                	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" >
                                   		<div class="form-group">
                                        	<label for="username">username</label>
                                            <input type="text" id="username" name="Username" class='form-control' placeholder='please fill this field' required />
                                    	</div>
                                        <div class="form-group">
                                        	<label for="password">password</label>
                                            <input type="password" id="password" name="Password" class='form-control' placeholder='please fill this field' required />
                                    	</div>
                                        <input type="submit" name="login" value='login' class="btn btn-info common-btn">
                                    </form>
                                    
                                    <?= $error;?>
                                </div><!--end form-panel-->
                            </div><!--end text-typography-->
                        </div><!--end col-12-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end admin-text-formation-->
        </section>
    </main>
    
    <?php //include('req/booking-widget.php'); ?>
    <?php include('req-admin/footer-admin.php'); ?>
</body>
</html>
