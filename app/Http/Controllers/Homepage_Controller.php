<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipe_publish;
use App\Models\Bundle;
use App\Models\Bundle_List;
use App\Models\MyBundle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Homepage_Controller extends Controller
{
    public function index()
    {
        DB::statement('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""))');

        $recipe = recipe_publish::all();
        $bundle_list = Bundle_List::whereHas('MyBundle', function ($query) {
            $query->where('Bundle_privacy', 'on');
        })->groupBy('bundle_id')->get();

        // Combine the arrays
        $combined = $recipe->concat($bundle_list);
    
        // Shuffle the combined array
        $shuffled = $combined->shuffle();
    
        return view('index', compact('shuffled'));
    }
    
    public function fetchBundleData(Request $request)
    {
        $publishId = $request->input('publishId');
        $existsInBundleList = Bundle_List::where('publish_id', $publishId)->exists();
        $getInBundleList = Bundle_List::where('publish_id', $publishId)->get();
        $bundle_list = Bundle_List::all();
        $bundle = Bundle::all();
        return view('bundle-data', compact('bundle','existsInBundleList','getInBundleList','bundle_list'));
    }
}