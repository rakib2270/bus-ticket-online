@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <h1 class="text-center">Create Location</h1>
  <div style="width:500px; margin:0px auto;">
    <form action="{{ empty($fare) ? url('fare.store') : url('fare.update', $fare->id) }}" method="post">
      @csrf
      {{-- Base Location --}}
      <div class="mb-3">
        <label for="base_location" class="form-label">Base Location *</label>
        <select name="base_location" id="base_location" class="form-select" aria-label="Default select example" required>
            <option disabled selected>Select one</option>
            @foreach ($locations as $location)
              <option value="{{ $location->id }}" {{ old('base_location', empty($fare) ? '' : $fare->base_location) == $location->id ? 'selected' : '' }}>{{$location->place_name}}</option>
            @endforeach
        </select>
      </div>
      {{-- Start From --}}
      <div class="mb-3">
        <label for="start_from" class="form-label">Start From. *</label>
        <select name="start_from" id="start_from" class="form-select" aria-label="Default select example" required>
            <option disabled selected>Select one</option>
            @foreach($locations as $location)
              <option value="{{$location->id}}" {{ old('start_from', empty($fare) ? '' : $fare->start_from) == $location->id ? 'selected' : '' }}>{{$location->place_name}}</option>
            @endforeach
        </select>
      </div>
      {{-- Destination --}}
      <div class="mb-3">
        <label for="destination" class="form-label">Destination *</label>
        <select name="destination" id="destination" class="form-select" aria-label="Default select example" required>
            <option disabled selected>Select one</option>
            @foreach($locations as $location)
            <option value="{{$location->id}}" {{ old('destination', empty($fare) ? '' : $fare->destination) == $location->id ? 'selected' : '' }}>{{$location->place_name}}</option>
            @endforeach
        </select>
      </div>
      {{-- Fare Amount --}}
      <div class="mb-3">
        <label for="fare_amt" class="form-label">Fare Amount *</label>
        <input type="number" value="{{ $fare->fare_amt }}" class="form-control" name="fare_amt" id="fare_amt" placeholder="distance in km..." required>
      </div>
      {{-- Effective Date --}}
      <div class="mb-3">
        <label for="effect_from" class="form-label">Effect From *</label>
        <input type="date" value="{{ $fare->effect_from }}" class="form-control" name="effect_from" id="effect_from" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Fare</button>
    </form>
  </div>
@endsection
