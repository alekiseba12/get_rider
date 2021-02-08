<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\adminTrait;

class RiderController extends Controller
{

	use adminTrait;
    

    public function index(){

		
		$getRiders=$this->riders();
		$user=$this->shopCompany();

		$admin_lat = -1.282;
		$admin_lng = 36.888;
		foreach($getRiders as $rider){
			$distance = $this->GetDrivingDistance($admin_lat,$rider->latitude,$admin_lng,$rider->longitude);
			$rider->distance = str_replace(',','.',$distance['distance']);
			$rider->duration = str_replace(',','.',$distance['time']);
			$rider->save();
		}
    	return view('pages.user.riders', compact('getRiders','user'));
	}
	
	function GetDrivingDistance($lat1, $lat2, $long1, $long2)
		{
			$api_key = \Config::get('google_map_values.google_api_key');
		
			$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL&key=".$api_key;
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response, true);
			$dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
			$time = $response_a['rows'][0]['elements'][0]['duration']['text'];

			return array('distance' => $dist, 'time' => $time);
		}



}
