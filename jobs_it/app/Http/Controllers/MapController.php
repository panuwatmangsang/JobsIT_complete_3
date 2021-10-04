<?php

namespace App\Http\Controllers;

use App\Models\JobsSearch;
use App\Models\MyJobs;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        // $jobs = JobsSearch::find($jobs_id);

        $count = MyJobs::query()->where('history_id', 'LIKE', session()->get("UserId"))->count();
        $noti_count = MyJobs::query()->where('history_id', 'LIKE', session()->get("UserId"))
            ->where(function ($query) {
                $query->where('a_id', 'LIKE', '4')
                    ->orWhere('a_id', 'LIKE', '5');
            })->count();
        $noti_count_box = MyJobs::query()->where('history_id', 'LIKE', session()->get("UserId"))
            ->where(function ($query) {
                $query->where('a_id', 'LIKE', '4')
                    ->orWhere('a_id', 'LIKE', '5');
            })->get();
        return view("applicants.map", compact('count', 'noti_count', 'noti_count_box'));
    }

    public function map2()
    {
        return view("applicants.map2");
    }
}
