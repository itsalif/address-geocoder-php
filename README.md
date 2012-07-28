Address to Lat & Lon conversion script in PHP using Google Geocoder
===========================================================================

  Address to Lat & Lon conversion script in PHP using Google Geocoder. 
  It does not require any Google Maps API Key. Please also check Google Maps Terms & FAQ.
  Read more here: <http://www.itsalif.info/content/address-lat-lon-without-api-google-maps-geocoder-php>


How to Use
----------

	<pre>
	// define the address and set sensor to false
	$opt = array (
		'address' => urlencode('Yonge and Bloor, Toronto'),
		'sensor'  => 'false'
	);
 
	// now simply call the function
	$result = getLatLng($opt);
 
	// if status was successful, then print the lat/lon ?
	if ($result['status']) {
      print_r($result);
	}
	
	</pre>
  