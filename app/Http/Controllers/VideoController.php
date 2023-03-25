<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadImageTrait;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('backend.cordinator.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.cordinator.videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $video = $request->hasFile('video');
        $image = $request->hasFile('image');
        if ($video && $image) {
            $imgPath =  $this->uploadImage($request, 'image' ,'image');
            $path = $this->uploadImage($request, 'video' ,'video');
            if ($path) {
                try {
                    $video = Video::create([
                        'name' => $request->name,
                        'description' => $request->description,
                        'number' => $request->number,
                        'path' => $path,
                        'imgPath' => $imgPath,
                        'category_id' => $request->category_id,
                    ]);
                    return redirect()->route('videos.index')->with('success', 'Video Added Successfuly');
                } catch (\Exception $th) {
                    return back()->with('error', 'Added Faild');
                }
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $categories = Category::all();
        return view('backend.cordinator.videos.edit', compact('video' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);
        try {
            $file = $request->hasFile('video');
            if ($file) {
                $imgPath =  $this->uploadImage($request, 'image' ,'image');
                $path = $this->uploadImage($request, 'video' ,'video');
                if ($path) {
                    $video->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'number' => $request->number,
                        'path' => $path,
                        'imgPath' => $imgPath,
                        'category_id' => $request->category_id,
                    ]);
                }
                return redirect()->route('videos.index')->with('success', 'videos Added Successfuly');
            }
        } catch (\Exception $th) {
            return back()->with('erorr', 'Added Faild');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->route('videos.index')->with('success', 'Video deleted success');
        } catch (\Exception $th) {
            return redirect()->route('videos.index')->with('success', 'Video deleted failed');
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
}


