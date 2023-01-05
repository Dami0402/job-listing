<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply</title>
</head>
<body>
  @extends('layouts.app')
  @section('content') 
  <div class="d-flex justify-content-center align-items-center grey-background rounded margin-top margin-bottom">
  <form action="{{ route('applications.store') }}" class="mx-auto p-4 rounded" method="POST">
    @csrf
    <input type="hidden" name="advert_id" value="{{ request()->route('id') }}">
    <h2 class="display-4 exo p-4 font-white">Apply for the job:</h2>
    <div class="form-group exo font-white">
      <label for="name">Name:</label>
      <input type="text" class="form-control form-control-lg rounded " id="name" name="name" value="{{ old('name') }}">
       @error('name')
       <div class="alert alert-danger mt-2">
        <div class="text-danger">{{ $message }}</div>
      </div>
  @enderror
    </div>
    <div class="form-group exo font-white">
      <label for="email">E-mail:</label>
      <input type="text" class="form-control form-control-lg rounded " id="email" name="email" value="{{ old('email') }}">
       @error('email')
       <div class="alert alert-danger mt-2">
        <div class="text-danger">{{ $message }}</div>
      </div>
  @enderror
    </div>
    <div class="form-group exo font-white">
      <label for="number">Phone number:</label>
      <input type="text" class="form-control form-control-lg rounded " id="number" name="number" value="{{ old('number') }}">
       @error('number')
       <div class="alert alert-danger mt-2">
        <div class="text-danger">{{ $message }}</div>
      </div>
  @enderror
    </div>
    <div class="form-group exo font-white">
      <label for="resume">Resume:</label>
      <textarea type="text" class="form-control form-control-lg rounded " id="resume" name="resume" rows="5" >{{ old('resume') }}</textarea>
      @error('resume')
      <div class="alert alert-danger mt-2">
        <div class="text-danger">{{ $message }}</div>
      </div>
  @enderror
    </div>
        <button type="submit" class="btn btn-lg mt-2 btn-primary">Submit</button>
      </form>
  </div>
      @endsection
</body>
</html>