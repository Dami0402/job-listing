<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applications</title>
</head>
<body style="background-color:whitesmoke;">
  @extends('layouts.app')
  @section('content')
       {{-- <div class="pt-5 pb-5" style="background-image:url('/images/job.png'); background-repeat: no-repeat; background-position: center; background-size:auto">
        @guest
        <div class="margin6"></div>
        @else
      <a href="{{ route('adverts.create') }}" class="margin2 exo btn btn-primary btn-lg mt-5 mb-3">Add job</a>
      @endguest --}}
      @if ($message = session('message'))
      <div class="alert alert-success margin5 mt-4">{{ $message }}</div>   
      @endif
      <div class="d-flex">
    <h4 class="margin michroma pl-4 pt-5 pb-5">Applications: </h4> <a href="{{ route('home') }}" class=" exo btn btn-primary btn-lg ml-5 mt-5  mb-5">Return</a>
      </div>

      <div class="padding mt-2">
@foreach ($applications as $application)
<div class="exo card text-white grey-background mb-3 ml-4 mr-4 mt-1">
  <div class="font-white card-header green-background">{{ $application->name }}  <a class="exo ml-2">(Applied at: {{ date('M d, Y', strtotime($application->updated_at)) }})</a></div>
  <div class="card-body">
    <h4 class="card-title">Email: {{ $application->email }}</h4>
    <p class="card-text">Number: {{ $application->number }}</p>
    <div class="d-flex">
    <a href="{{ route('applications.show', ['application' => $application->id]) }}" class="exo btn btn-primary btn-lg mr-1">View</a>
    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="exo btn red-background font-white btn-lg ml-2" onclick="return confirm('Are you sure?')">Delete</button>
  </form>
  </div>
</div>
</div>
@endforeach
<nav class="margin3 mb-3 pt-3 d-flex justify-content-center exo align-items-center">
{{ $applications->links() }}
</nav>
</body>
@endsection
</html>
