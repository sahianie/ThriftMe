<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Admin.Category.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.Category.create');
    }

    public function store(Request $request)
    {
        $category_name = ucfirst(strtolower($request->category_name));
        $category_type = ucfirst(strtolower($request->category_type));

        $request->merge([
            'category_name' => $category_name,
            'category_type' => $category_type,
        ]);

        $existing = \App\Models\Category::whereRaw(
            'LOWER(category_name) = ? AND LOWER(category_type) = ?',
            [strtolower($category_name), strtolower($category_type)]
        )->first();

        if ($existing) {
            return redirect()->back()->withErrors([
                'category_name' => 'The category name already exists with this category type.'
            ])->withInput();
        }

        $request->validate([
            'category_type' => ['required', 'in:Rental,Thrifted'],
            'category_name' => ['required', 'in:Shoes,Bags,Clothes'],
        ], [
            'category_type.in' => 'Only "Rental" or "Thrifted" are allowed as category type.',
            'category_name.in' => 'Only "Shoes", "Bags", or "Clothes" are allowed as category name.',
        ]);

        \App\Models\Category::create($request->only(['category_name', 'category_type']));

        return redirect()->route('index.category')->with('success', 'Category added successfully!');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Category::findorfail($id);
        return view('Admin.Category.edit', compact(['data',]));
    }

    public function update(Request $request, string $id)
    {

        $category_name = ucfirst(strtolower($request->category_name));
        $category_type = ucfirst(strtolower($request->category_type));

        $request->merge([
            'category_name' => $category_name,
            'category_type' => $category_type,
        ]);

        $request->validate([
            'category_name' => ['required', 'in:Clothes,Shoes,Bags'],
            'category_type' => ['required', 'in:Rental,Thrifted'],
        ]);

        $exists = Category::whereRaw('LOWER(category_name) = ? AND LOWER(category_type) = ?', [
            strtolower($category_name),
            strtolower($category_type),
        ])
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'category_name' => 'This category name already exists for the selected type.',
            ])->withInput();
        }

        $CategoryUpdated = Category::findOrFail($id)->update([
            'category_name' => $category_name,
            'category_type' => $category_type,
        ]);

        if (!$CategoryUpdated) {
            return redirect()->route('index.category')->with("error", "Category is not updated");
        }

        return redirect()->route('index.category')->with("success", "Category is updated");
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);


            if ($category->rental()->exists() || $category->thrift()->exists()) {
                return redirect()->route('index.category')
                    ->with('error', 'This category is linked to some posts and cannot be deleted.');
            }

            $category->delete();

            return redirect()->route('index.category')
                ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('index.category')
                ->with(['error' => 'Failed to delete Category: ' . $e->getMessage()], 500);
        }
    }
}
