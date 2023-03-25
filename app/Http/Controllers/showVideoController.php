<?php

namespace App\Http\Controllers;

use App\Models\CategoryUser;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class showVideoController extends Controller
{

    public function index()
    {
        $categories = CategoryUser::where('user_id', auth()->user()->id)->
        with('category')->
        get();
        $videos = Video::where('category_id', collect(request()->segments())->last())->get();
        $name = User::where('id', auth()->user()->id)->FIRST('name');
        return view('frontend.showVideo' , compact('categories','videos','name'));
    }
}
