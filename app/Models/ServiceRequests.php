<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class ServiceRequests extends Model {
  use SoftDeletes,LogsActivity;
  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];


 	/**
   * Get the vehicle model for the given service request.
  */
 	public function model()
  {
    return $this->belongsTo('App\Models\VehicleModels','vehicle_model_id');
  }
    
}
