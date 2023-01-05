<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function statistics() {
        $userId = auth()->user()->id;
        $totalAdverts = DB::table('adverts')->where('user_id', $userId)->count();
        $totalViews = DB::table('adverts')->where('user_id', $userId)->sum('views_count');
        return view('statistics', ['totalViews' => $totalViews], ['totalAdverts' => $totalAdverts]);
    }
}
