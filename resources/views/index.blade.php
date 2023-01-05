<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job list</title>
</head>
<body style="background-color:whitesmoke;">
  @extends('layouts.app')
  @section('content')
      <div class="pt-5 pb-5" style="background-image:url('/images/job.png'); background-repeat: no-repeat; background-position: center; background-size:auto">
        @guest
        <div class="margin6"></div>
        @else
      <a href="{{ route('home') }}" class="margin2 exo btn btn-primary btn-lg mt-5 mb-3">Your jobs</a>
      @endguest
      @if ($message = session('message'))
      <div class="alert alert-success margin5 mt-4">{{ $message }}</div>   
      @endif
    <h4 class="margin michroma pl-4 pt-5">Available jobs: </h4>
      </div>
      <div class="padding mt-2">
@foreach ($adverts as $advert)
<div class="exo card text-white grey-background mb-3 ml-4 mr-4 mt-1">
  <div class="card-header bg-primary">{{ $advert->name }}  <a class="exo ml-2">(Last updated: {{ date('M d, Y', strtotime($advert->updated_at)) }})</a></div>
  <div class="card-body">
    <h4 class="card-title">{{ $advert->title}}</h4>
    <p class="card-text">Location: {{ $advert->location }}</p>
    <div class="d-flex">
    <a href="{{ $advert->permalink() }}" class="exo btn btn-primary btn-lg mr-1">View</a>
  </div>
</div>
</div>
@endforeach
<nav class="margin3 mb-3 pt-3 d-flex justify-content-center exo align-items-center">
{{ $adverts->links() }}
</nav>
</body>
@endsection
</html>