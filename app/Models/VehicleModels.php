<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class VehicleModels extends Model {
	use LogsActivity;
  protected $guarded = ['id'];

  /**
   * Get the vehicle makes for the given vehicle model
   */
    public function vehicleMake()
    {
        return $this->belongsTo('App\Models\VehicleMakes','vehicle_make_id');
    }
}
