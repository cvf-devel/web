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
    $page_map["author"]     = array("title"=>" - Author Guidelines","page"=>"author_guidelines.php");
    $page_map["reviewer"]   = array("title"=>" - Reviewer Guidelines","page"=>"reviewer_guidelines.php");
    $page_map["ac"]         = array("title"=>" - Area Chair Guidelines","page"=>"ac_guidelines.php");
$page_map["sponsor"]    = array("title"=>" - Sponsorship and Exhibitor Information","page"=>"sponsor_exhibitor_info.php");
$page_map["corporate_events"] = array("title"=>" - Corporate Events and Open Houses","page"=>"corporate_events.php");
    $page_map["workshops"]  = array("title"=>" - Workshops","page"=>"workshops.php");
    $page_map["dates"]      = array("title"=>" - Important Dates","page"=>"dates.php");
    $page_map["people"]     = array("title"=>" - People","page"=>"people.php");
    $page_map["tutorials"]  = array("title"=>" - Tutorials","page"=>"tutorials.php");
    $page_map["program"]  = array("title"=>" - Program","page"=>"program.php");
    $page_map["abstracts"]  = array("title"=>" - Extended Abstracts","page"=>"extended.php");
    $page_map["presenter"]  = array("title"=>" - Presenter Instructions","page"=>"presenter_instructions.php");
    $page_map["video_spotlights"]  = array("title"=>" - Video Spotlights","page"=>"video_spotlights.php");
    $page_map["camera_ready"]  = array("title"=>" - Camera-ready Instructions","page"=>"camera_ready_instructions.php");
    $page_map["extended_abstracts"]  = array("title"=>" - Extended Abstract Instructions","page"=>"extended_abstracts.php");
    $page_map["attending"]      = array("title"=>" - Attending","page"=>"attending.php");
    $page_map["venue"]      = array("title"=>" - Conference Venue","page"=>"attending.php#venue");
    $page_map["awards"]      = array("title"=>" - Awards","page"=>"awards.php");
    $page_map["plenary"]      = array("title"=>" - Plenary Speakers","page"=>"plenary.php");
    $page_map["hotels"]      = array("title"=>" - Conference Venue","page"=>"attending.php#hotels");
    $page_map["columbus"]        = array("title"=>" - Things to do in Columbus","page"=>"columbus.php");
    $page_map["travel"]  = array("title"=>" - Travel / Transportation","page"=>"attending.php#travel");
    $page_map["tourist"]  = array("title"=>" - Tourist Info","page"=>"attending.php#tourist");
    $page_map["doctoral"]  = array("title"=>" - Doctoral Consortium","page"=>"doctoral_consortium.php");
    $page_map["accepted_papers"]  = array("title"=>" - Accepted Papers","page"=>"accepted_papers.php");
    $page_map["demos"] = array("title"=>" - Demos","page"=>"demos.php");

    $page_data  = $page_map[$which_page];
    $page_title = $page_data["title"];
    echo "        <title>CVPR 2015 Webpage$page_title</title>";

function li_id($page_list)
{
    global $which_page;
    if ($page_list[$which_page] == 1)
        echo "<li id=\"currentpage\">";
    else
        echo "<li>";
}
?>

    <link type="text/css" href="jquery-ui-1.8.21.custom.css" 
	  rel="stylesheet" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" 
	    src="jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="jquery.cycle.all.js"></script>

    <script type="text/javascript" src="cvprmenu.js"></script>
    <link type="text/css" href="cvprmenu14g.css" rel="stylesheet" />
    <link type="text/css" href="cvpr2015.css" rel="stylesheet" />

    <style type="text/css">
      .chair {
        text-decoration: none;
        font-weight:     bold;
        color:           #000000;
      }
      .chair_heading {
        padding-top:    20px;
        padding-bottom: 5px;
      }
      .chair_table td {
      vertical-align: top;
      }

      .cvprpageheader   { font-size:150%; font-weight: bold}
      .cvprsectionheader   { font-size:125%; font-weight: bold; text-decoration:underline}
      .cvprparagraphheader { font-weight: bold }

      .date_heading {
        text-decoration: underline;
        font-weight:     bold;
        padding-top:     20px;
        padding-bottom:  5px;
      }

      .body_ul li {
        margin: 0 0 5px 0;
      }

      .no_top_margin {
        margin-top: 0px;
      }
    </style>

    <script type="text/javascript">
      $(document).ready(function(){
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
      $('#main-content').css('margin-top', 
        $('#currentpage').height() +25 )
      });

      function toggle_photo_credits() 
      {
        var div = document.getElementById("photo_credits");
        if (div.style.display == "block") 
        {
          div.style.display = "none";
        }
        else 
        {
          div.style.display = "block";
        }
      } 
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

    <div id="center_col">

      <div id="top_logo"></div>
      <div id="slideshow">
	<ul id="slides">
          <!-- <li><a href="#photo_footer"><img src="images/b01_dawn_back_bay.jpg" alt="Title" height="185" width="800" /></a></li> -->
          <!-- <li><a href="#photo_footer"><img src="images/b02_harbor_night.jpg" alt="Title" height="185" width="800" /></a></li> -->
          <!-- <li><a href="#photo_footer"><img src="images/b05_geese.jpg" alt="Title" height="185" width="800" /></a></li> -->
          <li><a href="#photo_footer"><img src="images/b04_ducklings.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b06_boston_skyline_pan.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b07_paul_revere_mall.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b03_public_gardens.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b08_longfellow_bridge.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b09_waterfront.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b11_kendall_square.jpg" alt="Title" height="185" width="800" /></a></li>
          <li><a href="#photo_footer"><img src="images/b10_whale_breach.jpg" alt="Title" height="185" width="800" /></a></li>
	</ul>
      </div>

      <div id="menubox">

        <ul id="cvprmenubar" align="bottom">

  <?php li_id(array("home"=>1)); ?><a href=".">Home</a></li>
  <?php li_id(array("people"=>1)); ?><a href="people.php">People</a></li>
  <?php li_id(array("dates"=>1)); ?><a href="dates.php">Dates</a></li>
  <?php li_id(array("submission"=>1,"author"=>1,"reviewer"=>1,"ac"=>1,"camera_ready"=>1,"extended_abstracts"=>1)); ?><a href="author_guidelines.php">[Submission]</a>
    <ul>
      <?php li_id(array("author"=>1)); ?><a href="author_guidelines.php">Author Guidelines</a></li>
      <?php li_id(array("reviewer"=>1)); ?><a href="reviewer_guidelines.php">Reviewer Guidelines</a></li>
      <?php li_id(array("camera_ready"=>1)); ?><a href="camera_ready_instructions.php">Camera-ready Instructions</a></li>
      <?php li_id(array("extended_abstracts"=>1)); ?><a href="extended_abstracts.php">Extended Abstract Instructions</a></li>
      <!--<?php li_id(array("ac"=>1)); ?><a href="ac_guidelines.php">Area Chair Guidelines</a></li>-->
    </ul>
  </li>
  <?php li_id(array("awards"=>1,"workshops"=>1,"tutorials"=>1,"demos"=>1,"doctoral"=>1,"program"=>1,"plenary"=>1,"video_spotlights"=>1,"presenter"=>1)); ?><a href="program.php">[Program]</a>
  <ul>
    <?php li_id(array("program"=>1)); ?><a href="program.php">Main Conference</a></li>
    <li><a href="files/CVPR_2015_Pocket_Guide_Final.pdf">Pocket Guide</a></li>
    <li><a href="files/CVPR_2015_Summary.pdf">At-a-Glance Summary</a></li>
    <li><a href="files/PosterMap.jpg">Poster Layout Map</a></li>
    <?php li_id(array("abstracts"=>1)); ?><a href="extended.php">Extended Abstracts</a></li>
    <?php li_id(array("plenary"=>1)); ?><a href="plenary.php">Plenary Speakers</a></li>
    <?php li_id(array("tutorials"=>1)); ?><a href="tutorials.php">Tutorials</a></li>
    <?php li_id(array("workshops"=>1)); ?><a href="workshops.php">Workshops</a></li>
    <?php li_id(array("demos"=>1)); ?><a href="demos.php">Demos</a></li>
    <li><a href="sponsor_exhibitor_info.php#cvpr_exhibitors">Exhibitors</a></li>
    <?php li_id(array("doctoral"=>1)); ?><a href="doctoral_consortium.php">Doctoral Consortium</a></li>
    
<?php li_id(array("awards"=>1)); ?><a href="awards.php">Awards</a></li>
    <?php li_id(array("presenter"=>1)); ?><a href="presenter_instructions.php">Presenter Instructions</a></li>
  </ul>
  </li>
  <?php li_id(array("sponsor"=>1,"corporate_events"=>1)); ?><a href="sponsor_exhibitor_info.php">[Corporations]</a>
    <ul>
      <li><a href="sponsor_exhibitor_info.php#sponsorship">Sponsorship Information</a></li>
      <li><a href="sponsor_exhibitor_info.php#exhibitor">Exhibitor Information</a></li>
      <li><a href="corporate_events.php">Events and Open Houses</a></li>
    </ul>
  </li>
  <?php li_id(array("attending"=>1,"financial"=>1)); ?><a href="attending.php">[Attending]</a>
  <ul>
    <?php li_id(array("reg"=>1)); ?><a href="registration.php">Registration</a></li>
<?php li_id(array("attending"=>1)); ?><a href="attending.php" title="Venue, Hotels, Dorms, Dining, Tourism, Letters of Invitation">General Info</a></li>
    <li><a href="http://www.signatureboston.com/uploadDocs/1/HYNES-FloorPlans_040615-32.pdf">Hynes Conv. Center Maps</a></li>
    <?php li_id(array("financial"=>1)); ?><a href="financial.php">Financial Assistance</a></li>
  </ul>
  </li>
  <?php li_id(array("jobs"=>1)); ?><a href="jobs.php">Jobs</a></li>
	  <!--<a href="submission.php">[Submission]</a>
	      <ul>
		<a href="author_guidelines.php">Author Guidelines</a></li>
<a href="reviewer_guidelines.php">Reviewer Guidelines</a></li>
<a href="ac_guidelines.php">Area Chair Guidelines</a></li>
</ul>
</li>-->
	  <!--<a href="program.php">Program</a></li>-->
	  <!--<li><a href="workshops.php">Workshops</a></li>-->
	  <!--<li><a href="tutorials.php">Tutorials</a></li>-->
	  <!--<a href="sponsor_exhibitor_info.php">[Corporations]</a>
	      <ul>
		<li><a href="sponsor_exhibitor_info.php#sponsor_info">Sponsorship Information</a></li>
		<li><a href="sponsor_exhibitor_info.php#exhibitor_info">Exhibitor Information</a></li>
	      </ul>
</li>-->
	  <!--<li><a href="attending.php">[Attending]</a>
	    <ul>
	      <a href="registration.php">Registration</a></li>
	      <li><a href="attending.php#venue">Conference Venue</a></li>
	      <li><a href="attending.php#hotels">Hotels</a></li>
	      <a href="attending.php#travel">Travel / Transportation</a></li>
	      <a href="attending.php#tourist">Tourist Information</a></li>
	    </ul>
	  </li>
	  <li><a href="jobs.php">Jobs</a></li> -->
	</ul>
      </div>

      <div id="main_content">
