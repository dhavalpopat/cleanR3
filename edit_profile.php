<?php
session_start();
if (!isset($_SESSION["id"])) {
    die;
}
?>
<!DOCTYPE html>
<html lang="en-US" class="cmsms_html">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="img/favicon-2.jpg" type="image/x-icon" />

<title>Clean R3 | Edit profile</title>

<link rel='stylesheet' href='LayerSlider/css/layerslider.css' type='text/css' media='all' />
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin,latin-ext' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
<link rel='stylesheet' href='css/style.css' />
<link rel='stylesheet' href='css/adaptive.css' />
<link rel='stylesheet' href='css/retina.css' />
<link rel='stylesheet' href='css/ilightbox.css' />
<link rel='stylesheet' href='css/ilightbox-skins/dark-skin.css' />
<link rel='stylesheet' href='css/cmsms-events-style.css' />
<link rel='stylesheet' href='css/cmsms-events-adaptive.css' />
<link rel='stylesheet' href='css/fontello.css' />
<link rel='stylesheet' href='css/animate.css' />

<link rel='stylesheet' href='css/econature.css' />
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oxygen%3A300%2C400%2C700&amp;ver=4.2' type='text/css' media='all' />
<link rel='stylesheet' href='css/jquery.isotope.css' type='text/css' media='screen' />

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
<script type="text/javascript">
$(document).ready(function() {
         
         	$('.section ul a').on('click', function(e)  {
         		var currentAttrValue = $(this).attr('href');
          
         		// Show/Hide Tabs
         		$('.section ' + currentAttrValue).show().siblings().hide();
          
         		// Change/remove current tab to active
         		$(this).parent('li').addClass('active').siblings().removeClass('active');
          
         		e.preventDefault();
         	});
         });
</script>
<style type="text/css">
.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list {
overflow-y:auto;
}

.header_mid_inner .logo {
position:static;
}
#footer.cmsms_footer_default .footer_inner {
min-height:450px;
}

.fixed_footer #main {
margin-bottom:450px;
}

#cmsms_row_1 .cmsms_row_outer_parent { 
padding-top: 0px; 
} 

#cmsms_row_1 .cmsms_row_outer_parent { 
padding-bottom: 0px; 
} 

#cmsms_row_1 .cmsms_row_inner.cmsms_row_fullwidth { 
padding-left:0%; 
} 
#cmsms_row_1 .cmsms_row_inner.cmsms_row_fullwidth { 
padding-right:0%; 
} 

#cmsms_row_2 .cmsms_row_outer_parent { 
padding-top: 40px; 
} 

#cmsms_row_2 .cmsms_row_outer_parent { 
padding-bottom: 20px; 
}

#cmsms_row_3 .cmsms_row_outer_parent { 
padding-top: 60px; 
} 

#cmsms_row_3 .cmsms_row_outer_parent { 
padding-bottom: 0px; 
}

#cmsms_heading_553e49e80710d, #cmsms_heading_553e49e80710d a { 
font-size:34px; 
text-align:center; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:40px; 
} 

#cmsms_row_4 .cmsms_row_outer_parent { 
padding-top: 0px; 
} 

#cmsms_row_4 .cmsms_row_outer_parent { 
padding-bottom: 0px; 
} 

#cmsms_stat_553e49e8075f6 .cmsms_stat_counter { 
color:#57cbe1; 
} 

#cmsms_stat_553e49e8076a4 .cmsms_stat_counter { 
color:#62e0c1; 
} 

#cmsms_stat_553e49e80773a .cmsms_stat_counter { 
color:#7fe092; 
} 

#cmsms_stat_553e49e8077d1 .cmsms_stat_counter { 
color:#b7f275; 
} 

#cmsms_row_5 .cmsms_row_outer_parent { 
padding-top: 0px; 
} 

#cmsms_row_5 .cmsms_row_outer_parent { 
padding-bottom: 0px; 
}

#cmsms_heading_553e49e807cad, #cmsms_heading_553e49e807cad a { 
color:#979ca4; color:rgba(151, 156, 164, 1);
font-size:18px; 
line-height:32px; 
text-align:center; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:30px; 
} 

#cmsms_row_6 .cmsms_row_outer_parent { 
padding-top: 0px; 
} 

#cmsms_row_6 .cmsms_row_outer_parent { 
padding-bottom: 70px; 
} 


#cmsms_paypal_donations_553e49e8080d0 { 
text-align:center; 
} 

#cmsms_paypal_donations_553e49e8080d0 .cmsms_button:before { 
margin-right:0;
margin-left:0; 
vertical-align:baseline; 
} 

#cmsms_paypal_donations_553e49e8080d0 .cmsms_button { 
font-weight:100; 
font-style:normal; 
} 

#cmsms_paypal_donations_553e49e8080d0 form:hover + .cmsms_button { 
} 

#cmsms_row_7 { 
background-image: url(img/bg-big-sky.jpg); 
background-position: top center; 
background-repeat: repeat-y; 
background-attachment: scroll; 
background-size: cover; 
} 

#cmsms_row_7 .cmsms_row_outer_parent { 
padding-top: 60px; 
} 

#cmsms_row_7 .cmsms_row_outer_parent { 
padding-bottom: 100px; 
} 

#cmsms_row_7 .cmsms_row_inner.cmsms_row_fullwidth { 
padding-left:10%; 
} 
#cmsms_row_7 .cmsms_row_inner.cmsms_row_fullwidth { 
padding-right:10%; 
} 

#cmsms_heading_553e49e808e7f, #cmsms_heading_553e49e808e7f a { 
color:#ffffff; color:rgba(255, 255, 255, 1);
font-size:34px; 
text-align:center; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:60px; 
} 

#cmsms_row_8 .cmsms_row_outer_parent { 
padding-top: 80px; 
} 

#cmsms_row_8 .cmsms_row_outer_parent { 
padding-bottom: 0px; 
}

#cmsms_heading_553e49e81ea44, #cmsms_heading_553e49e81ea44 a { 
font-size:32px; 
text-align:center; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:0px; 
} 

#cmsms_row_9 .cmsms_row_outer_parent { 
padding-top: 60px; 
} 

#cmsms_row_9 .cmsms_row_outer_parent { 
padding-bottom: 20px; 
} 

#cmsms_icon_list_items_553e49e81ee7b.cmsms_icon_list_pos_right .cmsms_icon_list_item:before { 
left:auto; 
right:39.5px; 
} 
#cmsms_icon_list_items_553e49e81ee7b.cmsms_icon_list_type_block .cmsms_icon_list_item:before { 
width:1px; 
} 

#cmsms_icon_list_items_553e49e81ee7b .cmsms_icon_list_icon { 
border-width:1px; 
width:80px; 
height:80px; 
-webkit-border-radius:50; 
-moz-border-radius:50; 
border-radius:50; 
} 

#cmsms_icon_list_items_553e49e81ee7b .cmsms_icon_list_icon:before { 
font-size:32px; 
line-height:78px; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81efbc .cmsms_icon_list_icon:before { 
color:#58d4e7; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81efbc:hover .cmsms_icon_list_icon { 
background-color:#58d4e7; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81efbc:hover .cmsms_icon_list_icon:before { 
color:inherit; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f115 .cmsms_icon_list_icon:before { 
color:#62e0c7; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f115:hover .cmsms_icon_list_icon { 
background-color:#62e0c7; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f115:hover .cmsms_icon_list_icon:before { 
color:inherit; 
} 

#cmsms_icon_list_items_553e49e81f520.cmsms_icon_list_items .cmsms_icon_list_item:before { 
left:39.5px; 
} 

#cmsms_icon_list_items_553e49e81f520.cmsms_icon_list_type_block .cmsms_icon_list_item:before { 
width:1px; 
} 

#cmsms_icon_list_items_553e49e81f520 .cmsms_icon_list_icon { 
border-width:1px; 
width:80px; 
height:80px; 
-webkit-border-radius:50%; 
-moz-border-radius:50%; 
border-radius:50%; 
} 

#cmsms_icon_list_items_553e49e81f520 .cmsms_icon_list_icon:before { 
font-size:32px; 
line-height:78px; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f676 .cmsms_icon_list_icon:before { 
color:#7ce095; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f676:hover .cmsms_icon_list_icon { 
background-color:#7ce095; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f676:hover .cmsms_icon_list_icon:before { 
color:inherit; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f7b9 .cmsms_icon_list_icon:before { 
color:#a6ec7c; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f7b9:hover .cmsms_icon_list_icon { 
background-color:#a6ec7c; 
} 

.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_553e49e81f7b9:hover .cmsms_icon_list_icon:before { 
color:inherit; 
} 

#cmsms_row_10 .cmsms_row_outer_parent { 
padding-top: 40px; 
} 

#cmsms_row_10 .cmsms_row_outer_parent { 
padding-bottom: 50px; 
}

#cmsms_heading_553e49e81fcae, #cmsms_heading_553e49e81fcae a { 
font-size:32px; 
text-align:center; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:0px; 
} 

#cmsms_row_11 .cmsms_row_outer_parent { 
padding-top: 0px; 
} 

#cmsms_row_11 .cmsms_row_outer_parent { 
padding-bottom: 70px; 
}

#cmsms_heading_553e49e832cc5, #cmsms_heading_553e49e832cc5 a { 
font-size:26px; 
text-align:left; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:40px; 
} 

#cmsms_tabs_list_item_553e49e832e43 a:hover,#cmsms_tabs_list_item_553e49e832e43.current_tab a { 
background-color:#57cbe1; 
border-color:#57cbe1; 
} 

#cmsms_tabs_list_item_553e49e8358a9 a:hover,#cmsms_tabs_list_item_553e49e8358a9.current_tab a { 
background-color:#62e0c1; 
border-color:#62e0c1; 
} 

#cmsms_tabs_list_item_553e49e835a40 a:hover,#cmsms_tabs_list_item_553e49e835a40.current_tab a { 
background-color:#7fe092; 
border-color:#7fe092; 
} 

#cmsms_heading_553e49e835edb, #cmsms_heading_553e49e835edb a { 
font-size:26px; 
text-align:left; 
font-weight:300; 
font-style:normal; 
margin-top:0px; 
margin-bottom:40px; 
} 

.cmsms_stats.shortcode_animated #cmsms_stat_553e49e836051.cmsms_stat { 
width:78%; 
} 

#cmsms_stat_553e49e836051 .cmsms_stat_inner { 
background-color:#57cbe1; 
color:#ffffff; 
} 

.cmsms_stats.shortcode_animated #cmsms_stat_553e49e8360f4.cmsms_stat { 
width:73%; 
} 

#cmsms_stat_553e49e8360f4 .cmsms_stat_inner { 
background-color:#62e0c1; 
color:#ffffff; 
} 

.cmsms_stats.shortcode_animated #cmsms_stat_553e49e836189.cmsms_stat { 
width:92%; 
} 

#cmsms_stat_553e49e836189 .cmsms_stat_inner { 
background-color:#7fe092; 
color:#ffffff; 
} 

.cmsms_stats.shortcode_animated #cmsms_stat_553e49e836214.cmsms_stat { 
width:88%; 
} 

#cmsms_stat_553e49e836214 .cmsms_stat_inner { 
background-color:#b7f275; 
color:#ffffff; 
} 

.cmsms_stats.shortcode_animated #cmsms_stat_553e49e83629e.cmsms_stat { 
width:78%; 
} 

#cmsms_stat_553e49e83629e .cmsms_stat_inner { 
background-color:#c9ef5f; 
color:#ffffff; 
} 

#cmsms_row_12 { 
background-image: url(img/bg-big-water.jpg); 
background-position: top center; 
background-repeat: repeat-y; 
background-attachment: scroll; 
background-size: cover; 
} 

#cmsms_row_12 .cmsms_row_outer_parent { 
padding-top: 40px; 
} 

#cmsms_row_12 .cmsms_row_outer_parent { 
padding-bottom: 20px; 
} 
body {
background-image: url(img/logo3.png)
}
</style>
</head>
<body>

<!-- _________________________ Start Page _________________________ -->
<div id="page" class="csstransition cmsms_liquid fixed_header hfeed site">
<!-- _________________________ Start Main _________________________ -->
<div id="main">
<!-- _________________________ Start Header _________________________ -->
<header id="header">
<div class="header_mid" data-height="95">
<div class="header_mid_outer">
<div class="header_mid_inner">
<div class="logo_wrap">
<a href="index.html" title="Clean R3" class="logo">
<img src="img/logo.png" alt="Clean R3" />
<img class="logo_retina" src="img/logo.png" alt="Clean R3" width="179" height="44" />
</a>
</div>
<div class="resp_nav_wrap">
<div class="resp_nav_wrap_inner">
<div class="resp_nav_content">
<a class="responsive_nav cmsms-icon-menu-2" href="javascript:void(0);"></a>
</div>
</div>
</div>

<!-- _________________________ Start Navigation _________________________ -->
<nav role="navigation">
<div class="menu-main-container">
<ul id="navigation" class="navigation">
<li class="current-menu-item">
<a href="index.php">
<span class="nav_bg_clr"></span>
<span>Home</span>
</a>
</li>
<li>
<a href="what-to-do-with.php">
<span class="nav_bg_clr"></span>
<span>What to do with</span>
</a>
<ul class="sub-menu">
<li><a href="what-to-do-with.php#electrical"><span>Electrical</span></a></li>
<li><a href="what-to-do-with.php#medicines"><span>Medicines</span></a></li>
<li><a href="what-to-do-with.php#plastic"><span>Plastic</span></a></li>
<li><a href="what-to-do-with.php#clothing"><span>Clothing</span></a></li>
<li><a href="what-to-do-with.php#furniture"><span>Furniture</span></a></li>
</ul>
</li>
<li>
<a href="reduce.php">
<span class="nav_bg_clr"></span>
<span>Reduce</span>
</a>
<ul class="sub-menu">
<li><a href="reduce.php#why-reduce"><span>Why reduce?</span></a></li>
<li><a href="reduce.php#buy-better"><span>Buying better commodities</span></a></li>
<li><a href="reduce.php#think-before-buying"><span>Think before buying</span></a></li>
<li><a href="reduce.php#more-to-reduce"><span>What more to do for reducing?</span></a></li>
</ul>
</li>
<li>
<a href="reuse.php">
<span class="nav_bg_clr"></span>
<span>Reuse</span>
</a>
<ul class="sub-menu">
<li><a href="reuse.php#why-reuse"><span>Why reuse?</span></a></li>
<li><a href="reuse.php#selling-commodities"><span>Selling commodities</span></a></li>
<li><a href="reuse.php#repairing"><span>Repairing</span></a></li>
<li><a href="reuse.php#donating"><span>Donating</span></a></li>
<li><a href="reuse.php#more-to-reuse"><span>What more to do for reusing?</span></a></li>
</ul>
</li>
<li>
<a href="recycle.php">
<span class="nav_bg_clr"></span>
<span>Recycle</span>
</a>
<ul class="sub-menu">
<li><a href="recycle.php#why-reuse"><span>Why recycle?</span></a></li>
<li><a href="recycle.php#recycle-at-home"><span>Recycle at home</span></a></li>
<li><a href="recycle.php#recycle-at-school"><span>Recycle at school</span></a></li>
<li><a href="recycle.php#recycle-at-work"><span>Recycle at work</span></a></li>
<li><a href="recycle.php#more-to-recycle"><span>What more to do for recycling?</span></a></li>
</ul>
</li>
<li>
<a href="home.php">
<span class="nav_bg_clr"></span>
<span>My account</span>
</a>
<ul class="sub-menu">
<li><a href="index.php#cmsms_row_1"><span>Locate recycling centers</span></a></li>
<li><a href="home.php"><span>Report trash</span></a></li>
<li><a href="edit_profile.php"><span>Edit profile</span></a></li>
<li><a href="logout.php"><span>Logout</span></a></li>
</ul>
</li>
</ul>
</div>
<div class="cl"></div>
</nav>
<!-- _________________________ Finish Navigation _________________________ -->
</div>
</div>
</div>
</header>
<!-- _________________________ Finish Header _________________________ -->

<!-- _________________________ Start Middle _________________________ -->
<section id="middle">
<div class="middle_inner">
<!--_________________________ Start Content _________________________ -->

</div>

<style>
#page-content {
margin: 5%;
text-align: "justify";
}
p {
font-family: times new roman;
font-size: 1.6em;
}
</style>

<div id="page-content">
	<form action="edit.php" method="post">
		<?php
		$id = $_SESSION["id"];
		$con = mysqli_connect("localhost", "root", "", "data");
		$sql1 = "select * from users  where user_id='$id'";
    $result1 = mysqli_query($con, $sql1);
    if (!$result1) {
       echo mysqli_error($con) . "<br>";
   }
   while ($row1 = mysqli_fetch_array($result1)) 
   {
		?>
		<div class="form_info cmsms_input">
	<label for="con_name">Name<span class="color_2"> *</span></label>
	<div class="form_field_wrap">
	<input type="text" name="con_name" id="con_name" size="35" value="<?php echo $row1['user_name']; ?>" required>
	</div>
	</div>
	<br><br>
<div class="form_info cmsms_input">
	<label for="contact_email_1">Current Password<span class="color_2"> *</span></label>
	<div class="form_field_wrap">
	<input type="password" name="cur_pass" id="cur_pass" size="35" required />
	</div>
	</div>
	<br><br>
<div class="form_info cmsms_input">
	<label for="contact_email_1">New Password<span class="color_2"> *</span></label>
	<div class="form_field_wrap">
	<input type="password" name="pass" id="pass" size="35" required />
	</div>
	</div>
<br><br>
<div class="form_info cmsms_input">
	<label for="contact_email_1">Confirm Password<span class="color_2"> *</span></label>
	<div class="form_field_wrap">
	<input type="password" name="con_pass" id="con_pass" size="35"  required />
	</div>
	</div>

	<br><br>
	<div class="form_info cmsms_input">
	<label for="contact_email_1">Mobile number<span class="color_2"> *</span></label>
	<div class="form_field_wrap">
	<input type="text" name="contact_no" id="contact_no" size="35"  value="<?php echo $row1['contact_no']; ?>" required />
	</div>
	</div>
	<?php } ?>
	<br><br>
<div class="form_info submit_wrap"><button type="submit" class="cmsms_button" id="contact_form_1_formsend" tabindex="14">Save changes</button></div>
<br>

<br><br>
</form>
<div id="cmsms_row_12" class="cmsms_row cmsms_color_scheme_first" data-stellar-background-ratio="0.5">
<div class="cmsms_row_outer_parent">
<div class="cmsms_row_outer">
<div class="cmsms_row_inner">
<div class="cmsms_row_margin">
<div class="cmsms_column one_first">
<div class="cmsms_sidebar sidebar_layout_14141414">
<aside class="widget widget_text">
<h3 class="widgettitle">Services</h3>
<div class="textwidget">
<ul>
<li><a href="index.php#layerslider_1">Recycling center locator</a></li>
<?php if (!isset($_SESSION["id"])) { ?>
<li><a href="login.php">Report trash</a></li>
<?php }
else
{
?>
<li><a href="home.php">Report trash</a></li>
<?php } ?>
</ul>
</div>
</aside>
<aside class="widget widget_text">
<h3 class="widgettitle">Blog</h3>
<div class="textwidget">
<ul>
<li><a href="car-battery-recycling.php">Car battery recycling</a></li>
<li><a href="recycled-platinum.php">Recycled Platinum</a></li>
<li><a href="safe-for-water.php">Safe for water?</a></li>
<li><a href="fulmars-contaminated.php">Fulmars Contaminated</a></li>
<li><a href="tiny-red-crystals.php">Tiny red crystals</a></li>
</ul>
</div>
</aside>
<aside class="widget widget_text">
<h3 class="widgettitle">About Us</h3>
<div class="textwidget">
<ul>
<li><a href="team.php">Our Team</a></li>
<li><a href="index.php#cmsms_row_8">Mission</a></li>
<li><a href="about.php">About</a></li>
</ul>
</div>
</aside>
<aside class="widget widget_text">
<h3 class="widgettitle">Contact us</h3>
<div class="textwidget">
<ul>
<li><a href="team.php#dhaval">Dhaval Popat</a></li>
<li><a href="team.php#arnaja">Arnaja Sen</a></li>
</ul>
</div>
</aside>
<div class="cl"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cl"></div>
<!-- _________________________ Finish Content _________________________ -->
</div>
</section>
<!-- _________________________ Finish Middle _________________________ -->
<a href="javascript:void(0);" id="slide_top" class="cmsms-icon-up-open-mini"></a>
</div>
<!-- _________________________ Finish Main _________________________ -->
<!-- _________________________ Start Footer _________________________ -->

<!-- _________________________ Finish Footer _________________________ -->
</div>
<!-- _________________________ Finish Page _________________________ -->
<script type='text/javascript' src='LayerSlider/js/layerslider.kreaturamedia.jquery.js'></script>
<script type='text/javascript' src='LayerSlider/js/greensock.js'></script>
<script type='text/javascript' src='LayerSlider/js/layerslider.transitions.js'></script>
<script type='text/javascript' src='js/jsLibraries.min.js'></script>
<script type='text/javascript' src='js/jquery.iLightBox.min.js'></script>
<script type='text/javascript' src='js/jqueryLibraries.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var cmsms_script = {
"ilightbox_skin":"dark",
"ilightbox_path":"vertical",
"ilightbox_infinite":"0",
"ilightbox_aspect_ratio":"1",
"ilightbox_mobile_optimizer":"1",
"ilightbox_max_scale":"1",
"ilightbox_min_scale":"0.2",
"ilightbox_inner_toolbar":"0",
"ilightbox_smart_recognition":"0",
"ilightbox_fullscreen_one_slide":"0",
"ilightbox_fullscreen_viewport":"center",
"ilightbox_controls_toolbar":"1",
"ilightbox_controls_arrows":"0",
"ilightbox_controls_fullscreen":"1",
"ilightbox_controls_thumbnail":"1",
"ilightbox_controls_keyboard":"1",
"ilightbox_controls_mousewheel":"1",
"ilightbox_controls_swipe":"1",
"ilightbox_controls_slideshow":"0",
"ilightbox_close_text":"Close",
"ilightbox_enter_fullscreen_text":"Enter Fullscreen (Shift+Enter)",
"ilightbox_exit_fullscreen_text":"Exit Fullscreen (Shift+Enter)",
"ilightbox_slideshow_text":"Slideshow",
"ilightbox_next_text":"Next",
"ilightbox_previous_text":"Previous",
"ilightbox_load_image_error":"An error occurred when trying to load photo.",
"ilightbox_load_contents_error":"An error occurred when trying to load contents.",
"ilightbox_missing_plugin_error":"The content your are attempting to view requires the <a href='{pluginspage}' target='_blank'>{type} plugin<\\\/a>."
};
/* ]]> */
</script>
</body>

</html>
