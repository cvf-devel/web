<!DOCTYPE html>
<html>
    <head>



<?php

    function iccv_hide_email($eml)
    {
        $spliteml = str_split($eml,3);
        $noscript = implode(" ", $spliteml);
        $jstring  = "\"".implode("\"+\"", $spliteml)."\"";
        $hidden_script = "document.write(\"<a href=\\\"mailto:\"+$jstring+\"\\\">\"+$jstring+\"</a>\");";
        print "<script type=\"text/javascript\">$hidden_script</script><noscript>\"$noscript\" (remove all spaces)</noscript>";
    }



    $page_map = array();

    $page_map["home"]       = array("title"=>"Home","page"=>"index.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297747671.jpg","code"=>"284396004966234713");

    $page_map["people"]     = array("title"=>"People","page"=>"people.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297747000.jpg","code"=>"186858308825634250");
    $page_map["ac_profiles"]     = array("title"=>"Area Chair Profiles","page"=>"ac_profiles.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297747000.jpg","code"=>"186858308825634250");

    $page_map["attending_menu"]     = array("title"=>"Attending","page"=>"","banner"=>"uploads/6/3/7/8/6378632/header_images/1297666142.jpg","code"=>"code-attending-menu");
    $page_map["venue"]     = array("title"=>"Venue","page"=>"venue.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297666142.jpg","code"=>"code-venue");
    $page_map["transport"]     = array("title"=>"Transportation","page"=>"venue.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297666142.jpg","code"=>"code-transport");

    $page_map["registration"]     = array("title"=>"Registration","page"=>"registration_accommodation.php","banner"=>"","code"=>"code-reg");

    $page_map["accommodation"]     = array("title"=>"Accommodation","page"=>"registration_accommodation.php","banner"=>"","code"=>"code-accomm");

    //$page_map["transportation"]     = array("title"=>"Transportation","page"=>"transportation.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297667111.jpg","code"=>"593287975684757719");

    //$page_map["venue"]     = array("title"=>"Conference Venue","page"=>"conference-venue.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1297666142.jpg","code"=>"969148164870380082");

    $page_map["dates"]     = array("title"=>"Dates","page"=>"important-dates.php","banner"=>"uploads/6/3/7/8/6378632/header_images/1348476298.jpg","code"=>"315895922697360992");

    $page_map["tutorials"]  = array("title"=>"Tutorials","page"=>"tutorials.php","banner"=>"","code"=>"tutorials-code");
    
    $page_map["keynote"]  = array("title"=>"Keynote","page"=>"keynote.php","banner"=>"","code"=>"keynote-code");

    $page_map["workshops"]     = array("title"=>"Workshops","page"=>"workshops.php","banner"=>"","code"=>"991608874369504599");

	//$page_map["posters"]     = array("title"=>"Posters","page"=>"posters.php","banner"=>"","code"=>"posters-code");

    //#$page_map["decisions"]     = array("title"=>"Accepted Papers","page"=>"decisions.php","banner"=>"","code"=>"decisions-code");
    $page_map["program_menu"]     = array("title"=>"Program","page"=>"","banner"=>"","code"=>"program-menu-code");
    $page_map["final_program"]     = array("title"=>"Program","page"=>"program.php","banner"=>"","code"=>"final-program-code");
    //$page_map["program"]     = array("title"=>"Preliminary Program","page"=>"decisions.php","banner"=>"","code"=>"program-code");


    #$page_map["submission"]     = array("title"=>"Submission","page"=>"submission.php","banner"=>"","code"=>"submission-code");
    $page_map["cfp"]            = array("title"=>"Official Call for Papers","page"=>"official_cfp.php","banner"=>"","code"=>"authors-code");

    $page_map["submission_menu"]     = array("title"=>"Submission","page"=>"","banner"=>"","code"=>"submission-menu-code");
    $page_map["author"]     = array("title"=>"For Authors","page"=>"author_guidelines.php","banner"=>"","code"=>"authors-code");

    $page_map["reviewer"]     = array("title"=>"For Reviewers","page"=>"reviewer_guidelines.php","banner"=>"","code"=>"reviewers-code");
	
$page_map["sponsors"]     = array("title"=>"Sponsors","page"=>"sponsor_info.php","banner"=>"","code"=>"sponsor-code");
$page_map["demos"]     = array("title"=>"Demos","page"=>"demo.php","banner"=>"","code"=>"demo-code");
$page_map["exhibitor"]     = array("title"=>"Exhibitors","page"=>"exhibitor_info.php","banner"=>"","code"=>"exhibitor-code");


    $page_map["jobs"]       = array("title"=>"Jobs","page"=>"jobs.php","banner"=>"","code"=>"jobs-code");
    //$page_map["reg"]        = array("title"=>"Registration","page"=>"registration.php","banner"=>"","code"=>"");
    $page_map["visa"]        = array("title"=>"VISA Details","page"=>"visa_details.php","banner"=>"","code"=>"visa-code");
	
	$page_map["awards"]     = array("title"=>"Awards","page"=>"awards.php","banner"=>"","code"=>"awards-code");
	$page_map["videos"]     = array("title"=>"Videos","page"=>"videos.php","banner"=>"","code"=>"videos-code");

	
    $page_data   = $page_map[$which_page];
    $page_title  = $page_data["title"];
    $page_banner = $page_data["banner"];
    $page_code   = $page_data["code"];
    echo "        <title>$page_title - iccv2013</title>";

function menuli_for_page($page_key,$issub)
{
    global $page_map;
    global $which_page;

    $code   = $page_map[$page_key]["code"];
    $link   = $page_map[$page_key]["page"];
    $menu   = $page_map[$page_key]["title"];

    if ($code == $page_map[$which_page]["code"])
        echo "<li id='active'>";
    else
        echo "<li id='pg$code'>";

    if ($issub)
        echo "<a href='$link' class='submenu'>$menu</a></li>\n";
    else
        echo "<a href='$link'>$menu</a></li>\n";
}

function submenu_for_page_start($page_key)
{
    global $page_map;
    global $which_page;

    $code   = $page_map[$page_key]["code"];
    $link   = $page_map[$page_key]["page"];
    $menu   = $page_map[$page_key]["title"];

    if ($code == $page_map[$which_page]["code"])
        echo "<li id='active'>";
    else
        echo "<li id='pg$code'>";
    echo "<a href='#' class='menuhead'>[ $menu ]</a>\n<ul>\n";
}
function submenu_for_page_end($page_key)
{
    global $page_map;
    $menu   = $page_map[$page_key]["title"];
    echo "</ul></li>  <!-- $menu -->\n";
}
?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel='stylesheet' type='text/css' href='http://cdn1.editmysite.com/editor/libraries/fancybox/fancybox.css?1360002006' />
<link rel='stylesheet' href='http://cdn1.editmysite.com/editor/images/common/common-v2.css?buildTime=1360002006' type='text/css' />
<link rel='stylesheet' type='text/css' href='files/main_style.css?1360074589' title='wsite-theme-css' />


<style type='text/css'>

.iccv-list ul { list-style: none; margin-left: 0; padding-left: 0; }
.iccv-list li { padding-left: 1em; text-indent: -1em; }
.iccv-list li:before { content: "+"; padding-right: 0px; }

.date_past {text-decoration:line-through}

.iccvtable { border: 1px solid rgb(180,180,180); padding:5px; border-spacing: 0px; border-collapse:collapse; }
.iccvtableline { border: 1px }
.iccvtableheader { background-color: rgb(220,220,220); text-align:center; }

.iccv-base { }
.iccv-base ul { display: block; unicode-bidi: embed; margin-left: 40px; margin: 1.12em 0 }
.iccv-base ol { display: block; unicode-bidi: embed; list-style-type: decimal; margin-left: 40px; margin: 1.12em 0 }
.iccv-base li { display: list-item}
.iccv-bold-red   { font-weight: bold; color:red }
.iccvpageheader   { font-size:150%; font-weight: bold}
.iccvsectionheader   { font-size:125%; font-weight: bold; text-decoration:underline}
.iccvparagraphheader { font-weight: bold }
.iccvbigtext { font-size:150%; font-weight: bold; color:red}
.faq_q {text-decoration:underline}
.faq_a {}

.wsite-elements div.paragraph, .wsite-elements p, .wsite-elements .product-block .product-title, .wsite-elements .product-description, .wsite-elements .wsite-form-field label, .wsite-elements .wsite-form-field label, #wsite-content div.paragraph, #wsite-content p, #wsite-content .product-block .product-title, #wsite-content .product-description, #wsite-content .wsite-form-field label, #wsite-content .wsite-form-field label, .blog-sidebar div.paragraph, .blog-sidebar p, .blog-sidebar .wsite-form-field label, .blog-sidebar .wsite-form-field label {}
#wsite-content div.paragraph, #wsite-content p, #wsite-content .product-block .product-title, #wsite-content .product-description, #wsite-content .wsite-form-field label, #wsite-content .wsite-form-field label, .blog-sidebar div.paragraph, .blog-sidebar p, .blog-sidebar .wsite-form-field label, .blog-sidebar .wsite-form-field label {}
.wsite-elements h2, .wsite-elements .product-long .product-title, .wsite-elements .product-large .product-title, .wsite-elements .product-small .product-title, #wsite-content h2, #wsite-content .product-long .product-title, #wsite-content .product-large .product-title, #wsite-content .product-small .product-title, .blog-sidebar h2 {}
#wsite-content h2, #wsite-content .product-long .product-title, #wsite-content .product-large .product-title, #wsite-content .product-small .product-title, .blog-sidebar h2 {}
#wsite-title {}
</style>
<?php
    echo "<style type='text/css'>";
    echo "    .wsite-header {";
    echo "        background-image: url($page_banner) !important;";
    echo "        background-position: 0 0 !important;";
    echo "    }";
    echo "</style>";
?>
<script type='text/javascript'><!--
var STATIC_BASE = 'http://cdn1.editmysite.com/';
var STYLE_PREFIX = 'wsite';
//-->
</script>

<script type="text/javascript" src="iccvmenu.js"></script>
<link type="text/css" href="iccvmenu.css" rel="stylesheet">

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type='text/javascript' src='http://cdn1.editmysite.com/editor/libraries/jquery_effects.js?1360002006'></script>
<script type='text/javascript' src='http://cdn1.editmysite.com/editor/libraries/jquery.animate.js?1360002006'></script>
<script type='text/javascript' src='http://cdn1.editmysite.com/editor/libraries/fancybox/fancybox.min.js?1360002006'></script>
<script type='text/javascript' src='http://cdn1.editmysite.com/editor/images/common/utilities-jq.js?1360002006'></script>
<script type='text/javascript' src='http://cdn1.editmysite.com/editor/libraries/flyout_menus_jq.js?1360002006'></script>
<script type="text/javascript">
jQuery(document).ready(function($){

                            jQuery('#iccvmenubar > li').bind('mouseover', iccvmenu_open)
                            jQuery('#iccvmenubar > li').bind('mouseout', iccvmenu_timer)
                            //$('#currentpage > a').css('color', 'black')
                            //$('#currentpage > a').css('border','1px solid black')
                            //$('#currentpage > a').css('border-bottom','none')
                            //$('#currentpage > a').css('background','#FFFFFF')

                            //$('#iccvmenubar').height( $('#currentpage').height() -1 )
                            //$('#main-content').css('margin-top', $('#currentpage').height() +25 )
			});
</script>
<script type='text/javascript'><!--
var IS_ARCHIVE=1;
(function(jQuery){
//function initFlyouts(){initPublishedFlyoutMenus([{"id":"284396004966234713","title":"Home","url":"index.html"},{"id":"186858308825634250","title":"People","url":"people.html"},{"id":"114964842936293003","title":"Accomodation","url":"accomodation.html"},{"id":"593287975684757719","title":"Transportation","url":"transportation.html"},{"id":"969148164870380082","title":"Conference Venue","url":"conference-venue.html"},{"id":"315895922697360992","title":"Dates","url":"important-dates.html"},{"id":"991608874369504599","title":"Calls","url":"calls.html"}],'186858308825634250',"<li class='wsite-nav-more'><a href='#'>more...<\/a><\/li>",'active',false)}
//if (jQuery) {
//if (jQuery.browser.msie) window.onload = initFlyouts;
//else jQuery(initFlyouts)
//}else{
//if (Prototype.Browser.IE) window.onload = initFlyouts;
//else document.observe('dom:loaded', initFlyouts);
//}
})(window._W && _W.jQuery)
//-->
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36106042-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>





<!--
    MENU AND IMAGE!!!
-->



<body class='wsite-theme-light tall-header-page wsite-page-people'>
<div id="wrapper">
        <table id="header">
                <tr>
                        <td id="logo"><span class='wsite-logo'><a href=''><span id="wsite-title">ICCV 2013 - Sydney, Australia</span></a></span></td>
                        <td id="header-right">
                                <table>
                                        <tr>
                                                <td class="phone-number"></td>
                                                <td class="social"><div style="text-align:left;"><div style="height:0px;overflow:hidden"></div>
<span class="wsite-social wsite-social-default"></span>
<div style="height:0px;overflow:hidden"></div></div></td>
                                                <td class="search"></td>
                                        </tr>
                                </table>
                        </td>
                </tr>
        </table>
        <div id="navigation">
<ul id="iccvmenubar">
<?php
    menuli_for_page('home',false);
    menuli_for_page('people',false);
    menuli_for_page('dates',false);
    submenu_for_page_start('submission_menu');
        menuli_for_page('author',true);
        menuli_for_page('reviewer',true);
    submenu_for_page_end('submission_menu');
    submenu_for_page_start('program_menu');
    	menuli_for_page('final_program',true);
        //menuli_for_page('program',true);
        menuli_for_page('keynote',true);
        menuli_for_page('workshops',true);
        menuli_for_page('tutorials',true);
        menuli_for_page('demos',true);
        menuli_for_page('exhibitor',true);
		//menuli_for_page('posters', true);
    submenu_for_page_end('program_menu');
	menuli_for_page('awards',false);
    submenu_for_page_start('attending_menu');
        menuli_for_page('registration',true);
        menuli_for_page('visa',true);
        menuli_for_page('accommodation',true);
        menuli_for_page('venue',true);
        menuli_for_page('transport',true);
    submenu_for_page_end('attending_menu');
    menuli_for_page('sponsors',false);
    menuli_for_page('jobs');
    menuli_for_page('videos');
    //menuli_for_page('accomodation');
    //menuli_for_page('transportation');
    //menuli_for_page('venue');
?>
</ul>

        </div>
<?php
    if ($page_banner != "")
    {
?>
        <div id="banner">
                <div class="wsite-header"></div>
        </div>
<?php
    }
?>
        <div id="content">
                <div id='wsite-content' class='wsite-elements wsite-not-footer'>





<!--
<div><div class="wsite-multicol"><div style='padding-right:1.2%'><div class='wsite-multicol-table-wrap' style='margin:0 -5px'>
<table class='wsite-multicol-table'>
<tbody class='wsite-multicol-tbody'>
<tr class='wsite-multicol-tr'>
<td class='wsite-multicol-col' style='width:49.5%;padding:0 5px'>

<div><div class="wsite-multicol"><div style='padding-right:1.2%'><div class='wsite-multicol-table-wrap' style='margin:0 -5px'>
<table class='wsite-multicol-table'>
<tbody class='wsite-multicol-tbody'>
<tr class='wsite-multicol-tr'>
-->



