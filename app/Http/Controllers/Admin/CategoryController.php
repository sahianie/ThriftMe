<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // Sab categories le aayega
        return view('Admin.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_type' => 'required|string|max:255',

        ]);
        $categoryEntered = Category::create($request->all());

        if($categoryEntered==null)
        {
            return redirect()->route('index.category')->with('error","Category is not Created');
        }
        else
        {
            return redirect()->route('index.category')->with('success","Category is  Created Successful');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::findorfail($id);
         // dd($data);
         return view('Admin.Category.edit', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $CategoryUpdated=   Category::findorfail($id)->update($request->all());

        if( $CategoryUpdated==null)
      {
        return redirect()->route('index.category')->with("error","Category is  not updated");
      }
      else
      {
          return redirect()->route('index.category')->with("success","Category is  updated");
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
    {
        $category = Category::findOrFail($id);

        if ($category)
        {

        $category->delete();


        return redirect()->route('index.category')->with("success","Category deleted successfully'");
        }
    }
    catch (\Exception $e)
    {
        return redirect()->route('index.category')->with(['error' => 'Failed to delete Category: '. $e->getMessage()], 500);
    }
    }
}