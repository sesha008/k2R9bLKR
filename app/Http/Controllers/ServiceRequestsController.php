<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequests as ValidateServiceRequests;
use App\Models\ServiceRequests;
use App\Models\VehicleMakes;
use Illuminate\Http\Request;

class ServiceRequestsController extends Controller {

  /**
   * Display a paginated list of Service Requests in the system
   * @return view
   */
  public function index(){
    if(request()->has('search') && $searchTerm = request()->get('search')) {
      $requests = ServiceRequests::whereLike(['client_email', 'client_phone', 'client_name', 'model.title'], $searchTerm)->orderBy('updated_at','desc')->paginate(20);
    } else {
       $requests = ServiceRequests::orderBy('updated_at','desc')->paginate(20);
    }
    return view('index',compact('requests'));
  }

  /**
   * This is the method you should use to show the edit screen
   * @param  ServiceRequests $serviceRequest [get the object you are planning on editing]
   * @return ...
   */
  public function edit($id){
    $serviceRequest = ServiceRequests::with('model.vehicleMake')->find($id);
    $vehicles = VehicleMakes::orderBy('updated_at','desc')->get();
    return view('serviceRequests.edit',compact('serviceRequest','vehicles'));
  }
  /**
   * This method update the service request details
   * @param  ServiceRequests $request 
   * @return redirect
   */
  public function update(ValidateServiceRequests $request,ServiceRequests $serviceRequest){
    $serviceRequest->update([
      'client_name' => $request->client_name,
      'client_phone' => $request->client_phone,
      'client_email' => $request->client_email,
      'vehicle_model_id' =>  $request->vehicle_model_id,
      'status' => 'new',
      'description' => $request->description
    ]);
    flash('Request updated successfully')->success();
    return redirect()->route('home');
  }

  /**
   * This method to show service request create screen
   * @return view
   */
  public function create(){
    $vehicles = VehicleMakes::orderBy('updated_at','desc')->get();
    return view('serviceRequests.create',compact('vehicles'));
  }

  /**
   * This method store the service request details
   * @param  ServiceRequests $request
   * @return redirect
   */
  public function store(ValidateServiceRequests $request){
    
    $response = ServiceRequests::create([
      'client_name' => $request->client_name,
      'client_phone' => $request->client_phone,
      'client_email' => $request->client_email,
      'vehicle_model_id' =>  $request->client_email,
      'status' => 'new',
      'description' => $request->description
    ]);
    flash('Request created successfully')->success();
    return redirect()->route('home');
  }

  public function destroy(ServiceRequests $serviceRequest){
    $serviceRequest->delete();
    flash('Request deleted successfully')->success();
    return redirect()->route('home');
  }

}
