<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\countryModel;
use DB;
class countryController extends Controller
{
    //
	public function indexGetAllCity(){
		
		$getAllCountry = DB::select('select * from country' );
		
		$getAllCountry = json_decode(json_encode($getAllCountry),true);
		// echo "<pre>";
		// print_r($getAllCity);
		// die();
		return view('welcome',compact('getAllCountry'));
		
	}
}
