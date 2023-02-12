<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product;
use App\Models\user_data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyAdminController extends Controller
{
    public function index()
    {

        $data = DB::table('products')->get();
        if ($data != []) {
            return view('admin.supply', compact('data'));
        }
        return view('admin.supply');
    }
}
