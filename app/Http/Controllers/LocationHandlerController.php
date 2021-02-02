<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class LocationHandlerController extends Controller
{
    public function get_by_constituency(Request $request,$constituency_id)
    {
        if (!$constituency_id) {
            $html = '<option value="">'.trans('Please select Area').'</option>';
        } else {
            $html = '';
            $constituencies = Area::where('constituency_id', $constituency_id)->get();
            foreach ($constituencies as $constituency) {
                $html .= '<option value="'.$constituency->id.'">'.$constituency->name.'</option>';
             }
        }
    
        return response()->json(['html' => $html]);
    }


     public function get_coordinates($constituency, $road)
		{   
			$city = \App\Constituency::where('id',$constituency)->first();
			$street = \App\Area::where('id',$road)->first();

            $api_key = \Config::get('google_map_values.google_api_key');

			$address = urlencode($city->name.','.$street->name);
			$url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Kenya&key=".$api_key;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$status = $response_a->status;

			if ( $status == 'ZERO_RESULTS' )
			{
				return FALSE;
			}
			else
			{
				$return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
				return $return;
			}

			return $response;
		}
}
