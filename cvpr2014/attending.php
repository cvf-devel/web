<?php
    $which_page = "attending";
    $onpageload = "initialize()";
    include('common_header.php');
?>


<link href="http://code.google.com/apis/maps/documentation/javascript/examples/standard.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"> 
  // Adapted from http://jsfiddle.net/brWhw/
  // Useful for geocoding: http://gmaps-samples.googlecode.com/svn/trunk/geocoder/singlegeocode.html
  // var center = new google.maps.LatLng(52.520816, 13.410186);
  var center = new google.maps.LatLng(39.97171,-83.00246);
 
  var neighborhoods = [
    new google.maps.LatLng(39.99822,-82.889208), // Airport
    new google.maps.LatLng(39.972401,-83.001065), // Convention Center
    new google.maps.LatLng(39.969591,-83.00145), // Hyatt
    new google.maps.LatLng(39.971088,-83.002385) // Hilton
  ];

  var icon_imgs = [
    'http://www.pamitc.org/cvpr14/images/map/pdx.png',
    'http://www.pamitc.org/cvpr14/images/map/convention-center.png',
    'http://www.pamitc.org/cvpr14/images/map/hyatt-3.0.png',
    'http://www.pamitc.org/cvpr14/images/map/hilton-4.0.png'
  ];

  var icon_timing = [
    500, 500, 1000,
    1500,1500,1500,1500,1500
  ];
 
  var markers = [];
  var iterator = 0;
 
  var map;
 
  function initialize() {
    var mapOptions = {
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: center
    };
 
    map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
    drop();
  }
 
  function drop() {
    for (var i = 0; i < neighborhoods.length; i++) {
      setTimeout(function() {
        addMarker();
      //}, icon_timing[i]);
      }, i * 200 );
    }
  }
 
  function addMarker() {
    markers.push(new google.maps.Marker({
      position: neighborhoods[iterator],
      map: map,
      draggable: false,
      icon  :  icon_imgs[iterator],
      shadow:  'http://www.pamitc.org/cvpr13/images/map/shadow-mask.png',
      animation: google.maps.Animation.DROP
    }));
    iterator++;
  }
</script> 



<center>
<span class="cvprpageheader"><a name="venue"></a>Attending CVPR 2014</span>
</center><br>

<center><div id="map_canvas" style="width: 500px; height: 350px;"></div></center>

<br><br>

<span class="cvprsectionheader"><a name="venue"></a>Conference Venue</span>
<br><br>
CVPR 2014 and its co-located workshops will be held at the <a href="https://www.columbusconventions.com/" target="_blank">Greater Columbus Convention Center</a> in Columbus, Ohio on June 23-28th, 2014.
<br><br><br><br>


<span class="cvprsectionheader"><a name="hotels"></a>Hotels</span>
<br><br>
The conference has negotiated discounted rates at the hotels below.<br /><br />

Those looking to share hotel rooms can check out and post on our <a href="https://www.facebook.com/pamitc.cvpr" rel="publisher" target="_blank">facebook page</a>.

<!--Go to the <a href="#" target="_blank">Hotel Reservations page</a> to book a room at these discounted rates.-->
<br><br>
<table cellpadding="0" cellspacing="0"><tr valign="top"><td>
<span class="cvprparagraphheader">Conference Hotels:</span>

<table width="680" border=0>
<tr>
<td width="5%">&nbsp;</td>
<td width="55%">&nbsp;</td>
<td width="40%">reservations link for negotiated rate</td>
<!--<td width="10%">hotel info</td>-->
</tr>
<tr><td>&nbsp;</td>
<td><li><span style="text-decoration: line-through;">Hyatt Regency Columbus - Downtown Hotel</span></li></td>
<td>
<!--<a href="https://resweb.passkey.com/go/IEEEJune2014" target="_blank">-->
<span style="text-decoration: line-through;">$117 + tax</span></td>
<!--<td><a href="http://www.columbusregency.hyatt.com/en/hotel/home.html" target="_blank">Hyatt</a></td>-->
</tr>
<tr><td>&nbsp;</td>
<td><li>Hilton Columbus Downtown</li></td>
<td><a href="http://www.hilton.com/en/hi/groups/personalized/C/CMHDWHH-IEEECV-20140621/index.jhtml" target="_blank">$139 + tax</a></td>
<!--<td><a href="http://www.hiltoncolumbusdowntown.com/" target="_blank">Hilton</a></td>-->
</tr>

<tr><td>&nbsp;</td>
<td><li>Drury Hotel</li>
&nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 0.46 miles<br />
&nbsp;&nbsp;&nbsp;&nbsp;phone: 1-800-325-0720, refer to group code 2196780
<td><a href="http://www.druryhotels.com/Reservations.aspx?groupno=2196780" target="_blank">$130 + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
<td><li>Westin Columbus</li>
&nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 1.33 miles</td>
<td><a href="https://www.starwoodmeeting.com/StarGroupsWeb/res?id=1404301798&key=573C033" target="_blank">$129 + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
<td><li>Crowne Plaza Columbus Downton</li>
&nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 0.16 miles<br />
&nbsp;&nbsp;&nbsp;&nbsp;phone: 1-800-338-4462, refer to group code EEE</td>
<td><a href="http://www.crowneplaza.com/redirect?path=hd&brandCode=cp&localeCode=en&regionCode=1&hotelCode=CMHOC&_PMID=99801505&GPC=EEE" target="_blank">$170 + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
<td><li>Doubletree</li>
&nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 0.80 miles</td>
<td><a href="http://doubletree.hilton.com/en/dt/groups/personalized/C/CMHSBDT-IEE-20140620/index.jhtml?WT.mc_id=POG" target="_blank">$139 + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
<td><li>Red Roof Inn Columbus Downtown</li>
&nbsp;&nbsp;&nbsp;&nbsp;across street from conv. center<br />
&nbsp;&nbsp;&nbsp;&nbsp;phone: 1-614-224-6539 or 1-800-733-7663<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Red Roof Central Reservations),<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;refer to group code IEEE14</td>
<td>$120 + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
<td colspan=2>
<li>Days Inn Airport - for pre/post night dates</li>
&nbsp;&nbsp;&nbsp;&nbsp;June 21 & 22 - $79 (only king bed rooms available)<br />
&nbsp;&nbsp;&nbsp;&nbsp;June 27 & 28 - $69<br />
&nbsp;&nbsp;&nbsp;&nbsp;phone: 1-614-238-9010<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask for IEEE room block<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reservations need to be made 3 weeks prior to arrival to guarantee rate
</td>
</table><br />

For questions, please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=013gW9oM4ryXByGilQ7rcCWQ==&amp;c=XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\075013gW9oM4ryXByGilQ7rcCWQ\75\75\46c\75XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Nicole Finn</a>.<br />

<!--
<ul>
<li><a href="https://resweb.passkey.com/go/IEEEJune2014" target="_blank">Hyatt Regency Columbus - Downtown Hotel ($117 + tax)</a></li>
<li><a href="http://www.hilton.com/en/hi/groups/personalized/C/CMHDWHH-IEEECV-20140621/index.jhtml" target="_blank">Hilton Columbus Downtown ($139 + tax)</a></li>

<li><a href="http://columbusregency.hyatt.com/hyatt/hotels-columbusregency/index.jsp?hyattprop=yes" target="_blank">Hyatt Regency Columbus - Downtown Hotel ($TBD + tax)</a></li>
<li><a href="http://www.hiltoncolumbusdowntown.com/default-en.html" target="_blank">Hilton Columbus Downtown ($TBD + tax)</a></li>
</ul>
-->
<!--</td><td width="35"/><td>
<span class="cvprparagraphheader">Hotel related questions may be addressed to:</span><br>
<span class="cvprparagraphsmall">
<u>Travel Portland Housing Department</u><br>
<table cellpadding="0" cellspacing="0"><tr><td>
1000 SW Broadway<br>
Suite 2300<br>
Portland, OR 97205
</td><td width="25"/><td>
1-877-678-5263, x2 (Toll Free)<br>
1-503-275-9295 (International)<br>
housing@travelportland.com
</td></tr>
<tr height="5"/></table>
<i>Hours of Operation:<br>
Monday-Friday from 9am to 5pm Pacific</i>
</span>-->
</td></tr></table>
<br><br>

<span class="cvprsectionheader">Dining Information</span>
<br><br>
<a href="files/downtown_restaurants.pdf">Map of Columbus downtown restaurants (pdf)</a>.<br /><br /><br />

<span class="cvprsectionheader">Tourist Information</span>
<br /><br />

<a href="columbus.php">Things to do in Columbus</a><br /><br /><br />

<span class="cvprsectionheader">Letters of Invitation</span>
<br><br>

For attendees requiring a letter of invitation, please see <a
href="registration.php">registration page</a>.<br /><br />


<!--
<span class="cvprsectionheader"><a name="travel"></a>Travel/Transportation</span>
<br><br>

<span class="cvprparagraphheader">Getting to Portland:</span>
<ul>
<li>By air: <a href="http://www.pdx.com/" target="_blank">Portland International Airport</a>, (PDX)</li>
<li>By ground: <a href="http://www.amtrak.com/home" target="_blank">Amtrak</a> (Portland Union Station is close to venue and the Portland Transit Mall)</li>
</ul>

<span class="cvprparagraphheader">Getting around once you arrive:</span>
<ul>
<li><a href="http://www.trimet.org/" target="_blank">TriMet</a> is Portland's Bus, Light-Rail (MAX) and Street car system</li>
<li><a href="http://www.travelportland.com/transportation" target="_blank">Travel Portland</a> guide for traveling to the city and getting around.</li>
</ul>

To help our members better navigate the city all attendees will be given <b>free</b> passes to Portland's Light Rail system (MAX) at the registration desk. The passes will provide conference attendees with easy ground transportation to and from the hotels, venue and downtown. The CVPR 2013 organizing committee
recommends taking advantage of light rail system during the conference.<br><br>

<span class="cvprparagraphheader">Airport to Hotels (using MAX):</span><br><br>
<a href="http://www.trimet.org/schedules/maxredline.htm" target="_blank">MAX Red Line</a> connects the airport to downtown including both conference hotels and the venue.  Ticket machine can be found next to baggage claim. Current rates are $2.50 for two hour pass or $5.00 for a day pass. The Red line takes approximately 30 minutes to travel from airport to convention center and trains depart approximately every 15 minutes.

<ul>
<li>Hilton Portland and Executive Towers: Board Red Line at the Airport, disembark at Pioneer Square North exit and turn left to 6th Avenue. Turn right, travel two blocks to Hilton.</li>
<li>DoubleTree: Board Red Line at the Airport, disembark at Lloyd Center/NE 11th. DoubleTree is adjacent to Holladay Park on NE 11th.</li>
</ul>

<span class="cvprparagraphheader">Hotels to Convention Center (using MAX):</span>
<ul>
<li>Hilton Portland and Executive Towers: Exit main lobby onto SW 6th and turn left (right if you are in the Executive Tower on the east side of 6th). Walk 1 block to SW Yamhill. Pioneer Square South MAX stop is to your left. Take Red or Blue Max and disembark at the Oregon Convention Center.</li>
<li>DoubleTree: Walk 5 blocks west on NE Holladay St to Oregon Convention Center. Or Board Max at Lloyd Center/NE 11th stop and disembark at the Oregon Convention Center.</li>
</ul>


<br><br>
<span class="cvprsectionheader"><a name="dining"></a>Dining Information</span>
<br><br>
Information on restaurants, etc. will be forthcoming.



<br><br><br><br>
<span class="cvprsectionheader"><a name="tourist"></a>Tourist Information</span>
<br><br>
Portland is a unique and vibrant city which has much to offer the casual tourist. Visitors to the "City of Roses" will enjoy its unique neighborhoods, which offer a variety of attractions including a lively music and dining scene, numerous microbreweries, beautiful gardens, and specialty book stores. Other attractions which can be found in close proximity to Portland include the Oregon Coast, the Columbia Gorge, Mt. Hood, and the Willamette Valley Wine Country. 
<br><br>
<table width="100%" cellpadding="5">
<tr>
<td align="center"><img src="images/tourist_top.png" border="0"></td>
</tr>
</table>
<br>
<span class="cvprparagraphheader">Useful links for planning your stay:</span><br>
<ul>
  <li><a href="http://www.travelportland.com/" target="_blank">Travel Portland</a></li>
  <li><a href="http://traveloregon.com/" target="_blank">Travel Oregon</a></li>
</ul>

<br><br>
<span class="cvprparagraphheader">America's Hub World Tours:</span><br><br>
America's Hub World Tours would like to welcome the IEEE-CVPR 2013 Conference to Portland. We have worked with members of your organization to create adventures to some of the most popular attractions in this unique area for your group. Please visit our website: <a href="http://www.americashubworldtours.com/Newsite/?page_id=45" target="_blank">Click here!</a>  Or call us at 1-503-896-2464
<br>If you are an individual or small group coming to the Portland area (Pre & Post) we invite you to take advantage of the wide selection of tours offered at AHWT. We specialize in local tours and customizing excursions throughout the state.  Whether it is a half-day trip or a 2-3 day excursion, AHWT has it all. 
 
<br><br>How to find us...
<br>Website:  <a href="http://www.americashubworldtours.com/Newsite/?page_id=45" target="_blank">http://www.americashubworldtours.com/Newsite/?page_id=45</a>
<br>The password if asked is: hub
<br>When booking online use Discount Code: <b>HUB</b> during check out to receive 10% savings.
<br><br>

<table width="100%" cellpadding="5">
<tr>
<td align="center"><img src="images/tourist_bottom.png" border="0"></td>
</tr>
</table>


<br><br>
<span class="cvprparagraphheader">Portland Walking Tours:</span><br>
<br>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td>
	
<div style="width:100%;max-width:650px;margin-left:auto;margin-right:auto">
<table cellpadding="10" cellspacing="0">
<tbody>
<tr>
<td style="background-color:#1b5b90">
<table align="left">
<tbody>
<tr>
<td style="padding:10px" height="100" valign="middle">
<p style="font-size:22pt;color:#ffffff;text-align:left"><span style="font-size:17pt">Go on the most fun lunch tour ever!<br><span style="font-size:12pt">This cool new Portland Walking Tours video shows you how to pick the best and skip the rest of Portland's amazing selection of food carts<br></span></span></p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="background-color:#f3f3f3">
<td height="100" valign="top">
<table align="right" border="0" cellpadding="10" cellspacing="0">
<tbody>
<tr>
<td align="center"><a href="http://info.runbrainrun.com/acton/ct/2274/s-02f9-1303/Bct/q-006c/l-005e:16c6/ct3_0/1" title="Flavor Street Food Cart Tour video" target="_blank"><img alt="Flavor Street food cart video" src="http://cdn-ci23.actonsoftware.com/acton/attachment/2274/f-0050/1/-/-/-/-/image.jpg" height="160" align="right" border="0" hspace="5" vspace="5" width="240"></a></td>
</tr>
</tbody>
</table>
<p><span style="color:#333333;font-size:16pt">400 carts? 700? Who even knows? And how do you choose?<br></span></p>
<p><span style="font-size:13pt">Watch this cool new video to see how the insiders figure out which food trucks and pods to hit and which ones to miss.<br></span></p>
<p><span style="font-size:13pt">Just click the image (or <a href="http://info.runbrainrun.com/acton/ct/2274/s-02f9-1303/Bct/q-006c/l-005e:16c6/ct3_1/1" title="Flavor Street Food Cart Tour video" target="_blank">here</a>) to play the video on-line.</span></p>
<hr></td>
</tr>
</tbody>
</table>
</div>

</td></tr>
</table>

<br>
Portland Walking Tours<br>
<a href="http://www.portlandwalkingtours.com" target="_blank">www.portlandwalkingtours.com</a><br>
<a href="tel:%28503%29%20774-4522" value="+15037744522" target="_blank">(503) 774-4522</a><br>
<a href="mailto:info@portlandwalkingtours.com" target="_blank">info@portlandwalkingtours.com</a><br><br>
-->
 



<!--Hotels
<ul>
<li><a href="http://doubletreegreen.com/" target="_blank">DoubleTree Inn</a></li>
<li><a href="http://www3.hilton.com/en/hotels/oregon/hilton-portland-and-executive-tower-PDXPHHH/index.html" target="_blank">Hilton Downtown</a></li>
</ul>-->

<!--<iframe width="640" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=201221082410553307745.0004c28a616828d42568e&amp;ie=UTF8&amp;t=m&amp;ll=45.538000,-122.692675&amp;spn=0.028864,0.054932&amp;z=14&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=201221082410553307745.0004c28a616828d42568e&amp;ie=UTF8&amp;t=m&amp;ll=45.524089,-122.667675&amp;spn=0.028864,0.054932&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left">CVPR 2013 Map</a> in a larger map</small>-->

<br>


<?php
    include('common_footer.php');
?>


