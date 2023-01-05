<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Advert;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function applications(Advert $advert)
{
    $applications = Application::where('advert_id', $advert->id)->latest()->paginate(5);

    return view('applications', ['applications' => $applications]); 
}

public function create()
 {
 return view('apply');
 }
 public function show(Application $application)
    {
        return view('application',  compact('application'));
    }

    public function store(ApplicationRequest $request)
    {
        $data = $request->getData($request);
        Application::create($data);
        return redirect()->route('adverts.index')->with('message', "You have applied successfuly.");
    }

 public function destroy(Application $application)
{
    //$application = Application::find($id);
    $application->delete();
   return to_route('home')->with('message', "The application has been removed successfuly.");//this
}
}
