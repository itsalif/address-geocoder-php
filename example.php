<?php

require_once 'geocode.php';

// define the address and set sensor to false
$opt = array (
	'address' => urlencode('Yonge and Bloor, Toronto, Canada'),
	'sensor'  => 'false'
);

// now simply call the function
$result = getLatLng($opt);

// if status was successful, then print the lat/lon ?
if ($result['status']) {
  
   echo '<pre>';
   print_r($result);
   echo '</pre>';
}
