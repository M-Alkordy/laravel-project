<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Update Token
     *
     * @return response
     */

    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->type == true){
            //admin
            return view('backend.cordinator.index');
        }else{
            //student here
            $categories = CategoryUser::where('user_id', auth()->user()->id)->
                                            with('category')->
                                            get();
            $name = User::where('id', auth()->user()->id)->FIRST('name');
            return view('frontend.categories', compact('categories', 'name'));
        }
    }
}
