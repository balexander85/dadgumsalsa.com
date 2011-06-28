<!--I want to thank everyone who has assisted/educated me with the building of this Dad Gum Website,
I'm going to go ahead and start the names, though there may be more later on that need to be added:
David Hafley(domain name, server access, everything)
Ben Paulsen(gave direction with header,footer,content)
-->

<?php
$urlValue = $_SERVER['REQUEST_URI'];
$base = "Dad Gum Salsa";

/*
echo "<pre>";
print_r($_SERVER);
*/
$about_pattern = '/about/i';
$blog_pattern  = '/blog/i';
$order_pattern  = '/order/i';
$gallery_pattern = '/gallery/i';
/*
echo "url value";
echo $urlValue;
echo "<br />";
echo "blog match: ";
echo preg_match($blog_pattern, $urlValue);
echo "<br />";
echo "about match: ";
echo preg_match($about_pattern, $urlValue);
echo "<br />";
die();
*/

if (preg_match($blog_pattern, $urlValue)) {
	$page = "Photo Blog";
} elseif (preg_match($about_pattern, $urlValue)) {
	$page = "About";
} elseif (preg_match($order_pattern, $urlValue)) {
	$page = "Order";
} elseif (preg_match($gallery_pattern, $urlValue)) {
	$page = "Photo Gallery";
} else {
	$page = "Home";
}

$title = $base ." | ". $page;
/*This is for selecting the correct css for each page*/
if (preg_match($blog_pattern, $urlValue)) {
	$bodyid = "blogBody";
} elseif (preg_match($about_pattern, $urlValue)) {
	$bodyid = "aboutBody";
} elseif (preg_match($gallery_pattern, $urlValue)) {
	$bodyid = "galleryBody";
} else {
	$bodyid = "mainBody";
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="image/png" rel="shortcut icon" href="resources/tomato_Favicon.png"/>
<meta name="author" content="Brian Alexander" />
<meta name="description" content="Dad Gum Salsa Coming Soon!" />
<meta name="keywords" content="Dad Gum, Salsa, Dad Gum Salsa, Chips and Salsa" />  
<title><?php print $title; ?></title>
<!--Cascading Style Sheets for this Dad'Gum Website--> 
<link rel="stylesheet" type="text/css" href="dadgumStyle.css" />
<link rel="stylesheet" type="text/css" href="dadgumStyleBlog.css" />
<!--This is for the photo gallery-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="dadgumStyleGallery.css" />
<link rel="stylesheet" type="text/css" href="resources/fancy.css" />
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.0.0.js"></script>
<script type="text/javascript">
	$(function(){		
		$(".photo-link").fancybox({ 'zoomSpeedIn': 500, 'zoomSpeedOut': 500, 'overlayShow': true }); 	
	});
</script>
<!--end of head elements for photo gallery-->
</head>
<body id="<?php print $bodyid; ?>">

<div id="headerPage"><!--added a png and adjusted the size-->
<a href="index.php"><div id="linkHome"></div></a>
</div>
