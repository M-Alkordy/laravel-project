<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.cordinator.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.cordinator.users.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            foreach($request->category as $category){
                CategoryUser::create([
                    'category_id' => $category,
                    'user_id' => $user->id
                ]);
            };
            return redirect()->route('users.index');
        } catch (\Exception $th) {
            return back()->with('error', 'Added Faild');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.cordinator.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('users.index');
        } catch (\Exception $th) {
            return back()->with('error', 'Added Faild');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('users.index')
                        ->with('success','Deleted Success');
/*         $user = User::where('id', $id);
        $user->delete();
        return back()->with('success', 'Deleted Success');
        try {

        } catch (\Exception $th) {
            return back()->with('error', 'Faild Deleting');
        } */
    }

}
