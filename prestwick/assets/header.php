<?php
    include("admin/db-function/php-function.php");
    include("webdesignbank-admin/php-function/function.php");
    $name = $hotel_info_array['hotel_name'];
    $imgPath = $website_domain."images/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/png' href='<?=$imgPath?>favicon.png' size='25x25' />
    <meta name="keywords" content="<?php if($keywords[0]!='') echo $keywords[0]; ?>" />
	<meta name="description" content="<?php if($description[0]!='') echo $description[0]; ?>" />	

	<title><?php if($title[0]!='') echo $title[0]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/themes/humanity/jquery-ui.css">
    <link href="<?=$website_domain ?>css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$website_domain ?>slick/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?=$website_domain ?>slick/css/slick-theme.css"/>
    