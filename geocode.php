<?php

/* A simple function/script for geocoding Address using Google Maps API.
 * Please check Google Maps API FAQ & Terms for more info.
 *
 * @author Abdullah Rubiyath
 */


/**
 * Returns a Lat and Lng from an Address using Google Geocoder API. It does not 
 * require any Google API Key
 *
 * @param $opt 	An array containing
 *			    'address' => The Address to be parsed
 *			    'sensor' => 'true' or 'false' as [string]
 *
 * @return 		An array containing
 *				'status'  => Boolean which is true on success, false on failure
 *				'message' => 'Success' on success, otherwise an error message
 *			    'lat'	  => The Lat of the address
 *				'lon'	  => The Lng of the address
 *
 */
function getLatLng($opts) {
	
	/* grab the XML */
	$url = 'http://maps.googleapis.com/maps/api/geocode/xml?' 
		. 'address=' . $opts['address'] . '&sensor=' . $opts['sensor'];
	
	$dom = new DomDocument();
	$dom->load($url);
	
	/* A response containing the result */
	$response = array();
	
	$xpath = new DomXPath($dom);
	$statusCode = $xpath->query("//status");

	/* ensure a valid StatusCode was returned before comparing */
	if ($statusCode != false && $statusCode->length > 0 
		&& $statusCode->item(0)->nodeValue == "OK") {
	
		$latDom = $xpath->query("//location/lat");
		$lonDom = $xpath->query("//location/lng");
		
		/* if there's a lat, then there must be lng :) */
		if ($latDom->length > 0) {
			
			$response = array (
				'status' 	=> true,
				'message' 	=> 'Success',
				'lat' 		=> $latDom->item(0)->nodeValue,
				'lon' 		=> $lonDom->item(0)->nodeValue
			);

			return $response;
		}	
		
	}

	$response = array (
		'status' => false,
		'message' => "Oh snap! Error in Geocoding. Please check Address"
	);
	return $response;
}


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
