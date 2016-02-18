<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" 
	  content="text/html; charset=iso-8859-1" />
    <title>CVPR 2015 Webpage - Tutorials</title>
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

<!-- TODO: add page view tracking -->

  </head>

  <body>

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
	  <li><a href="index.php">Home</a></li>
	  <li><a href="people.php">People</a></li>
	  <li><a href="dates.php">Important Dates</a></li>
	  <li><a href="author_guidelines.php">[Submission]</a>
	    <ul>
	      <li><a href="author_guidelines.php">Author Guidelines</a></li>
	      <li><a href="reviewer_guidelines.php">Reviewer Guidelines</a></li>
	    </ul>
	  </li>
	  <li id="currentpage"><a href="tutorials.php">[Program]</a>
	    <ul>
	      <li id="currentpage"><a href="tutorials.php">Tutorials</a></li>
	      <li><a href="workshops.php">Workshops</a></li>
	      <li><a href="demos.php">Demos</a></li>
	      <li><a href="doctoral_consortium.php">Doctoral Consortium</a></li>
	    </ul>
	  </li>
	  <li><a href="sponsor_exhibitor_info.php">[Corporations]</a>
	    <ul>
	      <li><a href="sponsor_exhibitor_info.php#sponsorship">Sponsorship Information</a></li>
	      <li><a href="sponsor_exhibitor_info.php#exhibitor">Exhibitor Information</a></li>
	    </ul>
	  </li>
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


CVPR 2015 Tutorials: Call for Proposals<br /><br />

Deadline: Friday, October 17, 2014<br />
Tutorials Chairs: Octavia Camps and Deva Ramanan<br />

<p>We would like to solicit proposals for short courses and tutorials to
be collocated with the IEEE Conference on Computer Vision and Pattern
Recognition (CVPR 2015). Short Courses and tutorials will take place
on June 7, at the same venue as the main conference.</p>

<p>CVPR short courses and tutorials aim to provide a comprehensive
overview of specific topics in computer vision. The topic should be of
sufficient relevance with respect to the state-of-the-art and the
course should be educational rather than a cursory survey of
techniques. The audience for CVPR short courses and tutorials consists
primarily of graduate students in computer vision. Although most
courses are half-day offerings, we also invite proposals for full-day
courses provided that the topic merits the additional time and can be
anticipated to generate sufficient interest from our community.</p>

Information about recent CVPR short courses and tutorial offerings:<br />
2014: <a href="http://www.pamitc.org/cvpr14/tutorials.php">http://www.pamitc.org/cvpr14/tutorials.php</a><br />
2013: <a href="http://www.pamitc.org/cvpr13/tutorials.php">http://www.pamitc.org/cvpr13/tutorials.php</a><br />
2012: <a href="https://sites.google.com/a/cvpr2012.org/home/program-details/tutorials">https://sites.google.com/a/cvpr2012.org/home/program-details/tutorials</a><br />
2011: <a href="http://cvpr2011.org/tutorials/">http://cvpr2011.org/tutorials/</a><br /><br />
<!--2010: <a href="http://cvl.umiacs.umd.edu/conferences/cvpr2010/tutorials/">http://cvl.umiacs.umd.edu/conferences/cvpr2010/tutorials/</a><br /><br />-->

Proposals should be submitted by email to both Chairs
(<a href="http://www.google.com/recaptcha/mailhide/d?k=01LmzbDZgvhKAZ_XvqnlLnxQ==&amp;c=Gqa95nELTvLQuAP4Kv4CZghGCqMf12MRtYbXkq8NiDk=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501LmzbDZgvhKAZ_XvqnlLnxQ\75\75\46c\75Gqa95nELTvLQuAP4Kv4CZghGCqMf12MRtYbXkq8NiDk\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">c...</a>@coe.neu.edu, <a href="http://www.google.com/recaptcha/mailhide/d?k=015P4UtZbX-yglk0KbKZ8Crg==&amp;c=FzEJiOUCswpsH2BuJ767LYvyLoR1DRPOUOCOsnVq-7c=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\075015P4UtZbX-yglk0KbKZ8Crg\75\75\46c\75FzEJiOUCswpsH2BuJ767LYvyLoR1DRPOUOCOsnVq-7c\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">d...</a>@ics.uci.edu) either in plain-text
or PDF format. Please include the following information:<br />
<ul>
<li>Short course/tutorial title.</li>
<li>Proposers' names, titles, affiliations, and primary contact email.</li>
<li>Short bio for each organizer.</li>
<li>Preference for half- or full-day event.</li>
<li>Course description that includes topics that will be covered, along with a brief outline and significant details.</li>
<li>Anticipated target audience as well as expected number of attendees.</li>
<li>Pointers to relevant publications by organizers and relevant related work.</li>
<li>Describe how this proposal relates to previous tutorials/short courses appearing at CVPR/ICCV/ECCV conferences in the previous three years.</li>
<li>Planned materials (if any) to be distributed to attendees.</li>
</ul>

Proposals will be reviewed by a selection committee and we expect to make
selections by December 12, 2014.


<br /><br /><br />

	<hr />
	<div id="photo_footer">
<a name="photo_footer"></a>
<a href="http://creativecommons.org/">
<img src="images/cc.png" alt="cc" height="16" width="16" /></a> licensed 
<a href="javascript:toggle_photo_credits();" onmouseover="toggle_photo_credits();">images of Boston</a><br />

<div id="photo_credits" style="display: none">

<table border="0">
<!--   <tr> -->
<!-- <td>Justin Jensen</td> -->
<!-- <td>:</td> -->
<!-- <td><a href="http://www.flickr.com/photos/justinjensen/5158606546/"> -->
<!-- Dawn on the Back Bay</a></td> -->
<!--   </tr> -->
<!--   <tr> -->
<!-- <td>Emmanuel Huybrechts</td> -->
<!-- <td>:</td> -->
<!-- <td><a href="http://www.flickr.com/photos/ensh/4743036023/"> -->
<!-- Boston Harbor at night</a></td> -->
<!--   </tr> -->
<!--   <tr> -->
<!-- <td>Justin Jensen</td> -->
<!-- <td>:</td> -->
<!-- <td><a href="http://www.flickr.com/photos/justinjensen/5111693529/"> -->
<!-- Glimmering Gaggle of Geese</a></td> -->
<!--   </tr> -->
  <tr>
<td>theilr</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/theilr/2707394552/">
Make Way for Ducklings</a></td>
  </tr>
  <tr>
<td>Soe Lin</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/soelin/4765830049/">
Boston Skyline</a></td>
  </tr>
  <tr>
<td>Jason Riedy</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/jason-riedy/8721559266/">
Paul Revere Mall</a></td>
  </tr>
  <tr>
<td>Rick Harris</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/rickharris/144287116/">
Boston Public Gardens Panorama</a></td>
  </tr>
  <tr>
<td>Justin Jensen</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/justinjensen/5209131077/">
Longfellow Bridge</a></td>
  </tr>
  <tr>
<td>Chris Oakley</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/chrisoakley/6044181310/">
Boston Waterfront</a></td>
  </tr>
  <tr>
<td>Eric Kilby</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/ekilby/3907393576/">
Kendall Sq Inbound</a></td>
  </tr>
  <tr>
<td>Madeleine Ball</td>
<td>:</td>
<td><a href="http://www.flickr.com/photos/madprime/7276366238/">
Whale Breach</a></td>
  </tr>
</table>
</div>

	</div>
      </div>
    </div>

  </body>
</html>
