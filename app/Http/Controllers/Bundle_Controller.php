<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bundle_List;
use App\Models\Mybundle;
use App\Models\Bundle;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Bundle_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mybundle = Mybundle::join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
        ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
        ->whereIn('mybundle.mybundle_id', function ($query) {
            $query->select(DB::raw('MAX(mybundle.mybundle_id)'))
                ->from('mybundle')
                ->join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
                ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
                ->where('user_id', '=', Auth::id())
                ->groupBy('bundle.bundle_id');
        })
        ->get();

        // dd($Mybundle);
        $bookmark = Bookmark::where('user_id',Auth::id())->get();
        return view('bundle-main',compact('Mybundle','bookmark'));
    }

    public function mypageindex()
    {
        $Mybundle = Mybundle::join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
        ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
        ->whereIn('mybundle.mybundle_id', function ($query) {
            $query->select(DB::raw('MAX(mybundle.mybundle_id)'))
                ->from('mybundle')
                ->join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
                ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
                ->where('user_id', '=', Auth::id())
                ->groupBy('bundle.bundle_id');
        })
        ->get();
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
        $Mybundle = Mybundle::join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
        ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
        ->where('bundle.bundle_id',$request->test)
        ->where('mybundle.user_id',Auth::id())
        ->get();
        foreach ($Mybundle as $bundle) {
            $bundle->bundle_privacy = 'on';
            $bundle->save();
        }
        return redirect('bundle');
    }

    public function offbundle(Request $request){
        $Mybundle = Mybundle::join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
        ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
        ->where('bundle.bundle_id',$request->test)
        ->where('mybundle.user_id',Auth::id())
        ->get();
        foreach ($Mybundle as $bundle) {
            $bundle->bundle_privacy = 'off';
            $bundle->save();
        }
        return redirect('bundle');
    }

    public function indexbookmark(Request $request){
        $bookmark = Bookmark::where('user_id',Auth::id())->get();
        return view('bundle-bookmark',compact('bookmark'));
    }

    public function savebookmark(Request $request){
        Bookmark::firstOrCreate([
            'bundle_id' => $request->bundle_id,
            'user_id' => Auth::id()
        ]);
        return back();
    }

    public function searchbundlepost(Request $request)
    {
        $search = $request->search;
        // dd($search);
        if($search == ''){
            return redirect('mypageindex');
        }else{
            $Mybundle = Mybundle::join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
            ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
            ->whereIn('mybundle.mybundle_id', function ($query) use ($search) {
                $query->select(DB::raw('MAX(mybundle.mybundle_id)'))
                    ->from('mybundle')
                    ->join('bundle_list', 'mybundle.bundlelist_id', '=', 'bundle_list.bundlelist_id')
                    ->join('bundle', 'bundle_list.bundle_id', '=', 'bundle.bundle_id')
                    ->where('user_id', '=', Auth::id())
                    ->where('bundle.bundle_name', 'LIKE', '%' .$search. '%')
                    ->groupBy('bundle.bundle_id');
            })
            ->get();
            // dd($Mybundle);
            return view('bundle-mypage',compact('Mybundle'));
        }
    }

    public function searchbookmarkpost(Request $request)
    {
        $search = $request->search;
        // dd($search);
        if($search == ''){
            return redirect('indexbookmark');
        }else{
            $bookmark = Bookmark::join('bundle', 'bundle.bundle_id', '=', 'bookmark.bundle_id')
            ->where('user_id',Auth::id())
            ->where('bundle.bundle_name', 'LIKE', '%' . $search . '%')
            ->get();
            
            return view('bundle-bookmark',compact('bookmark'));        
        }
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
