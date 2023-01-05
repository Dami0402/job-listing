<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertRequest;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;

class AdvertController extends Controller
{
    public function index()
    {
            $adverts = Advert::published()->latest()->paginate(5);
            return view('index', ['adverts' => $adverts]);   
    }
    

    public function show(Advert $advert)
    {
        $advert->incrementViewCount();
        return view('show', compact('advert'));
    }
    public function create()
{
    return view('add');
}
    public function store(AdvertRequest $request) {
        Advert::create($request->getData());
       return to_route('home')->with('message', "The job has been added successfuly.");
    }
    public function edit(Advert $advert)
    {
        if (request()->user()->id !== $advert->user_id) {
            abort(403, "Access denied");
        }
        return view("edit", compact ('advert'));
        
    }
        public function update(Advert $advert, AdvertRequest $request) {
            $advert->update($request->getData());
           return to_route('home')->with('message', "The job has been updated successfuly.");
        }

        public function destroy(Advert $advert) {
            if (request()->user()->id !== $advert->user_id) {
                abort(403, "Access denied");
            }
            $advert->delete();
           return to_route('home')->with('message', "The job has been removed successfuly.");
        }
}
