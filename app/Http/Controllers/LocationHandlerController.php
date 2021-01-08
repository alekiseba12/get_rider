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
}
