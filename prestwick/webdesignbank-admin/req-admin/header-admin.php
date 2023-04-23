<nav class="navbar navbar-expand-md navbar-dark">
	<div class='container'>						
		<button class='navbar-toggler' type="button" data-toggle='collapse' data-target="#adminnav">
			<span class='navbar-toggler-icon'></span>
		</button>
		<a href="<?=@$admin_url; ?>" class='navbar-brand'>CMS Login- <b><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<?=@$usertype['type'];?></b></a>	
				
		<div class='collapse navbar-collapse' id="adminnav">
			<ul class='navbar-nav mx-auto'>
				<li class='nav-item'><a href="<?=$website_domain; ?>" class="nav-link" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;visit website</a></li>
				<li class='nav-item'><a href="javascript:void(0);" class="nav-link">
				
				<?php 
				$getHotelInfo=$fun_obj->commonSelect_table("cms_hotel_info","hotel_ID^hotel_name","");
				//var_dump($getHotelInfo);
				if(mysqli_num_rows($getHotelInfo)>0)
				{
					while($hotel_run=mysqli_fetch_array($getHotelInfo))
					{
						$hotelname=substr($hotel_run['hotel_name'],0,20);
						if($hotelname!='')
						{
							echo $hotelname."..";
						}					
					}
				}
				else
					{
						echo "<cite>Property Not Found!</cite>";
					}
				?>
				
				</a></li>				
			</ul>
			<ul class=''>
				<li class='nav-item'>
					<form action='' method='post'>
						<input type='text' name='search' id='search' autocomplete='off' placeholder='Search Here'> 
						<input type='submit' name='search_text' value='search' class=''>
					</form>
				</li>
				<li class='nav-item'><a href="<?=@$admin_url; ?>10072019logout.php" class="nav-link">logout</a></li>
				
			</ul>
		</div>
	</div>
</nav>