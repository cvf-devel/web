<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>CVPR 2013 - Jobs (<?php echo "$which_page";?>)</title>
		<!--<link type="text/css" href="../css/cvpr13-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet" />-->
		<link type="text/css" href="../css/smoothness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>

                <script type="text/javascript" src="cvprmenu.js"></script>
                <link type="text/css" href="cvprmenu.css" rel="stylesheet">

		<style type="text/css">
			/*demo page css*/
			/*body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}*/
			body{ font: 70% "Trebuchet MS", sans-serif; }
			.demoHeaders { margin-top: 2em; }
                        #tabs-people li { position: relative; top:-5px; left:-10px;}
			.cvprpagewidth {max-width: 800px; min-width: 400px;}
			.cvprpageheight {min-height: 600px;}
                        #logo { width: 301px; height: 150px; margin: 0 auto; position: absolute; bottom: -7px; right: -45px;
                             background: url(images/Logo4Banner.png); text-indent: -9999px; z-index: 80; }

                        #main-page  {margin:0; margin-left: auto; margin-right: auto; width:800px; position:relative; min-height:600px; border: 1px solid black; }
                        #main-page h1 { width: 170px; height: 400px; margin: 0 auto; position: absolute; bottom: 0px; right: -10px;
                             background: url(images/Towers.png); text-indent: -9999px; z-index: 100; }

                        #menubox    {margin:0; margin-left: auto; margin-right: auto;position:absolute;top:-11px}

                        #topspacer {
                            margin-top: 30px;
                            position: relative;
                        }
                        #slideshow {
                            margin-left: auto;
                            margin-right: auto;
                            width: 800px;
                            height: 125px;
                            position: relative;
                        }
                        .cvprtable { border: 1px solid rgb(180,180,180); padding:5px; border-spacing: 0px; border-collapse:collapse; }
                        .cvprtableheader { background-color: rgb(220,220,220); }
                        div#slideshow ul#slides {
                            list-style: none;
                        }
                        div#slideshow ul#slides li {
                            margin: 0 0 20px 0;
                        }
                        .institution { font-style: italic }
                        #main-content {margin:25px; font-size:125%; width:750px;}
                        .larger-table { margin-left:auto; margin-right:auto; position:relative; font-size:125%; }

                        .cvprpageheader   { font-size:150%; font-weight: bold}
                        .cvprsectionheader   { font-size:125%; font-weight: bold; text-decoration:underline}
                        .cvprparagraphheader { font-weight: bold }
                        .faq_q {text-decoration:underline}
                        .faq_a {}

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

                            $('#cvprmenubar > li').bind('mouseover', cvprmenu_open)
                            $('#cvprmenubar > li').bind('mouseout', cvprmenu_timer)
                            $('#currentpage > a').css('color', 'black')
                            $('#currentpage > a').css('border','1px solid black')
                            $('#currentpage > a').css('border-bottom','none')
                            $('#currentpage > a').css('background','#FFFFFF')


                            $('#cvprmenubar').height( $('#currentpage').height() -1 )
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
	</head>
	<body onload="foo">

		<!-- Tabs -->
                        <div id="topspacer"></div>
                        <div id="slideshow">
                                <div id="logo"></div>
                                <ul id="slides">
                                        <li><img src="images/trees.png" alt="Title"/></li>
                                        <li><img src="images/mt_hood.png" alt="Title"/></li>
                                        <li><img src="images/rose.png" alt="Title"/></li>
                                        <li><img src="images/roof.png" alt="Title"/></li>
                                        <li><img src="images/books.png" alt="Title"/></li>
                                </ul>
                        </div>
		<!--<div class="cvprpagewidth" id="page-tabs">
			<ul>
				<li><a href="#tabs-home">Home</a></li>
				<li><a href="#tabs-people">People</a></li>
				<li><a href="#tabs-dates">Important Dates</a></li>
				<li><a href="#tabs-submission">Submission</a></li>
				<li><a href="#tabs-workshops">Workshops</a></li>
				<li><a href="#tabs-tutorials">Tutorials</a></li>
				<li><a href="#tabs-venue">Venue</a></li>
			</ul>-->
		<div class="cvprpagewidth" id="main-page">
		<div class="cvprpagewidth" id="menubox">

                        <ul id="cvprmenubar" align="bottom">
  <li><a href="home.html">Home</a></li>
  <li><a href="people.html">People</a></li>
  <li><a href="dates.html">Important Dates</a></li>
  <li><a href="submission.html">Submission</a>
    <ul>
      <li><a href="author_guidelines.html">Author Guidelines</a></li>
      <li><a href="reviewer_guidelines.html">Reviewer Guidelines</a></li>
      <li><a href="ac_guidelines.html">Area Chair Guidelines</a></li>
    </ul>
  </li>
  <li><a href="workshops.html">Workshops</a></li>
  <li><a href="tutorials.html">Tutorials</a></li>
  <li><a href="sponsor_exhibitor_info.html">Corporations</a>
    <ul>
      <li><a href="sponsor_exhibitor_info.html#sponsor_info">Sponsorship Information</a></li>
      <li><a href="sponsor_exhibitor_info.html#exhibitor_info">Exhibitor Information</a></li>
    </ul>
  </li>
  <li><a href="venue.html">Venue</a></li>
  <li><a href="registration.html">Registration</a></li>
  <li id="currentpage"><a href="jobs.php">Jobs</a></li>
</ul>
		</div>


<div id="main-content">

<table border="0" width="100%">
<tr><td>
