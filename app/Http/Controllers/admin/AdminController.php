<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\user_data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $monthdata = user_data::select('created_at')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('F');
        });

        $month = [];
        foreach ($monthdata as $key => $value) {
            $month[$key] = count($value);
        }
        return view('admin.admin', compact('month'));
    }
}
