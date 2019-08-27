<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class VehicleMakes extends Model {
	use LogsActivity;
  	protected $guarded = ['id'];

	  /**
	   * Get the vehicle models for the vehicle makers
	   */
	    public function vehicleModels()
	    {
	        return $this->hasMany('App\Models\VehicleModels','vehicle_make_id');
	    }
}
