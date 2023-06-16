<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('index');
    }

    public function deleteaccount(Request $request){
        $record = User::findOrFail($request->id);
        $record->delete();
    
        return redirect('login');
    }

    public function userimgpost(Request $request){
        $record = User::findOrFail($request->id);

        $foto = $request->file('foto');
        $imageName = time().'.'.$foto->extension();
        
        $record->user_profile = $imageName;

        $record->save();

        $foto->move(public_path('user'), $imageName);

        return back();
    }

    public function userusernamepost(Request $request){
        $record = User::findOrFail($request->id);
        
        $record->user_name = $request->input('username');

        $record->save();

        return back();
    }
}
