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
  var center = new google.maps.LatLng(-33.40237, -70.57900);
 
  var neighborhoods = [
    new google.maps.LatLng(-33.403386, -70.575177), // Convention Center
    new google.maps.LatLng(-33.39996, -70.57543), // Courtyard Santiago Las Condes
    new google.maps.LatLng(-33.39952, -70.57418), // Santiago Marriott
    new google.maps.LatLng(-33.40410, -70.58257), // Grand Hyatt
    new google.maps.LatLng(-33.39670,-70.79361), // Airport
    new google.maps.LatLng(42.352359, -71.117050), // BU Student
    new google.maps.LatLng(42.343701, -71.115274), // Holiday Inn
    new google.maps.LatLng(42.359876, -71.117635), // Doubletree
    new google.maps.LatLng(42.360764, -71.055976)  // Millennium
  ];

  var icon_imgs = [
    'http://www.pamitc.org/cvpr15/images/map/conference.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr14/images/map/pdx.png',
    'http://www.pamitc.org/cvpr15/images/map/youthhostel.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png',
    'http://www.pamitc.org/cvpr15/images/map/hotel_0star.png'
  ];

  var icon_timing = [
    500, 1000, 1000,
    1000,1500,1000,1000,1000
  ];
 
  var markers = [];
  var iterator = 0;
 
  var map;
 
  function initialize() {
    var mapOptions = {
      zoom: 16,
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


<br/><br/>

<center>
<span class="iccvpageheader"><a name="venue"></a>Attending ICCV 2015</span>
</center><br>

<center><div id="map_canvas" style="width: 800px; height: 500px;"></div></center>

<br><br>

<span class="iccvsectionheader"><a name="venue"></a>Conference Venue</span>
<br><br>
ICCV 2015 be held at the <a href="http://www.centroparque.cl/en/"
target="_blank">CentroParque</a> Convention Center in Santiago,
Chile on December 11-18, 2015.  The associated workshops and tutorials will be held at the <a href="http://www.marriott.com/hotels/travel/scldt-santiago-marriott-hotel/" target="_blank">Santiago Marriott Hotel</a>.<br /><br />

<!--
<a href="http://www.signatureboston.com/uploadDocs/1/HYNES-FloorPlans_040615-32.pdf">Convention Center Floor Plan Map (PDF)</a><br /><br /><br />

-->
<br/>

<span class="iccvsectionheader"><a name="getting"></a>Getting to Centro Parque</span>

<p>The conference center entrance is located near the center of the park.</p>

<p><img src="images/cc1.png" /></p>

<p>Walk in through one of the gates and make your way toward the center.</p>

<p><img src="images/cc2.png" /></p>

<p>You will see a small mall with a glass dome ahead of you.  Enter the dome.</p>

<p><img src="images/cc3.png" />&nbsp;&nbsp;&nbsp;<img src="images/cc4.png" /></p>

<p>Go down two levels to level B.</p>

<p><img src="images/cc5.png" />&nbsp;&nbsp;&nbsp;<img src="images/cc6.png" /></p>

<p>You have arrived!!</p><br />

<span class="iccvsectionheader"><a name="hotels"></a>Hotels</span>
<br><br>
The conference has negotiated discounted rates at the hotels below.  Please book early, we cannot guarantee availability or rates after the dates listed to the right of each hotel.
<br /><br />

<!--
Those looking to share hotel rooms can check out and post on our 
<a href="https://www.facebook.com/cvpr2015" target="_blank">facebook page</a>.
-->
<!-- <a href="https://www.facebook.com/pamitc.cvpr" rel="publisher" target="_blank">facebook page</a>.-->

<table cellpadding="0" cellspacing="0"><tr valign="top"><td>

<table width="800" border=0 valign="top">
<tr>
<td width="40%" colspan="2"><b>Conference Hotels:</b></td>
<td width="20%"><b>Distance to CentroParque</b></td>
<td width="20%"><b>Reservations Link for Negotiated Rate</b></td>
<td width="20%"><b>Negotiated Rate Valid Through</b></td>
<!--<td width="10%">hotel info</td>-->
</tr>
<!--<tr><td colspan="3" /><td colspan="2"><font color="red">NOTE (9/4): The Hyatt website is having issues, please temporarily book directly with:<br/>&nbsp;&nbsp;&nbsp;Carolina Astudillo<br/>&nbsp;&nbsp;&nbsp;+ 56 2 2950 3271 (phone)<br/>&nbsp;&nbsp;&nbsp;carolina.astudillo@hyatt.com (email)</font><br/><br/></td></tr>-->
<tr><td>&nbsp;</td>
  <td><li>Santiago Marriott Hotel</li><br/></td><td valign="top">0.65 kilometers<br/>8 min walking</td>
  <td valign="top"><a href="http://www.marriott.com/meeting-event-hotels/group-corporate-travel/groupCorp.mi?resLinkData=IEEE%20-%20ICCV%20%5Escldt%60ieeieea%60204%60USD%60false%602%6012/8/15%6012/19/15%6011/23/15&app=resvlink&stop_mobi=yes" target="_blank">$189-204 USD/night</a></td><td valign="top">November 24, 2015</td>
  <!--<td valign="top"><a href="http://www.marriott.com/meeting-event-hotels/group-corporate-travel/groupCorp.mi?resLinkData=IEEE%20-%20ICCV%20%5Escldt%60IEEIEEA%60220%60USD%60false%601%6012/8/15%6012/19/15%6011/23/15&app=resvlink&stop_mobi=yes" target="_blank">$220-240 USD/night</a></td><td valign="top">November 24, 2015</td>-->
</tr>
<tr><td>&nbsp;</td>
  <td colspan="2"><i>Please note that the Marriott Hotel has the most space available and is well situated to both the workshops and the conference.</i></td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
<tr><td>&nbsp;</td>
	<td><li>Courtyard Santiago Las Condes</li><br/></td><td valign="top">0.55 kilometers<br/>7 min walking</td>
<td valign="top"><a href="http://www.marriott.com/meeting-event-hotels/group-corporate-travel/groupCorp.mi?resLinkData=IEEE%20-%20ICCV%5Esclcs%60icvicva%7Cicvicvb%7Cicvicvc%60169-189%60USD%60false%6012/6/15%6012/20/15%6011/23/15&app=resvlink&stop_mobi=yes" target="_blank">$169-189 USD/night</a></td><td valign="top">November 23, 2015</td>
</tr>
<tr><td width="2%">&nbsp;</td>
  <td><li>Grand Hyatt Santiago</li><br/></td><td valign="top">1.00 kilometers<br/>12 min walking</td>
<td valign="top"><a href="http://santiago.grand.hyatt.com/content/propertywebsites/hotels/grandhyatt/santi/en/group-booking/santigdfc12015.html" target="_blank">$183-202 USD/night</a></td><td valign="top">November 11, 2015</td>
</tr>
</table>
<br />
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

<!--
<p>Hotel room availability may fluctuate by day with travel
adjustments and cancellations.  Availability is not guaranteed and we
do not have the ability to add more rooms.  We encourage you to check
the reservation site to see if a room has opened up.  We will update
this page if anything changes.  If you are unable to find a hotel
room, we encourage you to check onto our <a
href="https://www.facebook.com/cvpr2015">facebook page</a> for
roommate possibilities and to also look into <a
href="https://www.airbnb.com/">Airbnb</a>.<p>
-->

For questions regarding hotel rooms please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=01wZDa6u95CO-TNTaa4FfbzA==&amp;c=d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501wZDa6u95CO-TNTaa4FfbzA\75\75\46c\75d_w0v-8GkTAKyFLtQR8JAZwgUUtSeRFmEPRJpntIUaw\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">Liz Ryan</a>.
<br /><br /><br />

<!--
<span class="iccvsectionheader">Travel</span>
<br><br/>

The convention centre and hotels are located about 20 km (20 minute car ride) from the Santiago Airport.  Each hotel has parking available onsite.  The convention centre will have limited parking due to our event taking up most of their underground lot.  The hotels are within walking distance of the convention centre.  
<br><br>
<a href="http://www.centroparque.cl/en/getting-here/" target="_blank">http://www.centroparque.cl/en/getting-here/</a>
<br><br>
Each hotel has information about airport transfers on their website and reservations can be made once you have booked your accommodations. 
<br/>
-->

<!--

<p><span class="iccvparagraphheader">MBTA Shuttle &amp; Subway:</span><br />
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
-->

<!--
<p><span class="iccvparagraphheader">Parking:</span><br />

There is no provision for parking at the Hynes.  Parking options can
be found here -
	<a href="http://signatureboston.com/Hynes/Getting-to-the-Hynes.aspx#Public">http://signatureboston.com/Hynes/Getting-to-the-Hynes.aspx#Public</a></p><br />
Forthcoming
-->

<!--
<span class="iccvsectionheader" id="posterprinting">Poster Printing Service in Chile</span>

<p>We are offering the following Poster Printing Service in Santiago de Chile:

  <ul>
    <li>The poster must be paid in cash in Chilean pesos (CLP) at the
      Poster's Desk of ICCV2015 Conference in Santiago.</li>
    <li>The price for each poster is CLP 40.000 (that is approx. USD 60).</li>
    <li>The poster must be ordered by Dec. 2nd.</li>
    <li>The poster must be in PDF format.</li>
    <li>The file must be downloadable from whatever platform you use (
      DropBox, FTP, etc).</li>
    <li>The size of the printed poster will be A0 (84.1cm x 118.9cm,
      33.11 inches x 118.9 inches).</li>
    <li>The poster will be printed in photographic quality.</li>
  </ul>
</p>

<p>If you want to use this service please fill the form:
  <a href="http://goo.gl/forms/6GpWu4CuWm">http://goo.gl/forms/6GpWu4CuWm</a>.</p>

<p>Any questions: <a href="http://www.google.com/recaptcha/mailhide/d?k=01qoFRFM7A3dkgYhYnWgsUZQ==&amp;c=kkI_5MQ3CEUAYyBTRtmPjk5XK4Fvgu7e_t7A5lyeha4=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501qoFRFM7A3dkgYhYnWgsUZQ\75\75\46c\75kkI_5MQ3CEUAYyBTRtmPjk5XK4Fvgu7e_t7A5lyeha4\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">p...</a>@gmail.com</p><br />
-->

<!--
<span class="iccvsectionheader">Travel Information</span>
<br><br>

<b><a href="files/ICCV15_TravelInformation.pdf">Transportation, Tourist Attractions, Restaurants, Nightlife, and Safety information</a></b><br /><br />
-->

<span class="iccvsectionheader">Transportation</span>

<p><b>From/to the airport:</b> Santiago International Airport (SCL) is
located approximately 20 Kms. west of downtown Santiago and 26
  Kms. west of the conference hotels and venue (<a href="http://www.centroparque.cl/ubicacion/">Centroparque</a>). There
are three main options to get to the city from the airport:</p>

<ol>
  <li><b>Airport Taxi:</b> We highly recommend that you take a taxi to
  get to your hotel as this is by far the most convenient, fastest
  (25-40 min depending on traffic) and reasonably priced (USD 30-35)
    option. In addition to <a href="https://www.uber.com/cities/santiago">Uber</a>,
  there are three main taxi companies that operate at the airport:
    <a href="http://www.taxioficial.cl/">Taxioficial</a>, <a href="http://www.transvip.cl/">Transvip</a> and <a href="http://www.transferdelfos.cl/">Transfer Delfos</a>. These
  companies have counters <b>after you exit customs and before you exit
      into the main airport lobby</b>. They have a flat rate of USD
  30-35 depending on your destination and you can pay by credit card,
  so you will not need to worry about getting Chilean pesos at the
  airport. You can also reserve and/or pay the taxi ahead of time
  using the website of these companies. While these companies also
  have counters after you exit into the main lobby, it is easier to
  book the taxi inside as it is less crowded. <b>In the main lobby,
  many unofficial taxi drivers may approach you. We do not recommend
  that you take an unofficial taxi as they may take advantage of
  unknowing foreigners and charge you a much higher fare.</b>
  </li>
  <li><b>Airport Vans:</b> <a href="http://www.taxioficial.cl/">Taxioficial</a>, <a href="http://www.transvip.cl/">Transvip</a> and <a href="http://www.transferdelfos.cl/">Transfer Delfos</a> also
    offer a shuttle service (shared taxi). The main advantage of a
    shuttle over a taxi is that it is cheaper (around USD
    10). However, depending on the final destination of other
    passengers, it will take you an additional 30-40 min to get to
    your hotel.</li>

  <li><b>Airport Buses + Metro:</b> If your budget is extremely
  limited and you have plenty of time to spare, you can take an
  airport bus followed by the metro to get to the conference venue and
  hotels. This is by far the cheapest option (USD 2-3 for the bus and
  USD 1 for the metro). However, this is the least recommended option
  because it will take you about 2 hours, some of the connections
  between the bus and the metro are located in slightly isolated
  places, and the metro could be extremely crowded during rush hours
  (7-9 AM and 6-8 PM). Anyhow, if you choose this option, the bus
  companies are <a href="http://www.centropuerto.cl/">Centro Puerto</a>
    and <a href="https://www.turbus.cl/">TurBus</a>, and are located
  in Level 1 right outside the airport terminal. You should connect
  from the bus to Metro Line 1 in the direction of Las Condes. The
  connection in Pajaritos metro station is easy and will save you time
  during rush hours, but the station is somewhat isolated, so you
  should avoid making the connection at night. On the other hand, the
  connection in Los Heroes metro station is centrally located in
    downtown Santiago, but it is a bit more complicated.</li>
</ol>

<img src="images/transport1.jpg" align="top" />&nbsp;&nbsp;<img src="images/transport2.jpg" /><br /><br />

<p><b>In Santiago:</b> Santiago has a wide range of fairly
frequent and inexpensive public transportation options, as detailed
  below. Please see <a href="http://santiagotourist.com/using-public-transportation-in-santiago/">here</a> for
  more detailed information.</p>

<ol>
  <li><b>The Santiago Metro System</b> is one of the most modern in
Latin America. It is fairly inexpensive (less than 1 dollar per trip)
and it is 7th in frequency worldwide, but the service ends at 11 PM
and it can be very crowded during rush hour (7-9 AM and 6-8 PM). The
Metro and Bus systems are integrated. That is, if you buy the “Bip
Card”, which you can buy in any metro station for about 2 dollars, you
can use it to transfer from the metro to the bus system without having
to pay again. Alternatively, if you intend to ride the metro only, you
can buy metro tickets directly without having to buy the Bip Card. The
conference venue and hotels are located about 10-15 min walking
distance from <b>Manquehue Metro Station in Line 1</b> and most
city attractions are located near a metro station in Line 1 or 5: for
downtown attractions use Universidad de Chile (L1) or Plaza de Armas
(L5) metro stations, for the bohemian district Barrio Bellavista use
Baquedano metro station (L1), for the Providencia district use Pedro
de Valdivia metro station (L1), and for the main business district use
Tobalaba or El Golf metro stations (L1).</li>
  <li><b>The Transantiago Bus System</b>, while integrated with the
metro system, is a little bit more complex to use as there are many
buses going to many places. So, we do not recommend it unless you are
going off the beaten path. You can check the bus routes in the <a href="http://www.transantiago.cl/">Transantiago website</a> (unfortunately
    the information is only in Spanish).</li>
  <li><b>Taxis</b> are a great option as they are available everywhere
and run until late at night. Prices are also very reasonable (roughly
1 dollar per kilometer). One problem is that most taxi drivers will
speak a very basic level of English, so be prepared to deal with some
communication issues. In general, taxis are safe in Chile, you can
catch a taxi in the streets without problems. There are stories about
some taxi drivers taking longer routes to charge more money to
tourists. While these stories are unfortunately true, it is also true
that they are the exception and not the general rule. Popular apps to
call taxis are <a href="https://www.uber.com/cities/santiago">Uber</a>, <a href="http://www.easytaxi.com/cl/">EasyTaxi</a>, and <a href="http://www.safertaxi.com/">SaferTaxi</a>.</li>
</ol>
    
<p><b>Near Santiago:</b> If you plan to take a trip to some of the local
wineries in the Maipo Valley or Casablanca Valley, you can either take
a taxi or rent a car. If you plan to visit Valparaiso, Viña del Mar,
or other neighboring cities, Santiago is exceptionally well connected
through interurban buses, which are safe, reliable, and very
  frequent. One bus company that is commonly used is <a href="https://www.turbus.cl/">TurBus</a>, which is
easily accessible via <b>Universidad de Santiago Metro Station in Line
  1</b>. If you plan to visit the <b>Wine Country (Colchagua Valley)</b>,
then it is best that you rent a car and drive to Santa Cruz, which is
about 3 hours south of Santiago.</p>

<p><b>Around Chile:</b> Many of the main attractions
  in Chile (<a href="http://www.sanpedroatacama.com/ingles/home.htm">San Pedro de Atacama</a>, <a href="http://travel.nationalgeographic.com/travel/world-heritage/easter-island/">Easter Island</a>, <a href="http://www.thechilespecialists.com/where-to-go/the-lake-district">Lake District</a>, <a href="http://www.torresdelpaine.com/ingles/">Torres
  del Paine</a>, and <a href="http://www.nytimes.com/2013/01/06/travel/chilean-patagonias-peaks-up-close.html?_r=0">Patagonia</a>)
  will require you to fly. The two main airlines are <a href="http://www.lan.com/">LAN</a> and <a href="http://www.skyairline.cl/">Skyairline</a>,
both of which are extremely safe and reliable, with LAN being a more
traditional airline, and Sky being a low-cost airline. Overall,
traveling in Chile is extremely safe, so feel free to enjoy what Chile
  has to offer.</p>

<p><b>Parking:</b> Each hotel has parking available onsite. The
conference venue will have limited parking due to our event taking up
most of their underground lot. The hotels are within walking distance
of the conference venue.</p>

<p><b>Additional Transportation Information:</b></p>

<ul>
  <li><a href="http://wikitravel.org/en/Santiago_de_Chile">Wikitravel</a></li>
  <li><a href="http://santiagotourist.com/using-public-transportation-in-santiago/">Santiago Tourist Transportation Guide</a></li>
</ul><br />

<span class="iccvsectionheader">What to Visit</span>

<p><b>Tourist Attractions</b></p>

<ul>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d314522-Reviews-Cerro_Santa_Lucia-Santiago_Santiago_Metropolitan_Region.html">Cerro Santa Lucia</a>: Metro Santa Lucia, Line 1</li>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d314481-Reviews-Cerro_San_Cristobal-Santiago_Santiago_Metropolitan_Region.html">Cerro San Cristobal</a>: Metro Baquedano, Line 1</li>
  <li><a href="https://en.wikipedia.org/wiki/Plaza_de_Armas_(Santiago)">Plaza de Armas</a>: Metro Plaza de Armas, Line 5</li>
  <li><a href="https://en.wikipedia.org/wiki/Santiago_Metropolitan_Cathedral">Catedral Metropolitana de Santiago</a>: Metro Plaza de Armas, Line 5</li>
  <li><a href="http://www.lonelyplanet.com/chile/santiago/sights/architecture/palacio-de-la-moneda">Palacio de la Moneda</a>: Metro La Moneda, Line 1</li>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d314527-Reviews-Los_Dominicos_Handicraft_Village-Santiago_Santiago_Metropolitan_Region.html">Pueblito los Dominicos</a>: Metro Los Dominicos, Line 1</li>
</ul>

<p><b>Museums</b></p>

<ul>
  <li><a href="http://www.mnba.cl/">Museo Bellas Artes</a>: Metro Bellas Artes, Line 5</li>
  <li><a href="http://www.fundacionneruda.org/en">La Chascona (House of Pablo Neruda)</a>: Metro Baquedano, Line 5</li>
  <li><a href="http://museovioletaparra.cl/">Violeta Parra Museum</a>: Metro Baquedano, Line 5</li>
</ul>

<p><b>Wineries in Santiago</b></p>

<ul>
  <li><a href="http://www.cousinomacul.com/en/">Viña Cousiño Macul</a>: located in Peñalolén, Santiago, 30 min taxi ride from the conference venue, or 6 min taxi ride from Metro Quilín, Line 4</li>
  <li><a href="http://www.conchaytoro.com/?lang=en_us">Viña Concha y Toro</a>: located in Pirque, Santiago, 50 min taxi ride from the conference venue, or 10 min taxi ride from Metro Plaza de Puente Alto, Line 4</li>
</ul>

<p><b>Organized Tours and More</b></p>

<ul>
  <li><a href="http://pamitc.org/iccv15/files/ChileanTours.docx">Information on organized tours</a></li>
  <li><a href="http://chile.travel/en/">http://chile.travel/en/</a></li>
</ul><br />


<span class="iccvsectionheader" id="food">Food Near Convention Center and Hotels</span><br /><br />

<center>
  <img src="images/MapRestaurantAreas.png" />
</center>

<ul>
  <li>Area 1: <a href="https://www.zomato.com/santiago/restaurants/in/parque-araucano-las-condes">Restaurants in the ground level of the conference center (Centro Parque)</a></li>
  <li>Area 2: <a href="https://www.zomato.com/santiago/restaurants/in/mall-parque-arauco-las-condes">Restaurants at the Parque Arauco shopping mall (5 minutes walk from the conference center)</a></li>
  <li>Area 3: <a href="http://www.feriadelsanguche.cl/web/">Food Truck Festival and Sandwich Fair: special event running from Thursday 12/10 to Sunday 12/13 (right beside conference center)</a></li>
</ul><br />


<span class="iccvsectionheader">Restaurant Districts</span>

<ul>
  <li><a href="https://www.zomato.com/santiago/restaurants/in/mall-parque-arauco-las-condes">Restaurants in Mall Parque Arauco</a>:
  located walking distance from conference venue and hotels. This will
  be by far the most convenient place, with very good restaurants, but
  you should not go there every night not to miss the Chilean culinary
  experience.</li>
  <li><a href="http://borderio.cl/">Borde Río</a>: located 10 min by
  taxi. You should definitely go there one night, as there are some
  great restaurants, many of them outdoors.</li>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d2538166-Reviews-Plaza_Nunoa-Santiago_Santiago_Metropolitan_Region.html">Plaza Ñuñoa</a>:
  located 25 min driving south west of the conference venue. It has a
  great variety of restaurants, many of them outdoors.</li>
  <li><a href="https://en.wikipedia.org/wiki/Barrio_Lastarria">Barrio Lastarria</a>:
  located walking distance from Metro Santa Lucia, Line 1. This is a
  historical neighborhood, remodeled with many cozy restaurants. A
  great option when combined with a visit to downtown Santiago.</li>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d4005186-Reviews-Patio_Bellavista-Santiago_Santiago_Metropolitan_Region.html">Patio Bellavista</a>:
  located 10 min walking from Baquedano metro station in Line 1 or
  Metro Bellas Artes metro station in Line 5, or 20 min taxi drive
    from the conference venue. This is <b>the place to go</b> if you
  plan to go out at night, as there are plenty of bars, clubs, and
  salsa dancing venues in <a href="http://www.tripadvisor.com/Attraction_Review-g294305-d314523-Reviews-Barrio_Bellavista-Santiago_Santiago_Metropolitan_Region.html">Barrio Bellavista</a>.</li>
</ul><br />

<span class="iccvsectionheader">Nightlife</span>

<p>Chileans go out very late. Dinner would typically be at 8.30-11PM,
bars and pubs 11PM-1AM, and clubs 1AM-4AM.</p>

<ul>
  <li><a href="http://www.tripadvisor.com/Attraction_Review-g294305-d314523-Reviews-Barrio_Bellavista-Santiago_Santiago_Metropolitan_Region.html">Barrio Bellavista</a>:
  located 10 min walking from Baquedano metro station in Line 1 or
  Metro Bellas Artes metro station in Line 5, or 20 min taxi drive
  from the conference venue. This is the place to go if you plan to go
  out at night, as there are plenty of bars, clubs, and salsa dancing
  venues. Just walk along Pio Nono Street.</li>
  <li><a href="http://gerberbars.com/red2one-santiago">Red2One Bar in W hotel</a>:
    for cocktails with a great view of Santiago at night</li>
</ul><br />

<span class="iccvsectionheader">Safety</span>

<p>Santiago is one of the safest capitals in Latin America, especially
the North East side of the city (Providencia, Las Condes, Vitacura)
where the conference venue and hotels are located. That said, most
common sense safety rules that apply to large metropolises such as New
York, San Francisco, Paris, or Tokyo, apply also to Santiago. In
general, all the areas near the conference venue are very safe. So our
main recommendation is to <b>be aware of pickpockets</b>. There have
been cases of people stealing bags in areas close to the conference
venue, specially bags with cameras and laptop computers. The typical
situation is unattended bags in public places, like
restaurants. Burglars are very professional, they are typically very
well dressed with a tie and a nice suit, so they seem to be regular
restaurant customers, but they are waiting for the right moment to
steal a bag. We know how important your cameras and computers are, so
please do not leave your bags unattended.</p>


<!--
<span class="iccvsectionheader">Dining Information</span>
<br><br>
Forthcoming

<a href="http://www.bostonusa.com/visit/bostoneveryday/where-to-eat/">Boston Tourism's Guide: Where to Eat</a><br />
<a href="http://www.opentable.com/boston-restaurants?mn=47">OpenTable: Boston</a><br />
<a href="http://www.yelp.com/c/boston/restaurants">Yelp: Boston</a><br /><br />

<br/><br/>
<span class="iccvsectionheader"><a name="tourist_information"></a>Tourist Information</span>
<br />

<ul>
  <li><a href="files/ChileanTours.docx">Information on organized tours</a></li>
  <li><a href="http://chile.travel/en/" target="_blank">http://chile.travel/en/</a></li>
</ul>
-->
<br/><br/>
<!--<a href="http://www.bostonusa.com/visit/bostoneveryday/whattodo/">Things to do in Boston</a><br /><br /><br />-->

<!--

<span class="iccvsectionheader">Letters of Invitation</span>
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
-->

<!-- 
For attendees requiring a letter of invitation, please see <a
href="registration.php">registration page</a>.<br /><br />
-->	

	<?php
	include('common_footer.php');
	?>
