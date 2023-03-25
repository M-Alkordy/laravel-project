<?php

namespace App\Http\Controllers;

use App\Models\CategoryUser;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class studentsVideoController extends Controller
{
    public function index()
    {
        $categories = CategoryUser::where('user_id', auth()->user()->id)->
        with('category')->
        get();
        $videos = Video::where('category_id', collect(request()->segments())[1])->get();
        $name = User::where('id', auth()->user()->id)->FIRST('name');
        return view('frontend.Videos' , compact('categories','name','videos'));
    }
}
