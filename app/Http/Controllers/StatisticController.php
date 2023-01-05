<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function statistic($id) {

        $totalApplications = DB::table('applications')->where('advert_id', $id)->count();
        $views_count = DB::table('adverts')->where('id', $id)->value('views_count');
        return view('statistic', compact('views_count', 'totalApplications'));
        }
}
