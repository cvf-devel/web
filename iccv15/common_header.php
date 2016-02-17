<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" 
	  content="text/html; charset=utf-8" />

<?php
    $page_map = array();
    $page_map["jobs"]       = array("title"=>" - Jobs","page"=>"jobs.php");
    $page_map["reg"]        = array("title"=>" - Registration","page"=>"registration.php");
    $page_map["financial"]  = array("title"=>" - Financial Assistance","page"=>"financial.php");
    $page_map["home"]       = array("title"=>"","page"=>"index.php");
    $page_map["submission"] = array("title"=>" - Submission Guidelines","page"=>"author_guidelines.php");
    $page_map["cfp"]        = array("title"=>" - Official Call for Papers","page"=>"author_guidelines.php");
    $page_map["author"]     = array("title"=>" - Author Guidelines","page"=>"author_guidelines.php");
    $page_map["reviewer"]   = array("title"=>" - Reviewer Guidelines","page"=>"reviewer_guidelines.php");
    $page_map["ac"]         = array("title"=>" - Area Chair Guidelines","page"=>"ac_guidelines.php");
    $page_map["sponsor"]    = array("title"=>" - Sponsorship and Exhibitor Information","page"=>"sponsor_exhibitor_info.php");
    $page_map["workshops"]  = array("title"=>" - Workshops","page"=>"workshops.php");
    $page_map["dates"]      = array("title"=>" - Important Dates","page"=>"dates.php");
    $page_map["people"]     = array("title"=>" - People","page"=>"people.php");
    $page_map["tutorials"]  = array("title"=>" - Tutorials","page"=>"tutorials.php");
    $page_map["program"]  = array("title"=>" - Program","page"=>"program.php");
    $page_map["plenary"]      = array("title"=>" - Plenary Speaker","page"=>"plenary.php");
    $page_map["presenter"]  = array("title"=>" - Presenter Instructions","page"=>"presenter_instructions.php");
    $page_map["video_spotlights"]  = array("title"=>" - Video Spotlights","page"=>"video_spotlights.php");
    $page_map["camera_ready"]  = array("title"=>" - Camera-ready Instructions","page"=>"camera_ready_instructions.php");
    $page_map["video_spotlight"]  = array("title"=>" - Video Spotlight Instructions","page"=>"video_spotlight_instructions.php");
    $page_map["attending"]      = array("title"=>" - Attending","page"=>"attending.php");
    $page_map["venue"]      = array("title"=>" - Conference Venue","page"=>"attending.php#venue");
    $page_map["awards"]      = array("title"=>" - Awards","page"=>"awards.php");
    $page_map["hotels"]      = array("title"=>" - Conference Venue","page"=>"attending.php#hotels");
    $page_map["columbus"]        = array("title"=>" - Things to do in Columbus","page"=>"columbus.php");
    $page_map["travel"]  = array("title"=>" - Travel / Transportation","page"=>"attending.php#travel");
    $page_map["tourist"]  = array("title"=>" - Tourist Info","page"=>"attending.php#tourist");
    $page_map["doctoral"]  = array("title"=>" - Doctoral Consortium","page"=>"doctoral_consortium.php");
    $page_map["accepted_papers"]  = array("title"=>" - Accepted Papers","page"=>"accepted_papers.php");
    $page_map["demos"] = array("title"=>" - Demos","page"=>"demos.php");

    $page_data  = $page_map[$which_page];
    $page_title = $page_data["title"];
    echo "        <title>ICCV 2015 Webpage$page_title</title>";

function li_id($page_list)
{
    global $which_page;
    if ($page_list[$which_page] == 1)
        echo "<li id=\"currentpage\">";
    else
        echo "<li>";
}
?>
		<link type="text/css" href="../css/smoothness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>

                <script type="text/javascript" src="iccvmenu.js"></script>
                <link type="text/css" href="iccvmenu15.css" rel="stylesheet">

		<style type="text/css">
			/*demo page css*/
			/*body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}*/
			body{ font: 70% "Trebuchet MS", sans-serif; background: #0069AA; }
			.demoHeaders { margin-top: 2em; }
                        #tabs-people li { position: relative; top:-5px; left:-10px;}
			.iccvpagewidth {max-width: 1024px; min-width: 400px;}
			.iccvpageheight {min-height: 600px;}
                        #logo { width: 565px; height: 220px; margin: 0 auto; position: absolute; bottom: -1px; right: 0px;
                             background: url(images/iccv2015_logo_200h_final.png); text-indent: -9999px; z-index: 80; }

                        #main-page  {margin:0; margin-left: auto; margin-right: auto; width:1024px; position:relative; min-height:600px; border: 1px solid black; background: #FFFFFF; }
                        /*#main-page h1 { width: 170px; height: 400px; margin: 0 auto; position: absolute; bottom: 0px; right: -10px;
                             background: url(images/Towers.png); text-indent: -9999px; z-index: 100; }*/
                        #main-page h1 { width: 170px; height: 400px; margin: 0 auto; position: absolute; bottom: 0px; right: -10px;
                             text-indent: -9999px; z-index: 100; }

                        #menubox    {margin:0; margin-left: auto; margin-right: auto;position:absolute;top:-11px}

                        #topspacer {
                            margin-top: 30px;
                            position: relative;
                        }
                        #slideshow {
                            margin-left: auto;
                            margin-right: auto;
                            width: 1105px;
                            height: 200px;
                            position: relative;
                        }
                        .iccvtable { border: 1px solid rgb(180,180,180); padding:5px; border-spacing: 0px; border-collapse:collapse; }
                        .iccvbox { border: 1px solid rgb(180,180,180); padding:5px; border-spacing: 0px; border-collapse:collapse; }
                        .iccvtableline { border: 1px }
                        .iccvtableheader { background-color: rgb(255,200,192); }
                        .larger-table { margin-left:auto; margin-right:auto; position:relative; font-size:125%; }
                        div#slideshow ul#slides {
                            list-style: none;
                            left: -1px;
                            width: 984px;
                            height: 202px;
                            border: 0px solid black;
                        }
                        div#slideshow ul#slides li {
                            margin: 0 0 20px 0;
                        }
                        .boldred { color:red; font-weight: bold }
                        .institution { font-style: italic }
                        #main-content {margin:25px; font-size:125%; width:984px;}
                        .iccvpageheader   { font-size:150%; font-weight: bold}
                        .iccvsectionheader   { font-size:125%; font-weight: bold; text-decoration:underline}
                        .iccvparagraphheader { font-weight: bold }
                        .iccvparagraphsmall { font-size: 75% }
                        .iccvbigtext { font-size:150%; font-weight: bold; color:red}
                        .faq_q {text-decoration:underline}
                        .faq_a {}

                        .date_past {text-decoration:line-through} 

                        body a:link    {color:#3333ff}
                        body a:visited {color:#3333ff}
                        body a:hover   {color:#3333ff;background-color:#eeeeff}
                        body a:active  {color:#3333ff}

		</style>
		<script type="text/javascript">
/*
                        var MAX_HEIGHT = 600;
                        var MAX_WIDTH  = 500;

                        jQuery.fn.fixSize = function() {

                          //var w = $("#page-tabs").width();
                          //if (w > MAX_WIDTH)
                            //$("#page-tabs").width(MAX_WIDTH);

                          //alert("called func");
                          var h = $("#tabs-home").height();
                          if ( h < MAX_HEIGHT )
                            $("#tabs-home").height(MAX_HEIGHT);

                          h = $("#tabs-people").height();
                          if ( h < MAX_HEIGHT )
                            $("#tabs-people").height(MAX_HEIGHT);

                          h = $("#tabs-dates").height();
                          if ( h < MAX_HEIGHT )
                            $("#tabs-dates").height(MAX_HEIGHT);

                          h = $("#tabs-venue").height();
                          if ( h < MAX_HEIGHT )
                            $("#tabs-venue").height(MAX_HEIGHT);
                        }
*/
			$(document).ready(function(){

				// Tabs
				//$('#page-tabs').tabs();
				//$('#page-tabs').tabs('select','#tabs-people');

				//$('#page-tabs').tabs();

				$('ul#slides').cycle({
                                    fx: 'fade', pause: 1, prev: '#prev', next: '#next'
                                });

                            $('#iccvmenubar > li').bind('mouseover', iccvmenu_open)
                            $('#iccvmenubar > li').bind('mouseout', iccvmenu_timer)
                            $('#currentpage > a').css('color', 'black')
                            $('#currentpage > a').css('border','1px solid black')
                            $('#currentpage > a').css('border-bottom','none')
                            $('#currentpage > a').css('background','#FFFFFF')


                            $('#iccvmenubar').height( $('#currentpage').height() -1 )
                            $('#main-content').css('margin-top', $('#currentpage').height() +25 )

				//$('body').css('overflow','hidden');

                                //var h = $("#tabs-home").height();
                                //if ( h < HEIGHT )
                                  //$("#tabs-home").height(HEIGHT);
                                //$(window).resize(function(){
                                  //var w = $(window).width();
                                  //var h = $(window).height();
                                  //$(window).fixSize();
                                  //alert("You resized the window to "+w+"x"+h+"!");
                                //});
			});
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
	<body<?php if ($onpageload != "") { echo " onload=\"$onpageload\""; }?>>

		<!-- Tabs -->
                        <div id="topspacer"></div>
                        <div id="slideshow">
                                <div id="logo"></div>
                                <ul id="slides">
                                        <li><img src="images/slideshow/slideshow-01.png" alt="Title"/></li>
                                       <!-- same problem as in cvpr2013 with the slides not showing up correctly
					 <li><img src="images/slideshow/slideshow-02.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-03.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-04.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-05.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-06.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-07.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-08.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-09.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-10.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-11.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-12.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-13.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-14.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-15.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-16b.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-17.png" alt="Title"/></li>
                                        <li><img src="images/slideshow/slideshow-18.png" alt="Title"/></li> -->
                                </ul>
                        </div>
		<!--<div class="iccvpagewidth" id="page-tabs">
			<ul>
				<li><a href="#tabs-home">Home</a></li>
				<li><a href="#tabs-people">People</a></li>
				<li><a href="#tabs-dates">Important Dates</a></li>
				<li><a href="#tabs-submission">Submission</a></li>
				<li><a href="#tabs-workshops">Workshops</a></li>
				<li><a href="#tabs-tutorials">Tutorials</a></li>
				<li><a href="#tabs-venue">Venue</a></li>
			</ul>-->
		<div class="iccvpagewidth" id="main-page">
		<div class="iccvpagewidth" id="menubox">

                        <ul id="iccvmenubar" align="bottom">
  <?php li_id(array("home"=>1)); ?><a href=".">Home</a></li>
  <?php li_id(array("people"=>1)); ?><a href="people.php">People</a></li>
  <?php li_id(array("dates"=>1)); ?><a href="dates.php">Dates</a></li>

			  <?php li_id(array("submission"=>1,"author"=>1,"cfp"=>1,"reviewer"=>1,"ac"=>1,"camera_ready"=>1,"video_spotlight"=>1)); ?><a href="author_guidelines.php">[Submission]</a>
			  <ul>
			    <?php li_id(array("author"=>1,"cfp"=>1)); ?><a href="author_guidelines.php">Author Guidelines</a></li>
			    <?php li_id(array("reviewer"=>1)); ?><a href="reviewer_guidelines.php">Reviewer Guidelines</a></li>
      <?php li_id(array("camera_ready"=>1)); ?><a href="camera_ready_instructions.php">Camera-ready Instructions</a></li>			    
      <?php li_id(array("video_spotlight"=>1)); ?><a href="video_spotlight_instructions.php">Video Spotlight Instructions</a></li>

<!-- 
			    <?php li_id(array("ac"=>1)); ?><a href="ac_guidelines.php">Area Chair Guidelines</a></li>
			    -->
			  </ul>
	</li>

	<?php li_id(array("presenter"=>1,"plenary"=>1,"workshops"=>1,"tutorials"=>1,"demos"=>1,"awards"=>1,"doctoral"=>1,"program"=>1)); ?><a href="program.php">[Program]</a>
	  <ul>
        <?php li_id(array("program"=>1)); ?><a href="program.php">Main Conference Program</a></li>
            <li><a href="https://www.youtube.com/playlist?list=PLyYfOWvWYQCGghz38xEroF1IozxzNiWv2">Video Spotlights</a></li>
        <?php li_id(array("presenter"=>1)); ?><a href="presenter_instructions.php">Presenter Instructions</a></li>
        <?php li_id(array("plenary"=>1)); ?><a href="plenary.php">Plenary Speaker</a></li>
        <?php li_id(array("workshops"=>1)); ?><a href="workshops.php">Workshops</a></li>
        <?php li_id(array("tutorials"=>1)); ?><a href="tutorials.php">Tutorials</a></li>
        <?php li_id(array("doctoral"=>1)); ?><a href="doctoral_consortium.php">Doctoral Consortium</a></li>
        <?php li_id(array("demos"=>1)); ?><a href="demos.php">Demos</a></li>
        <?php li_id(array("awards"=>1)); ?><a href="awards.php">Awards</a></li>
</ul>
	</li>

        <?php li_id(array("sponsor"=>1)); ?><a href="sponsor_exhibitor_info.php">[Corporations]</a>
            <ul>
                <li><a href="sponsor_exhibitor_info.php#sponsor_info">Sponsorship Information</a></li>
                <li><a href="sponsor_exhibitor_info.php#exhibitor_info">Exhibitor Information</a></li>
            </ul>
        </li>

        <?php li_id(array("attending"=>1,"reg"=>1,"financial"=>1)); ?><a href="attending.php">[Attending]</a>
        <ul>
	  <?php li_id(array("attending_hotels"=>1)); ?><a href="attending.php#hotels">Hotels</a></li>
	  <?php li_id(array("attending_tourist"=>1)); ?><a href="attending.php#tourist_information">Tourist Information</a></li>
          <?php li_id(array("reg"=>1)); ?><a href="registration.php">Registration</a></li>
	  <li><a href="registration.php#letters">Visa Letters</a></li>
	  <?php li_id(array("financial"=>1)); ?><a href="financial.php">Financial Assistance</a></li>
        </ul>
  </li>
<?php li_id(array("jobs"=>1)); ?><a href="jobs.php">Jobs</a></li>
</ul>
		</div>


<div id="main-content">

