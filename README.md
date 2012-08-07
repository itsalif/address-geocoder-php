Address to Lat & Lon conversion script in PHP using Google Geocoder
=======================================================================

Address to Lat & Lon conversion script in PHP using Google Geocoder. 
It does not require any Google Maps API Key. Please also check Google Maps Terms & FAQ.

Read more here: <http://www.itsalif.info/content/address-lat-lon-without-api-google-maps-geocoder-php>
  

How to Use
=======================================================================

1. At first include the file
<pre>
include_once 'geocode.php';
</pre>

2. Define the options to be passed on to the function/method
<pre>
// define the address and set sensor to false
$opt = array (
	'address' => urlencode('Yonge and Bloor, Toronto, Canada'),
	'sensor'  => 'false'
);
</pre>

3. Now, call the function
<pre>
$result = getLatLng($opt);
</pre>

4. If it is successful, check 'status' and proceed accordingly
<pre>
if ($result['status']) {
    print_r($result);
}
</pre>


Credits & License 
=======================================================================

No copyright. Use & distribute freely :). 