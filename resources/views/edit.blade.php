<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit job</title>
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="d-flex justify-content-center align-items-center rounded mt-5 mb-5">
    <form action="{{ $advert->route('update') }}" class="p-5 rounded mx-auto grey-background" method="POST">
      @csrf
      @method('PUT')
          <h2 class="display-4 exo p-4 font-white ">Edit job:</h2>
          <div class="exo font-white">
            <div class="d-flex flex-column font-blue size2 pb-2">
            <div class="p-4 d-flex"><label class="mb-2 pr-2 font-white">Job title:</label>{{ $advert->title() }}</div>
            <div class="p-4 d-flex"><label class="mb-2 pr-2 font-white">Company name:</label>{{ $advert->name() }}</div>
            </div>
            </div>
          <div class="form-group exo font-white pl-4 pb-2">
            <label for="number">Phone number:</label>
            <input type="text" class="form-control form-control-lg rounded " id="number" name="number" value="{{ old('number', $advert->number) }}">
             @error('number')
             <div class="alert alert-danger mt-2">
              <div class="text-danger">{{ $message }}</div>
            </div>
        @enderror
          </div>
          <div class="form-group exo font-white pl-4 pb-2">
            <label for="location">Location:</label>
            <input type="text" class="form-control form-control-lg rounded " id="location" name="location" value="{{ old('location',$advert->location) }}">
             @error('location')
             <div class="alert alert-danger mt-2">
              <div class="text-danger">{{ $message }}</div>
            </div>
        @enderror
          </div>
          <div class="form-group exo font-white pl-4 pb-2">
            <label for="description">Job Description:</label>
            <textarea type="text" class="form-control form-control-lg rounded " id="description" name="description" rows="5" >{{ old('description', $advert->description) }}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">
              <div class="text-danger">{{ $message }}</div>
            </div>
        @enderror
          </div>
          <div class="d-flex flex-row pl-4 pb-2">
          <button type="submit" class="exo btn btn-primary btn-lg m-2">Update</button>
          <a href="{{ route('home') }}" class="exo btn btn-secondary btn-lg m-2">Return</a>
          </div>
      </div>
      </form>
</body>
@endsection
</html>