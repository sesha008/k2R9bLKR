<?php

namespace App\Http\Controllers;

use App\Models\VehicleMakes;
use Illuminate\Http\Request;

class VehicleMakesController extends Controller
{
    
  /**
   * Get vehicle models for given vehicle makers
   * @param  VehicleMakes $VehicleMakes
   * @return json response
   */
	public function fetchVehicleModels(VehicleMakes $VehicleMakes){
	    $models = $VehicleMakes->vehicleModels;
	   	return response()->json([
	        'models' => $models,
	     ]);
	 }
}
