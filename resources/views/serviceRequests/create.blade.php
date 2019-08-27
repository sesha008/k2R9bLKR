@extends('layouts.main')
@section('content')
<section class="bg-light">
  <div class="container">
    <div class="py-5">
      <h2 class="text-center">Create Ticket</h2>
      <div class="row">
  		  <div class="col-md-12 order-md-4 mb-4">
  		    <request-page old_vehicle_make_id="{{ old('vehicle_make_id') }}" old_vehicle_model_id= "{{ old('vehicle_model_id') }}" inline-template>
  		      <form  method="POST" action="{{ route('store') }}">
  		        @csrf
  		        <div class="form-group"> 
  		          <label for="Vehicle"> Choose Vehicle <span class="text-danger">* </span> </label>
  		          <select id="vehicle_make_id" v-model="vehicle_make_id" type="text" class="form-control @error('vehicle_make_id') is-invalid @enderror" value="{{ old('vehicle_make_id') }}" name="vehicle_make_id"  @change="fetchVehicleModels($event)" required="required">
  		            <option  value="" > Choose Vehicle </option>
  		            @foreach($vehicles as $key => $vehicle)
  		              <option  value="{{ $vehicle->id }}" {{ old('vehicle_make_id') ==  $vehicle->id ? 'selected = selected' : '' }} >  {{ $vehicle->title }} </option>
  		            @endforeach
  		          </select>
  		          @error('vehicle_make_id')
  		            <div class="invalid-feedback">{{ $message }}</div>
  		          @enderror
  		        </div>
  		        <div class="form-group" v-if="vehicle_make_id">
  		          <label for="Vehicle"> Choose Vehicle Model  <span class="text-danger">*</span> </label>
  		          <select id="vehicle_model_id" type="text"  v-model="vehicle_model_id"  name="vehicle_model_id" class="form-control @error('vehicle_model_id') is-invalid @enderror" value="{{ old('vehicle_model_id') }}" required="required">
  		            <option  value="" > Choose Vehicle Model </option>
  		            <option  v-for="VehicleModel in vehicleModels" :value="VehicleModel.id" > @{{ VehicleModel.title }} </option>
  		          </select>
  		          @error('vehicle_model_id')
  		            <div class="invalid-feedback">{{ $message }}</div>
  		          @enderror
  		        </div>  
  		        <div class="form-group">
  		           <label for="client_name"> Name  <span class="text-danger">*</span> </label>
  		            <input name="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" required="required">
  		              @error('client_name')
  		                  <div class="invalid-feedback">{{ $message }}</div>
  		              @enderror
  		          </div>
  		           <div class="form-group">
  		           <label for="client_phone"> Phone  <span class="text-danger">*</span> </label>
  		            <input id="client_phone" type="text" name="client_phone"  class="form-control @error('client_phone') is-invalid @enderror" value="{{ old('client_phone') }}" required="required">
  		              @error('client_phone')
  		                  <div class="invalid-feedback">{{ $message }}</div>
  		              @enderror
  		          </div>
  		          <div class="form-group">
  		           <label for="client_email"> Email  <span class="text-danger">*</span> </label>
  		            <input id="client_email" type="email" name="client_email" class="form-control @error('client_email') is-invalid @enderror" value="{{ old('client_email') }}" required="required">
  		              @error('client_email')
  		                  <div class="invalid-feedback">{{ $message }}</div>
  		              @enderror
  		          </div>
  		           <div class="form-group">
  		            <label for="description">  Description <span class="text-danger">*</span> </label>
  		            <textarea  type="text" name="description"  rows="5" class="form-control  @error('description') is-invalid @enderror" placeholder="Enter the detail description" required="required"> {{ old('description') }} </textarea>
  		            @error('description')
  		                <div class="invalid-feedback">{{ $message }}</div>
  		            @enderror
  		          </div>
  		          <div class="form-group row">
  		            <div class="col-md-12">
  		              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
  		            </div>
  		          </div>
  		        </div>
  		      </form>
  		    </request-page>
  		  </div>
	    </div>
    </div>
  </div>
</section>
@endsection