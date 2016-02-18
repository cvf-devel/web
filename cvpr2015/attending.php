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
  var center = new google.maps.LatLng(42.356261, -71.085491);
 
  var neighborhoods = [
    new google.maps.LatLng(39.99822,-82.889208), // Airport
    new google.maps.LatLng(42.354109, -71.105464), // Hyatt
    new google.maps.LatLng(42.346679, -71.084909), // Sheraton
    new google.maps.LatLng(42.347523, -71.084265), // Convention Center
    new google.maps.LatLng(42.352359, -71.117050), // BU Student
    new google.maps.LatLng(42.343701, -71.115274), // Holiday Inn
    new google.maps.LatLng(42.359876, -71.117635), // Doubletree
    new google.maps.LatLng(42.360764, -71.055976)  // Millennium
  ];

  var icon_imgs = [
    'http://www.pamitc.org/cvpr14/images/map/pdx.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/conference.png',
    'http://www.pamitc.org/cvpr15/images/map/youthhostel.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png'
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
      zoom: 13,
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
<span class="cvprpageheader"><a name="venue"></a>Attending CVPR 2015</span>
</center><br>

<center><div id="map_canvas" style="width: 500px; height: 350px;"></div></center>

<br><br>

<span class="cvprsectionheader"><a name="venue"></a>Conference Venue</span>
<br><br>
CVPR 2015 and its co-located tutorials and workshops will be held at the <a href="http://massconvention.com/about-us/contact-us/john-b-hynes-veterans-memorial-convention-center"
target="_blank">Hynes Convention Center</a> in Boston,
Massachusetts on June 7-12th, 2015.<br /><br />

<a href="http://www.signatureboston.com/uploadDocs/1/HYNES-FloorPlans_040615-32.pdf">Convention Center Floor Plan Map (PDF)</a><br /><br /><br />


<span class="cvprsectionheader">Travel</span>
<br>

<p><span class="cvprparagraphheader">MBTA Shuttle &amp; Subway:</span><br />
	<img src="images/mbta_tsymbol.jpg" style="float:left; padding:10px;" width="80" />
Boston has a comprehensive public transportation system known as the
MBTA or the "T," with bus lines, trolleys, and subway trains running
throughout the city. Our best advice is to purchase a 
	<a href="http://www.mbta.com/fares_and_passes/charlie/">Charlie
		Card</a>. Charlie Cards are free and may be obtained
at ticket windows, for example at South Station and Kenmore Station,
until 7 pm, seven days a week. There are also Charlie Tickets,
available by machines, but passengers pay a small surcharge. Charlie
Cards and Charlie Tickets may have money added to their balance as
needed. You can use the <a href="http://mbta.com/rider_tools/trip_planner/">MBTA's
		Trip Planner</a> or <a href="https://www.google.com/maps/preview#!data=!1m4!1m3!1d49071!2d-71.02161!3d42.364594!4m18!3m17!1m5!3m2!3d42.364594!4d-71.02161!4sLogan+International+Airport%2C+Harborside+Drive%2C+Boston%2C+MA!6e3!1m0!2e3!3m8!1m3!1d94349!2d-71.072102!3d42.355499!3m2!1i1024!2i768!4f13.1&fid=0">Google Maps transit directions</a>
	to find your way.</p>

<p>The MBTA has <a href="http://www.mbta.com/riding_the_t/logan/">up-to-date advice posted</a>
for travelers from Logan Airport.  Another option for travel from the
airport is to take Back Bay Logan Express ($5, run by Massport) to
either Copley or Hynes Auditorium stations.</p>

<p><img src="images/mbta_map.gif" width="750" /><br />
	<a href="http://www.mbta.com/schedules_and_maps/subway/">Full MBTA subway map</a></p>

<p><span class="cvprparagraphheader">Parking:</span><br />

There is no provision for parking at the Hynes.  Parking options can
be found here -
	<a href="http://signatureboston.com/Hynes/Getting-to-the-Hynes.aspx#Public">http://signatureboston.com/Hynes/Getting-to-the-Hynes.aspx#Public</a></p><br />


<span class="cvprsectionheader">Dining Information</span>
<br><br>

<a href="http://www.bostonusa.com/visit/bostoneveryday/where-to-eat/">Boston Tourism's Guide: Where to Eat</a><br />
<a href="http://www.opentable.com/boston-restaurants?mn=47">OpenTable: Boston</a><br />
<a href="http://www.yelp.com/c/boston/restaurants">Yelp: Boston</a><br /><br />

<span class="cvprsectionheader">Tourist Information</span>
<br /><br />

<a href="http://www.bostonusa.com/visit/bostoneveryday/whattodo/">Things to do in Boston</a><br /><br /><br />

<span class="cvprsectionheader"><a name="hotels"></a>Hotels</span>
<br><br>
The conference has negotiated discounted rates at the hotels below.  Please book early as hotel space in Boston is limited.
We cannot guarantee availability or rates after May 10th.
<br /><br />

Those looking to share hotel rooms can check out and post on our 
<a href="https://www.facebook.com/cvpr2015" target="_blank">facebook page</a>.
<!-- <a href="https://www.facebook.com/pamitc.cvpr" rel="publisher" target="_blank">facebook page</a>.-->

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
  <td><li>Sheraton Boston Hotel</li>
    &nbsp;&nbsp;&nbsp;&nbsp;connected to the Hynes Convention Center<br />
<i>Sold out on 5th - 8th.  Limited availability on 9, 10, 11, and 12.</i>

<!--
    <b>Note</b>: The Sheraton is sold out on June 5, 6 &amp; 7 but has plenty
    of availability on June 8-14.  As rooms open up on the shoulder
    dates, we will post updates.
-->
</td>
<td valign="top">
  <a href="https://www.starwoodmeeting.com/events/start.action?id=1501285065&key=15170741" target="_blank">$259/night + tax</td>
</tr>
<tr><td>&nbsp;</td>
  <td><li>Hyatt Regency, Cambridge</li>
    &nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 1.6 miles<br />
<i>Sold out on 7th.  Limited availability on 8 - 12.</i>
    </td>
<td valign="top"><a href="https://resweb.passkey.com/Resweb.do?mode=welcome_gi_new&groupID=37887162" target="_blank">$319/night + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
	<td><li><strike>Holiday Inn Boston-Brookline</strike> sold out</li>
    &nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 1.8 miles</td>
<td valign="top"><a href="http://www.holidayinn.com/redirect?path=hd&brandCode=hi&localeCode=en&regionCode=1&hotelCode=BKLMA&_PMID=99801505&GPC=EYE" target="_blank">$182/night + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
  <td><li>Hilton Doubletree Suites, Cambridge</li>
    &nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 2.6 miles<br />
<i>Sold out on 7th.  Limited availability 8 - 12.</i>
</td>
<td valign="top"><a href="http://doubletree.hilton.com/en/dt/groups/personalized/B/BOSSBDT-ICS-20150601/index.jhtml?WT.mc_id=POG" target="_blank">$299/night + tax</a></td>
</tr>
<tr><td>&nbsp;</td>
  <td><li>Millennium Hotel, Boston</li>
    &nbsp;&nbsp;&nbsp;&nbsp;distance to conv. center - 1.8 miles<br />
<i>Sold out on 5th – 8th.  Limited availability on 9, 10, 11.</i>
<b>Note</b>: Millennium Hotel asks that guests who seek a reservation that includes pre or post CVPR dates (June 3-5 or June 13) call the hotel directly to secure the reservation rather than using the website.
  </td>
<td valign="top"><a href="https://reservations.millenniumhotels.com/ibe/details.aspx?propertyid=13523&nights=1&checkin=06/06/2015&group=1506IEEE01" target="_blank">$329/night + tax</a></td>
</tr>
</table>

<!-- Other hotel contracts have been negotiated and information about these
will be added soon.<br /><br />-->

<!-- 
<ul>
  <li>Hotel Commonwealth</li>
  <li>Lenox Hotel</li>
  <li>Millennium Hotel</li>
  <li>DoubleTree Suites</li>
</ul>

For questions, please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=013gW9oM4ryXByGilQ7rcCWQ==&amp;c=XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\075013gW9oM4ryXByGilQ7rcCWQ\75\75\46c\75XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Nicole Finn</a>.
-->

<p>Hotel room availability may fluctuate by day with travel
adjustments and cancellations.  Availability is not guaranteed and we
do not have the ability to add more rooms.  We encourage you to check
the reservation site to see if a room has opened up.  We will update
this page if anything changes.  If you are unable to find a hotel
room, we encourage you to check onto our <a
href="https://www.facebook.com/cvpr2015">facebook page</a> for
roommate possibilities and to also look into <a
href="https://www.airbnb.com/">Airbnb</a>.<p>

For questions regarding hotel rooms please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=01wZDa6u95CO-TNTaa4FfbzA==&amp;c=d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501wZDa6u95CO-TNTaa4FfbzA\75\75\46c\75d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Liz Ryan</a>.
<br /><br /><br />

<span class="cvprsectionheader"><a name="dorms"></a>Dorm Rooms</span><br />
<br />
<b>Dorm rooms are no longer available.</b>

<div style="color: #808080;">

<p>To help reduce expenses related to attending CVPR 2015, we offer a
low-cost housing option in the Boston University Student
Village. Conference registrants may reserve a dorm room via our
registration site.  People that have already registered can log back
into their account to secure dorm rooms.</p>

<p>We have two buildings available as outlined here:</p>

<p><b>33 Harry Agganis Way:</b> <i>Limited availability, additional
dorm rooms recently made available.</i></p>

<p>33 Agganis is single occupancy only and is $75 per room/per night.
This is an air-conditioned, suite-style residence located on the west
end of campus in the Student Village complex. Each suite has six
single-occupancy bedrooms, two bathrooms, and a living area.  Photos,
floor plans and additional information can be found here - <a
href="http://www.bu.edu/housing/residences/stuvi/33agganis/">http://www.bu.edu/housing/residences/stuvi/33agganis/</a></p>

<p><b>1019 Commonwealth Avenue:</b> <i>Limited availability.</i></p>

<p>1019 Commonwealth has the option of sharing a bedroom (two twin
beds) and then splitting the $110 per night fee or you can have a
single occupancy for $70.  This is an air-conditioned, suite-style
facility is located on the west end of campus at the corner of Babcock
Street and Commonwealth Avenue. Each suite consists of three
double-occupancy bedrooms clustered around a small living area and a
bathroom.  Photos, floor plans and additional information can be found
here - <a
href="http://www.bu.edu/housing/residences/largedorms/1019commave/">http://www.bu.edu/housing/residences/largedorms/1019commave/</a></p>

<p>You must make arrangements to split the cost with your roommate and
then supply us with their name.  Roommates can be found via our
Facebook page here - <a
href="https://www.facebook.com/cvpr2015">https://www.facebook.com/cvpr2015</a>.
There is also an option to buy out a number of bedroom, should two or
three guests wish to share a suite with no extra suite mates.</p>

<p>Guests can substitute someone for their room nights but cannot
cancel beyond <b>May 1st</b>.  <b>All housing charges must be paid in
full up front via the registration link.</b> We will randomly assign
suite-mates based on gender or you may request suite-mates.  We assume
zero responsibility on room assignments and cannot make a switch after
<b>May 15th</b>.  Wifi is included in the room rate.  Check in is at
3PM and check out is prior to 11AM.  There are no storage options
onsite at the dorms. While daily maid service is not provided, guests
can get fresh linens from the Front Desk.</p>

<p>A charge of $100 per key and $25 per ID will be charged to the
individual for all keys and IDs lost while in residence or not
returned upon departure.</p>

<p><b>Dorm Parking:  Applicable to all days</b></p>

<p>Guest parking passes are available with advance reservation.</p>

<p>Rates for Pre-Registered Parking Only:<br />

Daily - $8.00 per car per day (lot to be determined after speaking
with Parking Services about availability).<br />

Overnight - $16.00 per car per night (Lot F at 808 Commonwealth
Avenue)</p>

<p>The dorms are located 7 subway stops from the Hynes Auditorium, on
the MBTA Green Line, B branch (estimated trip time: 18 minutes).  Take
the Green Line, B train to the Pleasant Street stop.</p>

</div>

For questions about dorm accommodations, please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=01wZDa6u95CO-TNTaa4FfbzA==&amp;c=d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501wZDa6u95CO-TNTaa4FfbzA\75\75\46c\75d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Liz Ryan</a>.

<!--
For questions, please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=013gW9oM4ryXByGilQ7rcCWQ==&amp;c=XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\075013gW9oM4ryXByGilQ7rcCWQ\75\75\46c\75XZcLVQerhFKIaObFmUQQgOb0m3labCR_FpqtmnkL-CA\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Nicole Finn</a>.<br />
-->

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

<span class="cvprsectionheader">Letters of Invitation</span>
<br><br>

You must be fully registered to obtain a letter of invitation.  Please
contact
<a href="http://www.google.com/recaptcha/mailhide/d?k=01MR9nb8Bt2FYXmFGY_Q4PPQ==&amp;c=e22jscKOlaN1niy5yVCzMBcLn6-iP--Tb2JnRHVBD6U=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501MR9nb8Bt2FYXmFGY_Q4PPQ\75\75\46c\75e22jscKOlaN1niy5yVCzMBcLn6-iP--Tb2JnRHVBD6U\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Loren Schriever</a>
to request a letter.<br /><br />

Requests MUST contain the following information to be processed:<br />

<ul>
  <li>Registration confirmation number</li>
  <li>Full name including Salutation (Mr., Ms., Mrs.) in the order of Salutation, Given (First) Name, Family (Last) Name</li>
  <li>Paper number AND Title</li>
  <li>Email address, mailing address and affiliation (business or school)</li>
  <li>Letters will be mailed upon request only.  If you require expedited shipping, please indicate this and register for expedited shipping ($50 US)</li>
</ul>

Please know that your letter will be turned around as quickly as
possible.  Any fraudulent requests will be reported to the proper
authorities. <br /><br />

<!-- 
For attendees requiring a letter of invitation, please see <a
href="registration.php">registration page</a>.<br /><br />
-->	

	<?php
	include('common_footer.php');
	?>
