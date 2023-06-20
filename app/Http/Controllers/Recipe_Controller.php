<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\recipe_publish;
use App\Models\Category;
use App\Models\Bundle_List;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Recipe_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('create-recipe', compact('category'));
    }

    public function foodrecipe($id){
        $recipe = recipe::where('recipe_id',$id)->get();
        $recipe_publish = recipe_publish::inRandomOrder()->take(15)->get();
        return view('food-recipe',compact('recipe','recipe_publish'));
    }

    public function bundlerecipe($id,$bundlelistid,$user){
        DB::statement('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""))');

        $bundle = Bundle_List::whereHas('MyBundle', function ($query) use ($user,$bundlelistid){
            $query->where('Bundle_privacy', 'on');
            $query->where('user_id', $user);
            $query->where('bundlelist_id', $bundlelistid);
        })->where('bundle_id', $id)->get();

        $bundlelist = Bundle_List::whereHas('MyBundle', function ($query) use ($user,$bundlelistid){
            $query->where('Bundle_privacy', 'on');
            $query->where('user_id', $user);
        })->where('bundle_id', $id)->get();

        $recipe = recipe_publish::take(15)->get();

        // $bundle = Bundle_List::where('bundlelist_id',$id)->get();

        // dd($bundle);

        return view('bundle-recipe',compact('bundle','bundlelist','recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe_ingredients = implode(", ", $request->input('recipe_ingredients'));
        $recipe_equipment = implode(", ", $request->input('recipe_equipment'));
        $recipe_steps = implode(", ", $request->input('recipe_steps'));
        $recipe_tips = implode(", ", $request->input('recipe_tips'));

        $recipe_picture = $request->file('recipe_picture');
        $imageName = time().'.'.$recipe_picture->extension();
        $bundlelistid = time() . mt_rand(1000, 9999);
        // dd(Auth::id());
        $blog = Recipe::create([
            'recipe_id' => $bundlelistid,
            'recipe_name' => $request->recipe_name,
            'recipe_ingredients' => $recipe_ingredients,
            'recipe_equipment' => $recipe_equipment,
            'recipe_steps' => $recipe_steps,
            'recipe_tips' => $recipe_tips,
            'recipe_picture' => $imageName,
            'category_id' => $request->category_id,
        ]);
        if($blog){
            $publish = recipe_publish::create([
                'user_id' => Auth::id(),
                'recipe_id' => $bundlelistid,
                'publish_date' => date('Y-m-d')
            ]);
            $recipe_picture->move(public_path('images'), $imageName);
    
            return redirect('/');
        }else{
            return redirect('bundle');
        }
        
    }

    public function saverecipe(Request $request)
    {
        $recipe_ingredients = implode(", ", $request->input('recipe_ingredients'));
        $recipe_equipment = implode(", ", $request->input('recipe_equipment'));
        $recipe_steps = implode(", ", $request->input('recipe_steps'));
        $recipe_tips = implode(", ", $request->input('recipe_tips'));

        $recipe_picture = $request->file('recipe_picture');
        $imageName = time().'.'.$recipe_picture->extension();
        $bundlelistid = time() . mt_rand(1000, 9999);
        
        $blog = Recipe::create([
            'recipe_id' => $bundlelistid,
            'recipe_name' => $request->recipe_name,
            'recipe_ingredients' => $recipe_ingredients,
            'recipe_equipment' => $recipe_equipment,
            'recipe_steps' => $recipe_steps,
            'recipe_tips' => $recipe_tips,
            'recipe_picture' => $imageName,
            'category_id' => $request->category_id,
        ]);
        $recipe_picture->move(public_path('images'), $imageName);
    
        return redirect('/');
        
    }

    public function deleterecipe($id)
    {
        $recipe_publish = recipe_publish::where('recipe_id',$id);
        $recipe_publish->delete();
    
        $Recipe = Recipe::where('recipe_id',$id);
        $Recipe->delete();
        
        return redirect('index');
    }

    public function editrecipe($id)
    {
        $recipe = Recipe::where('recipe_id',$id)->get();
        $category = Category::all();
        return view('edit-recipe',compact('recipe','category'));
    }

    public function saverecipeedit(Request $request, $id){
        $record = Recipe::findOrFail($id);
        $recipe_ingredients = implode(", ", $request->input('recipe_ingredients'));
        $recipe_equipment = implode(", ", $request->input('recipe_equipment'));
        $recipe_steps = implode(", ", $request->input('recipe_steps'));
        $recipe_tips = implode(", ", $request->input('recipe_tips'));

        if(isset($foto)){
            $foto = $request->file('recipe_picture');
            $imageName = time().'.'.$foto->extension();
            $record->recipe_picture = $imageName;

        }
        
        $record->recipe_name = $request->recipe_name;
        $record->recipe_ingredients = $recipe_ingredients;
        $record->recipe_equipment = $recipe_equipment;
        $record->recipe_steps = $recipe_steps;
        $record->recipe_tips = $recipe_tips;
        $record->category_id = $request->category_id;

        $record->save();

        if(isset($foto)){
            $foto->move(public_path('images'), $imageName);
        }

        return redirect('foodrecipe/'.$request->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
