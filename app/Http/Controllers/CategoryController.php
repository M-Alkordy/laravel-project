<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadImageTrait;
use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.cordinator.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cordinator.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $file = $request->hasFile('image');
            if ($file) {
                $path =  $this->uploadImage($request, 'image' , 'categories');
                if ($path) {
                    $category = Category::create([
                        'name' => $request->name,
                        'image' => $path,
                        'notes' => $request->notes,
                    ]);
                }
                return redirect()->route('categories.index')->with('success', 'Category Added Successfuly');
            }
        } catch (\Exception $th) {
            return back()->with('erorr', 'Added Faild');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.cordinator.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        try {
            $file = $request->hasFile('image');
            if ($file) {
                $path =  $this->uploadImage($request, 'image', 'categories');
                if ($path) {
                    $category->update([
                        'name' => $request->name,
                        'image' => $path,
                        'notes' => $request->notes,
                    ]);
                }
                return redirect()->route('categories.index')->with('success', 'Category Added Successfuly');
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
        Category::where('id', $id)->delete();

        return redirect()->route('categories.index')
                        ->with('success','category deleted success');
    }
}
