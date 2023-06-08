<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bundle_List;
use App\Models\Mybundle;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class Bundle_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mybundle = Mybundle::where('user_id',Auth::id())->get();
        $bookmark = Bookmark::where('user_id',Auth::id())->get();
        return view('bundle-main',compact('Mybundle','bookmark'));
    }

    public function mypageindex()
    {
        $Mybundle = Mybundle::where('user_id',Auth::id())->get();
        return view('bundle-mypage',compact('Mybundle'));
    }

    public function addbundle(Request $request){
        $bundlelistid = time() . mt_rand(1000, 9999);
        Bundle_List::create([
            'bundlelist_id' => $bundlelistid,
            'publish_id' => $request->publish_id,
            'bundle_id' => $request->bundle,
        ]);

        Mybundle::create([
            'user_id' => Auth::id(),
            'bundlelist_id' => $bundlelistid,
            'Bundle_privacy' => 'off'
        ]);
        return redirect('index');
    }

    public function deletebundlelist(Request $request)
    {
        $bundleListId = $request->bundleListId;
        $mybundle = MyBundle::where('bundlelist_id',$bundleListId);
        $bundlelist = Bundle_List::where('bundlelist_id',$bundleListId);
        $mybundle->delete();
        $bundlelist->delete();
        return back();
    }

    public function onbundle(Request $request){
        $MyBundle = MyBundle::find($request->onoff);
        $MyBundle->update([
            'Bundle_privacy'=>'on',
        ]);
        return redirect('bundle');
    }

    public function offbundle(Request $request){
        $MyBundle = MyBundle::find($request->test);
        $MyBundle->update([
            'Bundle_privacy'=>'off',
        ]);
        return redirect('bundle');
    }

    public function indexbookmark(Request $request){
        $bookmark = Bookmark::where('user_id',Auth::id())->get();
        return view('bundle-bookmark',compact('bookmark'));
    }

    public function savebookmark(Request $request){
        Bookmark::create([
            'bundle_id' => $request->bundle_id,
            'user_id' => Auth::id()
        ]);
        return back();
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
        //
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
