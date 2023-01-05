<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create job</title>
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="d-flex justify-content-center align-items-center grey-background rounded margin-top margin-bottom">
    <form action="{{ route('adverts.store') }}" class="mx-auto p-4 rounded" method="POST">
      @csrf
      <input type="hidden" name="name" value="{{ Auth::user()->name }}">
          <h2 class="display-4 exo p-4 font-white ">Create new job:</h2>
          <div class="form-group exo font-white">
            <label for="title">Job Title:</label>
            <input type="text" class="form-control form-control-lg rounded " id="title" name="title" value="{{ old('title') }}">
             @error('title')
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
            <label for="location">Location:</label>
            <input type="text" class="form-control form-control-lg rounded " id="location" name="location" value="{{ old('location') }}">
             @error('location')
             <div class="alert alert-danger mt-2">
              <div class="text-danger">{{ $message }}</div>
            </div>
        @enderror
          </div>
          <div class="form-group exo font-white">
            <label for="description">Job Description:</label>
            <textarea type="text" class="form-control form-control-lg rounded " id="description" name="description" rows="5" >{{ old('description') }}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">
              <div class="text-danger">{{ $message }}</div>
            </div>
        @enderror
          </div>
          <div class="d-flex flex-row">
          <button type="submit" class="exo btn btn-primary btn-lg m-2">Create</button>
          <a href="{{ route('home') }}" class="exo btn btn-secondary btn-lg m-2">Return</a>
          </div>
        </form>
      </div>
</body>
@endsection
</html>