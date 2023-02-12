<?php

namespace App\Http\Controllers\profile;
use App\Http\Controllers\Controller;

class MyOrdersController extends Controller
{
    public function index()
    {
        return view('profile.orders');
    }

}
