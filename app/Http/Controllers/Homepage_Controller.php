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
use Illuminate\Support\Str;

class Homepage_Controller extends Controller
{
    public function index()
    {
        DB::statement('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""))');

        $recipe = recipe_publish::inRandomOrder()->get();
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

    public function searchindexpost(Request $request){
        $search = $request->search;
        if($search == ''){
            return redirect('index');
        }else{
            DB::statement('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""))');

            $recipe = recipe_publish::whereHas('recipe', function ($query) use ($search) {
                $query->where('recipe_name', 'LIKE', '%' . $search . '%');
            })->get();
            
            $bundle_list = Bundle_List::join('mybundle', 'bundle_list.bundlelist_id', '=', 'mybundle.bundlelist_id')
            ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
            ->select('bundle_list.*')
            ->where('mybundle.Bundle_privacy', 'on')
            ->where('bundle.bundle_name', 'LIKE', '%' . $search . '%')
            ->groupBy('bundle_list.bundle_id')
            ->get();


            // Combine the arrays
            $combined = $recipe->concat($bundle_list);
        
            // Shuffle the combined array
            $shuffled = $combined->shuffle();
            // dd($shuffled);
            return view('index', compact('shuffled'));

        }
        // dd($searh);

    }

    
    public function filter(Request $request){
        $category = $request->category;
        $ingredients = $request->ingredients;
        $equipment = $request->equipment;

            DB::statement('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""))');

            $recipe = recipe_publish::join('recipe', 'recipe_publish.recipe_id','=','recipe.recipe_id')
            ->join('category', 'recipe.category_id','=','category.category_id')
            ->where(function ($query) use ($category) {
                if (is_array($category)) {
                    foreach ($category as $cate) {
                        $query->orWhere('category.category_name', 'LIKE', '%' . $cate . '%');
                    }
                } else {
                    $query->orWhere('category.category_name', 'LIKE', '%' . $category . '%');
                }
            })
            ->where(function ($query) use ($ingredients) {
                if (is_array($ingredients)) {
                    foreach ($ingredients as $ingredient) {
                        $query->orWhere('recipe.recipe_ingredients', 'LIKE', '%' . $ingredient . '%');
                    }
                } else {
                    $query->orWhere('recipe.recipe_ingredients', 'LIKE', '%' . $ingredients . '%');
                }
            })  
            ->where(function ($query) use ($equipment) {
                if (is_array($equipment)) {
                    foreach ($equipment as $equipments) {
                        $query->orWhere('recipe.recipe_equipment', 'LIKE', '%' . $equipments . '%');
                    }
                } else {
                    $query->orWhere('recipe.recipe_equipment', 'LIKE', '%' . $equipment . '%');
                } 
            })          
            ->get();
            // dd($recipe);

            $bundle_list = Bundle_List::join('mybundle', 'bundle_list.bundlelist_id', '=', 'mybundle.bundlelist_id')
            ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
            ->select('bundle_list.*')
            ->where('mybundle.Bundle_privacy', 'on')
            ->groupBy('bundle_list.bundle_id')
            ->get();


            // Combine the arrays
            $combined = $recipe->concat($bundle_list);
        
            // Shuffle the combined array
            $shuffled = $combined->shuffle();
            // dd($shuffled);
            return view('index', compact('shuffled'));

        
        // dd($searh);

    }
}