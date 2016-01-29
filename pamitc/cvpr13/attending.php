<?php
    $which_page = "attending";
    $onpageload = "initialize()";
    include('frags/common_header.php');
?>


<link href="http://code.google.com/apis/maps/documentation/javascript/examples/standard.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"> 
  // Adapted from http://jsfiddle.net/brWhw/
  // Useful for geocoding: http://gmaps-samples.googlecode.com/svn/trunk/geocoder/singlegeocode.html
  // var center = new google.maps.LatLng(52.520816, 13.410186);
  var center = new google.maps.LatLng(45.526379,-122.669138);
 
  var neighborhoods = [
    new google.maps.LatLng(45.587405,-122.589448),
    new google.maps.LatLng(45.528737,-122.676938),
    new google.maps.LatLng(45.528379,-122.663138),
    new google.maps.LatLng(45.520151,-122.680085),
    new google.maps.LatLng(45.517523,-122.679927),
    new google.maps.LatLng(45.530772,-122.655575),
    new google.maps.LatLng(45.531641,-122.660859),
    new google.maps.LatLng(45.530443,-122.661149)
  ];

  var icon_imgs = [
    'http://www.pamitc.org/cvpr13/images/map/pdx.png',
    'http://www.pamitc.org/cvpr13/images/map/amtrak.png',
    'http://www.pamitc.org/cvpr13/images/map/convention-center.png',
    'http://www.pamitc.org/cvpr13/images/map/westin-4.0.png',
    'http://www.pamitc.org/cvpr13/images/map/hilton-3.5.png',
    'http://www.pamitc.org/cvpr13/images/map/doubletree-3.5.png',
    'http://www.pamitc.org/cvpr13/images/map/quality-inn-3.0.png',
    'http://www.pamitc.org/cvpr13/images/map/red-lion-2.0.png'
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
      zoom: 14,
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
<span class="cvprpageheader"><a name="venue"></a>Attending CVPR 2013</span>
</center><br>

<center><div id="map_canvas" style="width: 500px; height: 350px;"></div></center>


<br><br>

<span class="cvprsectionheader"><a name="venue"></a>Conference Venue</span>
<br><br>
CVPR 2013 and its co-located workshops will be held at the <a href="http://www.oregoncc.org/" target="_blank">Oregon Convention Center</a> in Portland, Oregon on June 23-28th, 2013.
<br><br><br><br>


<span class="cvprsectionheader"><a name="hotels"></a>Hotels</span>
<br><br>
The conference has negotiated discounted rates at the hotels below.  Go to the <a href="https://resweb.passkey.com/Resweb.do?mode=welcome_ei_new&eventID=10581191&fromResdesk=true" target="_blank">Hotel Reservations page</a> to book a room at these discounted rates.
<br><br>
<table cellpadding="0" cellspacing="0"><tr valign="top"><td>
<span class="cvprparagraphheader">Conference Hotels:</span>
<ul>
<li>Hilton Portland & Executive Tower ($161 + tax)</li>
<li>The Westin Portland ($179-189 + tax)</li>
<li>Doubletree by Hilton Portland ($132 + tax)</li>
<li>Red Lion Hotel - Convention Center ($109 + tax)</li>
<li>Quality Inn Downtown Convention Center ($103 + tax)</li>
</ul>
</td><td width="35"/><td>
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
</span>
</td></tr></table>
<br><br>



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
<a href="http://www.trimet.org/schedules/maxredline.htm" target="_blank">MAX Red Line</a> connects the airport to downtown including all the conference hotels and the venue.  Ticket machine can be found next to baggage claim. Current rates are $2.50 for two hour pass or $5.00 for a day pass. The Red line takes approximately 30 minutes to travel from airport to convention center and trains depart approximately every 15 minutes.

<ul>
<li>Hilton Portland and Executive Towers: Board Red Line at the Airport, disembark at Pioneer Square North stop and turn left to 6th Avenue. Turn right onto 6th Avenue and, travel two blocks to Hilton.</li>
<li>The Westin Portland: Board Red Line at the Airport, disembark at Pioneer Square North stop and continue up SW Morrison ST to SW Broadway. Turn right onto Broadway and walk one block to SW Alder ST. Turn Left onto SW Alder and walk to end of block to the Westin.</li>
<li>DoubleTree: Board Red Line at the Airport, disembark at Lloyd Center/NE 11th. DoubleTree is adjacent to Holladay Park on NE 11th.</li>
<li>Red Lion Hotel: Board Red Line at the Airport, disembark at the Convention Center stop and walk back a block on NW Holladay ST to NW Grand Ave. Turn left onto Grand Ave and walk half a block to the entrance of the Red Lion.</li>
<li>Quality Inn Downtown Convention Center: Board Red Line at the Airport, disembark at the Convention Center stop and walk back a block on NW Holladay ST to NW Grand Ave. Turn left onto Grand Ave and walk two blocks to the Quality Inn.</li>
</ul>

<span class="cvprparagraphheader">Hotels to Convention Center (using MAX):</span>
<ul>
<li>Hilton Portland and Executive Towers: Exit main lobby onto SW 6th and turn left (right if you are in the Executive Tower on the east side of 6th). Walk one block to SW Yamhill ST. Pioneer Square South MAX stop is to your left. Take an East bound Red or Blue Max train and disembark at the Oregon Convention Center.  The trains will be marked Greshem (Blue) or Airport (Red).</li>
<li>The Westin Portland: Turn right and walk one block to SW Broadway. Turn right onto Broadway and walk two blocks to SW Yamhill ST. Pioneer Square South MAX stop is to your left. Take an East bound Red or Blue Max train and disembark at the Oregon Convention Center. The trains will be marked Greshem (Blue) or Airport (Red).</li>
<li>DoubleTree: Walk 5 blocks west on NE Holladay St to Oregon Convention Center. Or board a West bound Max train at the Lloyd Center/NE 11th stop and disembark at the Oregon Convention Center (two stops from the Lloyd Center).</li>
</ul>





<br><br>
<span class="cvprsectionheader"><a name="dining"></a>Dining Information</span><a name="dining"></a>
<br><br>
The Portland dining scene is quite diverse from the local coffee house (<a href="http://stumptowncoffee.com/">Stumptown Coffee</a>), burger chain (<a href="http://www.burgerville.com/">Burgerville</a>), donut shop (<a href="http://voodoodoughnut.com/">Voodoo Doughnut</a>) to <a href="http://portlandbrewpubs.com/">Microbreweries</a> and numerous fine dining options. The following guides and review sites are helpful for narrowing styles and cost preferences <a href="http://www.tripadvisor.com/Restaurants-g52024-Portland_Oregon.html">Trip Advisor</a>, <a href="http://www.urbanspoon.com/c/24/Portland-restaurants.html">Urbanspoon</a>, <a href="http://www.zagat.com/c/portland-or">Zagat</a>, <a href="http://www.yelp.com/c/portland/restaurants">Yelp</a>, <a href="http://www.travelportland.com/food-and-drink/farm-to-table-dining-guide">Travel Portland</a>, etc.

<br/><br/>


For a quick bite at lunch you might try one of the restaurants near the Oregon Convention Center or venture downtown to eat at one of the many <a href="http://www.foodcartsportland.com/">food carts</a>.  The closest food cart pods are located at SW 3rd/SW Ash St and SW 3rd/SW Stark St, a short Max ride from the convention center (disembark at the Oak/SW 1st Max Stop).  If you have a little longer try one of the 60+ food carts located at the <a href="http://www.bing.com/maps/default.aspx?q=SW%209th+and+Alder+portland+or&amp;mkt=en">SW 9th Ave/SW Alder St</a> pod (disembark at the Galleria/SW10th Max Stop) or one of the many downtown restaurants. 

<br/><br/>
<span class="cvprparagraphheader">Breakfast</span><br/>
<p class="cvprhangingindent">
<a href="http://www.bijoucafepdx.com/menu">Bijou Cafe</a>, <a href="http://www.mothersbistro.com/">Mother's Bistro</a>, <a href="http://www.heathmanrestaurantandbar.com/">The Heathman</a></p>

<br/>
<span class="cvprparagraphheader">Lunch</span><br/>
<p class="cvprhangingindent">
<i>Convention Center</i>: <a href="http://www.burgerville.com/">Burgerville</a>, Subway, Red Robin, Denny's, <a href="http://www.stanfords.com/menu.php?c=lloydcenter">Stanford's Restaurant &amp; Bar</a>, <a href="http://www.lloydcenter.com/">Lloyd Center Mall</a></p>

<p class="cvprhangingindent">
<i>Downtown</i>:  <a href="http://www.foodcartsportland.com/">Food Carts</a> SW 3<sup>rd</sup> Ave/SW Ash St, SW 3<sup>rd</sup>/SW Stark St, <a href="http://www.bing.com/maps/default.aspx?q=SW%209th+and+Alder+portland+or&amp;mkt=en">SW 9<sup>th</sup> Ave/SW Alder St</a> (largest concentration of food carts), <a href="http://www.pioneerplace.com/">Pioneer Place Mall</a>, <a href="http://www.bijoucafepdx.com/menu">Bijou Cafe</a>, <a href="http://www.mothersbistro.com/">Mother's Bistro</a>, <a href="http://www.elephantsdeli.com/">Flying Elephant Delicatessen</a>, <a href="http://habibirestaurantpdx.com/">Habibi</a>, etc.</p>




<br/>
<span class="cvprparagraphheader">Dinner and Drink</span><br/>
<p class="cvprhangingindent">
<i><a href="http://portlandbrewpubs.com/">Microbreweries</a></i>:  <a href="http://www.deschutesbrewery.com/pub-menus/portland">Deschutes Brewery</a>, <a href="http://www.rockbottom.com/locations/portland?action=view">Rock Bottom Brewery</a>, <a href="http://www.bridgeportbrewandalehouse.com/">BridgePort BrewPub</a>, <a href="http://www.henrystavern.com/location-portland-OR.php">Henry's 12<sup>th</sup> St Tavern</a>, Downtown McMenamins Pubs (<a href="http://www.mcmenamins.com/CrystalBallroom">Crystal Ballroom</a>, <a href="http://www.mcmenamins.com/RinglersAnnex">Ringlers Annex</a>, etc.)</p>

<p class="cvprhangingindent">
<i>Steak Houses</i>: <a href="http://www.elgaucho.com/El-Gaucho-Portland.html">El Gaucho</a>, <a href="http://www.ringsidesteakhouse.com/">Ringside Steakhouse</a>, <a href="http://www.mortons.com/portland/">Morton's</a></p>

<p class="cvprhangingindent">
<i>Fine Dining</i>: <a href="http://www.andinarestaurant.com/">Andina</a> (Portland Peruvian, fun, great tapas menu), <a href="http://accantopdx.com/">Accanto</a> (next to Genoa, great food, less formal), <a href="http://www.beastpdx.com/">Beast</a> (chef's counter: enjoy the show), <a href="http://www.bluehouronline.com/">Blue Hour</a> (highly creative continental/NW fare), <a href="http://caffemingonw.com/">Caffe Mingo</a> (always reliable Italian), <a href="http://castagnarestaurant.com/">Castagna</a> (elegant Italian with NW twist), <a href="http://docpdx.com/">DOC</a> (cozy Italian with NW twist), <a href="http://genoarestaurant.com/">Genoa</a> (great food, more formal), <a href="http://higginsportland.com/">Higgins Restaurant and Bar</a> (farm to table), <a href="http://www.mccormickandschmicks.com/locations/portland-oregon/portland-oregon/sw12thave.aspx">Jake's Famous Crawfish</a> (a Portland landmark), <a href="http://www.muccaosteria.com/">Mucca Osteria</a> (authentic Italian with creative twists), <a href="http://www.noblerotpdx.com/">Noble Rot</a> (great food and view), <a href="http://noisetterestaurant.com/">Noisette</a> (exquisite French), <a href="http://nostrana.com/">Nostrana</a> (best wood-fired pizza in town, very good Italian), <a href="http://oxpdx.com/">Ox</a> (Argentine inspired Portland food), <a href="http://southparkseafood.com/">Southpark</a> (always reliable seafood grill, can handle larger groups)</p>






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

 



<!--Hotels
<ul>
<li><a href="http://doubletreegreen.com/" target="_blank">DoubleTree Inn</a></li>
<li><a href="http://www3.hilton.com/en/hotels/oregon/hilton-portland-and-executive-tower-PDXPHHH/index.html" target="_blank">Hilton Downtown</a></li>
</ul>-->

<!--<iframe width="640" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=201221082410553307745.0004c28a616828d42568e&amp;ie=UTF8&amp;t=m&amp;ll=45.538000,-122.692675&amp;spn=0.028864,0.054932&amp;z=14&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=201221082410553307745.0004c28a616828d42568e&amp;ie=UTF8&amp;t=m&amp;ll=45.524089,-122.667675&amp;spn=0.028864,0.054932&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left">CVPR 2013 Map</a> in a larger map</small>-->

<br>


<?php
    include('frags/common_footer.php');
?>


