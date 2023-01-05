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
        <div class="d-flex">
      <a href="{{ route('adverts.create') }}" class="margin2 exo btn btn-primary btn-lg mt-5 mb-3">Add job</a>
      <a class="margin2 exo btn btn-primary btn-lg mt-5 mb-3" href="{{ route('home.statistics') }}">Total statistics</a>
      @endguest
        </div>
        @if ($message = session('message'))
        <div class="alert alert-success margin5 mt-4">{{ $message }}</div>   
        @endif
    <h4 class="margin michroma pl-4 pt-5">Your jobs: </h4>
      </div>
      <div class="padding mt-2">
@foreach ($adverts as $advert)
<div class="exo card text-white grey-background mb-3 ml-4 mr-4 mt-1">
  <div class="card-header bg-primary">{{ $advert->name }}  <a class="exo ml-2">(Last updated: {{ date('M d, Y', strtotime($advert->updated_at)) }})</a></div>
  <div class="card-body">
    <h4 class="card-title">{{ $advert->title }}</h4>
    <p class="card-text">Location: {{ $advert->location }}</p>
    <div class="d-flex">
    <a href="{{ $advert->permalink() }}" class="exo btn btn-primary btn-lg mr-1">View</a>
    @guest
    @else
    <a href="{{ $advert->route('edit') }}" class="font-white ml-1 exo btn yellow-background btn-lg">Edit</a>
    <form action="{{ $advert->route('destroy') }}" method="POST" style="display: inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="exo btn red-background font-white btn-lg ml-2" onclick="return confirm('Are you sure?')">Delete</button>

      <a href="{{ route('applications', ['advert' => $advert->id]) }}" class="font-white margin2 exo btn green-background btn-lg">Applications</a>
      <a href="{{ route('statistic', ['id' => $advert->id]) }}" class="font-white ml-1 exo btn green-background btn-lg">Statistics</a>
  </form>
  @endguest
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