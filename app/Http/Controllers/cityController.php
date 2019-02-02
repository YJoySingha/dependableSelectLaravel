<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cityModel;
use App\countryModel;
use DB;
use Response;
class cityController extends Controller
{
    //
	public function indexGetAllCity(){
		
	$countryCodeId = 2;
			$getAllCity = DB::select('select distinct(city_name) from city where city_contry_id = ?', [$countryCodeId] );
		$getAllCity = json_decode(json_encode($getAllCity),true);
		
		$getAllCountry = DB::select('select * from country' );
		
		$getAllCountry = json_decode(json_encode($getAllCountry),true);
		
		return view('welcome',compact('getAllCity','getAllCountry'));
		
	}
	public function indexGetAllCityByCountryId(){
		
		$countryCodeId = $_GET['c_id'];
		
		$getAllCity = DB::select('select distinct(city_name) from city where city_contry_id = ?', [$countryCodeId] );
		
		//$getAllCity = json_decode(json_encode($getAllCity),true);

		return json_encode($getAllCity);
	
	}
	
	public function indexGetAllLocalitiesByCityName(){
		
		$cityName = $_GET['city_name'];
		
		$getAllLocalities = DB::select('select localities from city where city_name = ?', [$cityName] );
		
		//$getAllLocalities = json_decode(json_encode($getAllLocalities),true);
		
		return json_encode($getAllLocalities);
	
	}
}
