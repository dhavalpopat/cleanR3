<?php
session_start();
if (!isset($_SESSION["id"])) {
    die;
}
$id = $_SESSION["id"];
error_reporting(0);
   $con = mysqli_connect("localhost", "root", "", "data");
    $sql1 = "select * from users  where user_id='$id'";
    $result1 = mysqli_query($con, $sql1);
    if (!$result1) {
       echo mysqli_error($con) . "<br>";
   }
   while ($row1 = mysqli_fetch_array($result1)) 
   {
   
      $u_type = $row1['user_type'];
    }
    if($u_type=='gov')
      $sql = "select * from area";
    else if($u_type=='normal')
   $sql = "select * from area where uid='$id'";
 
   
   $result = mysqli_query($con, $sql);
   if (!$result) {
       echo mysqli_error($con) . "<br>";
   }
   $i=0;
   while ($row = mysqli_fetch_array($result)) 
   {
   
      $new_array['area_id'] = $row['area_id'];
      $new_array['latitude'] = $row['latitude'];
      $new_array['longitude'] = $row['longitude'];
      $new_array['img_path'] = $row['img_path'];
      $new_array['description'] = $row['description'];
      $new_array['progress'] = $row['progress'];

    $result_loc[]=$new_array;
   }

   
/*   echo "</pre>";
   print_r($new_array);die;
   $str= json_encode($new_array);
*/
   ?>
<!DOCTYPE html>
<html lang="en-US" class="cmsms_html">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="img/favicon-2.jpg" type="image/x-icon" />

<title>Clean R3 | Home</title>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script> 
        var latlon="",myCenter;

function initialize()
{
     if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("googleMap").innerHTML = "Geolocation is not supported by this browser.";
    }
    function showPosition(position) {
     latlon = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      myCenter="Current location is "+position.coords.latitude+","+position.coords.longitude;
      $("#lat").val(position.coords.latitude);
      $("#long").val(position.coords.longitude);
     var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

     map.setCenter(latlon);
    var marker=new google.maps.Marker({
  position:latlon,
    icon: iconBase + 'schools_maps.png'

  });

marker.setMap(map);
/*var infowindow = new google.maps.InfoWindow({
  content:myCenter
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });*/
var js_array=<?php echo json_encode($result_loc);?>;
infowindow = new google.maps.InfoWindow();
for (var i = 0; i < js_array.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(js_array[i]['latitude'], js_array[i]['longitude']),
        id:js_array[i]['area_id'],
       map:map

    });

     marker.setMap(map);

    google.maps.event.addListener(marker, "rightclick", (function (marker, i){
      return function (){
      id = this.id; 
      if("<?php echo $u_type; ?>"=='gov')
      delMarker(id);
    }
       })(marker, i));
    var delMarker = function (id) {
    $.ajax({

                type: "POST",

                url: "del_marker.php",

                 data: 'id='+id,

                cache: false,

             
                    success: function(){
                        window.location="home.php";

       // $('#new_comment').removeClass("uk-open").css({'display':'none'}).addClass("uk-close");
                    },
                    error: function(){
                        alert("failure");
                    }


 
            });
}
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
          if("<?php echo $u_type; ?>"=='gov')
          var content="<img src='"+js_array[i]['img_path']+"'/><br><h4>Description:</h4><br>"+js_array[i]['description']+"<br><h4>Progress:</h4><progress value='"+js_array[i]['progress']+"' max='100'></progress>"+js_array[i]['progress']+"%<br><br><div  data-toggle='modal' class='btn btn-primary' href='#update_progress' >Change Progress</div>";
           else
          var content="<img src='"+js_array[i]['img_path']+"'/><br><h4>Description:</h4><br>"+js_array[i]['description']+"<br><h4>Progress:</h4><progress value='"+js_array[i]['progress']+"' max='100'></progress>"+js_array[i]['progress']+"%<br>";

            infowindow.setContent(content);
            infowindow.open(map, marker);
        }
    })(marker, i));
         }
}
    //var myCenter=new google.maps.LatLng(45.434046,12.340284);
var mapProp = {
  center:latlon,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);



}

google.maps.event.addDomListener(window, 'load', initialize);
      </script>
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
 <style type="text/css">

        body { margin: 50px; }
        .well { background: #fff; text-align: center; }
        .modal {
  text-align: center;
 
}
.modal-dialog{
position: absolute;
left: 50%;
//now you must set a margin left under zero - value is a half width your window
margin-left: -312px;
// this same situation is with height - example
height: 500px;
top: 50%;
margin-top: -250px;
} 
    </style>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
<script src="assets/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
   $(".open-AddBookDialog").click(function(){ // Click to only happen on announce links
     $("#bookId").val($(this).data('id'));
     $('#update_progress').modal('show');
   });
});
function myfunc(id)
{
  $("#bookId").val(id);
  alert(id);
  $('#update_progress').modal('show');
}
</script>
 <link href="assets/bootstrap.min.css" rel="stylesheet">
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
<a href="index.php" title="Clean R3" class="logo">
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
<div id="cmsms_row_2" class="cmsms_row cmsms_color_scheme_default">

</div>

<style>
#page-content {
margin: 5%;
}
p {
font-family: times new roman;
font-size: 1.6em;
}
</style>

<div id="page-content">
<div id="googleMap" style="width:900px;height:420px;"></div>
      <br><br>
      <h1>Report Trash</h1>
       <form id="form_validation"  action="add-action.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"/>
        <input type="hidden" name="lat" id="lat"/>
        <input type="hidden" name="long" id="long"/>
        <br><br>
        <textarea name="desc" id="desc" placeholder="Add description" required cols="60" rows="10"></textarea>
        <br>
<br>
<button type="submit">Submit</button>
       </form>


</div>

<div id="cmsms_row_10" class="cmsms_row cmsms_color_scheme_default">
<div class="cmsms_row_outer_parent">
<div class="cmsms_row_outer">
<div class="cmsms_row_inner">
<div class="cmsms_row_margin">
<div class="cmsms_column one_first">
<h2 id="cmsms_heading_553e49e81fcae" class="cmsms_heading">Latest News</h2>
<div class="cmsms_posts_slider" >
<script type="text/javascript">
jQuery(document).ready(function () { 
var container = jQuery('.cmsms_slider_553e49e81fd81');
containerWidth = container.width(), 
firstPost = container.find('article'), 
postMinWidth = Number(firstPost.css('minWidth').replace('px', '')), 
postThreeColumns = (postMinWidth * 4) - 1;
postTwoColumns = (postMinWidth * 3) - 1;
postOneColumns = (postMinWidth * 2) - 1; 


jQuery('.cmsms_slider_553e49e81fd81').owlCarousel( {
items : 4, 
itemsDesktop : false, 
itemsDesktopSmall : [postThreeColumns,3], 
itemsTablet : [postTwoColumns,2], 
itemsMobile : [postOneColumns,1], 
transitionStyle : false, 
rewindNav : true, 
slideSpeed : 200, 
paginationSpeed : 800, 
rewindSpeed : 1000, autoPlay : 7000, stopOnHover : true, 
autoHeight : true, 
addClassActive : true, 
responsiveBaseWidth : '.cmsms_slider_553e49e81fd81', 
pagination : false, 
navigation : true, 
navigationText : [ "<span class=\"cmsms_prev_arrow\"></span>", "<span class=\"cmsms_next_arrow\"></span>" ] 
} );
} );
</script>
<div id="cmsms_owl_carousel_553e49e81fd81" class="cmsms_owl_slider cmsms_slider_553e49e81fd81">
<div>
<!--_________________________ Start Standard Article _________________________ -->
<article class="post">
<span class="cmsms_slider_post_format_img"></span>
<div class="cmsms_slider_post_cont">
<figure class="cmsms_img_rollover_wrap preloader">
<img width="580" height="460" src="img/car-battery-recycling.png" class="full-width" alt="Car battery recycling" title="Car battery recycling" />
<div class="cmsms_img_rollover">
<a href="img/car-battery-recycling.png" data-rel="ilightbox[172_553e49e8225bb]" title="Car battery recycling" class="cmsms_image_link">
<span class="cmsms-icon-search-7"></span>
</a>
<a href="car-battery-recycling.php" title="Car battery recycling" class="cmsms_open_link">
<span class="cmsms-icon-attach-6"></span>
</a>
</div>
</figure>
<header class="cmsms_slider_post_header entry-header">
<h3 class="cmsms_slider_post_title entry-title">
<a href="car-battery-recycling.php">Car battery recycling</a>
</h3>
</header>
<div class="cmsms_slider_post_content entry-content"></div>
<footer class="cmsms_slider_post_footer entry-meta">
<div class="cmsms_slider_post_meta_info">
<abbr class="published cmsms_slider_post_date cmsms-icon-calendar-8" title="March 10, 2016">March 10, 2016</abbr>
<abbr class="dn date updated" title="March 10, 2016">March 10, 2016</abbr>
</div>
</footer>	
</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->
</div>
<div>
<!--_________________________ Start Standard Article _________________________ -->
<article class="post">
<span class="cmsms_slider_post_format_img"></span>
<div class="cmsms_slider_post_cont">
<figure class="cmsms_img_rollover_wrap preloader">
<img width="580" height="460" src="img/recycled-platinum.png" class="full-width" alt="Recycled Platinum" title="Recycled Platinum" />
<div class="cmsms_img_rollover">
<a href="img/recycled-platinum.png" data-rel="ilightbox[169_553e49e82591d]" title="Recycled Platinum" class="cmsms_image_link">
<span class="cmsms-icon-search-7"></span>
</a>
<a href="recycled-platinum.php" title="Recycled Platinum" class="cmsms_open_link">
<span class="cmsms-icon-attach-6"></span>
</a>
</div>
</figure>
<header class="cmsms_slider_post_header entry-header">
<h3 class="cmsms_slider_post_title entry-title">
<a href="recycled-platinum.php">Recycled Platinum</a>
</h3>
</header>
<div class="cmsms_slider_post_content entry-content"></div>
<footer class="cmsms_slider_post_footer entry-meta">
<div class="cmsms_slider_post_meta_info">
<abbr class="published cmsms_slider_post_date cmsms-icon-calendar-8" title="March 08, 2016">March 08, 2016</abbr>
<abbr class="dn date updated" title="March 08, 2016">March 08, 2016</abbr>
</div>
</footer>
</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->
</div>
<div>
<!--_________________________ Start Standard Article _________________________ -->
<article class="post">
<span class="cmsms_slider_post_format_img cmsms-icon-desktop-3"></span>
<div class="cmsms_slider_post_cont">
<figure class="cmsms_img_rollover_wrap preloader">
<img width="580" height="460" src="img/safe-for-water.png" class="full-width" alt="Safe for water?" title="Safe for water?" />
<div class="cmsms_img_rollover">
<a href="img/safe-for-water.png" data-rel="ilightbox[163_553e49e829368]" title="Safe for water?" class="cmsms_image_link">
<span class="cmsms-icon-search-7"></span>
</a>
<a href="safe-for-water.php" title="Safe for water?" class="cmsms_open_link">
<span class="cmsms-icon-attach-6"></span>
</a>
</div>
</figure>
<header class="cmsms_slider_post_header entry-header">
<h3 class="cmsms_slider_post_title entry-title">
<a href="safe-for-water.php">Safe for water?</a>
</h3>
</header>
<div class="cmsms_slider_post_content entry-content"></div>
<footer class="cmsms_slider_post_footer entry-meta">
<div class="cmsms_slider_post_meta_info">
<abbr class="published cmsms_slider_post_date cmsms-icon-calendar-8" title="March 02, 2016">March 02, 2016</abbr>
<abbr class="dn date updated" title="March 02, 2016">March 02, 2016</abbr>
</div>
</footer>
</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->
</div>
<div>
<!--_________________________ Start Standard Article _________________________ -->
<article class="post">
<span class="cmsms_slider_post_format_img cmsms-icon-desktop-3"></span>
<div class="cmsms_slider_post_cont">
<figure class="cmsms_img_rollover_wrap preloader">
<img width="580" height="460" src="img/fulmars-contaminated.png" class="full-width" alt="Fulmars Contaminated" title="Fulmars Contaminated" />
<div class="cmsms_img_rollover">
<a href="img/fulmars-contaminated.png" data-rel="ilightbox[2000_553e49e82c73e]" title="Fulmars Contaminated" class="cmsms_image_link">
<span class="cmsms-icon-search-7"></span>
</a>
<a href="fulmars-contaminated.html" title="Fulmars Contaminated" class="cmsms_open_link">
<span class="cmsms-icon-attach-6"></span>
</a>
</div>
</figure>
<header class="cmsms_slider_post_header entry-header">
<h3 class="cmsms_slider_post_title entry-title">
<a href="fulmars-contaminated.html">Fulmars Contaminated</a>
</h3>
</header>
<div class="cmsms_slider_post_content entry-content"></div>
<footer class="cmsms_slider_post_footer entry-meta">
<div class="cmsms_slider_post_meta_info">
<abbr class="published cmsms_slider_post_date cmsms-icon-calendar-8" title="February 17, 2016">February 17, 2016</abbr>
<abbr class="dn date updated" title="February 17, 2016">February 17, 2016</abbr>
</div>
</footer>
</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->
</div>
<div>
<!--_________________________ Start Standard Article _________________________ -->
<article class="post">
<span class="cmsms_slider_post_format_img cmsms-icon-desktop-3"></span>
<div class="cmsms_slider_post_cont">
<figure class="cmsms_img_rollover_wrap preloader">
<img width="580" height="460" src="img/tiny-red-crystals.png" class="full-width" alt="Tiny red crystals" title="Tiny red crystals" />
<div class="cmsms_img_rollover">
<a href="img/tiny-red-crystals.png" data-rel="ilightbox[2209_553e49e82fbed]" title="Tiny red crystals" class="cmsms_image_link">
<span class="cmsms-icon-search-7"></span>
</a>
<a href="tiny-red-crystals.html" title="Tiny red crystals" class="cmsms_open_link">
<span class="cmsms-icon-attach-6"></span>
</a>
</div>
</figure>
<header class="cmsms_slider_post_header entry-header">
<h3 class="cmsms_slider_post_title entry-title">
<a href="tiny-red-crystals.html">Tiny red crystals</a>
</h3>
</header>
<div class="cmsms_slider_post_content entry-content"></div>
<footer class="cmsms_slider_post_footer entry-meta">
<div class="cmsms_slider_post_meta_info">
<abbr class="published cmsms_slider_post_date cmsms-icon-calendar-8" title="February 16, 2016">February 16, 2016</abbr>
<abbr class="dn date updated" title="February 16, 2016">February 16, 2016</abbr>
</div>
</footer>
</div>
</article>

<!--_________________________ Finish Standard Article _________________________ -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


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
<div class="container">
        <div id="update_progress" class="modal hide fade in" style="display: none;">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Change Progress</h3>
            </div>
            <div class="modal-body">
                <form class="contact" name="contact" action="change_progress.php" method="post">
                    
                    <div class="form_info cmsms_input">
  <label for="contact_email_1">Progress<span class="color_2"> *</span></label>
  <div class="form_field_wrap">
  <input type="text" name="prog" id="prog" size="35"  required />

  </div>
  </div>
      <input type="hidden" name="bookId" id="bookId" value=""/>           
           
            
                <input class="btn" type="submit" value="Submit" id="submit">
                <a href="#" class="btn" data-dismiss="modal">Exit</a>
                </form>
                
              </div>
                <div class="modal-footer">
            </div>
        </div>
    </div>

</body>

</html>
