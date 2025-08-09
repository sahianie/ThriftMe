<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\ValidationException;
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
    // Step 1: Normalize inputs
    $category_name = ucfirst(strtolower($request->category_name));
    $category_type = ucfirst(strtolower($request->category_type));

    // Step 2: Overwrite request inputs
    $request->merge([
        'category_name' => $category_name,
        'category_type' => $category_type,
    ]);

    // Step 3: Check if the same category_name exists with the same category_type
    $existing = \App\Models\Category::whereRaw(
        'LOWER(category_name) = ? AND LOWER(category_type) = ?',
        [strtolower($category_name), strtolower($category_type)]
    )->first();

    if ($existing) {
        throw ValidationException::withMessages([
            'category_name' => 'The category name already exists with this category type.',
        ]);
    }

    // Step 4: Validate with custom error messages
    $request->validate([
        'category_type' => ['required', 'in:Rental,Thrifted'],
        'category_name' => ['required', 'in:Shoes,Bags,Clothes'],
    ], [
        'category_type.in' => 'Only "Rental" or "Thrifted" are allowed as category type.',
        'category_name.in' => 'Only "Shoes", "Bags", or "Clothes" are allowed as category name.',
    ]);

    // Step 5: Store category
    \App\Models\Category::create($request->only(['category_name', 'category_type']));

    return redirect()->back()->with('success', 'Category added successfully!');
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
    // Normalize input
    $category_name = ucfirst(strtolower($request->category_name));
    $category_type = ucfirst(strtolower($request->category_type));

    // Merge back normalized values
    $request->merge([
        'category_name' => $category_name,
        'category_type' => $category_type,
    ]);

    // Validate allowed values
    $request->validate([
        'category_name' => ['required', 'in:Clothes,Shoes,Bags'],
        'category_type' => ['required', 'in:Rental,Thrifted'],
    ]);

    // Check for duplicate entry (excluding current record)
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

    // Update category
    $CategoryUpdated = Category::findOrFail($id)->update([
        'category_name' => $category_name,
        'category_type' => $category_type,
    ]);

    if (!$CategoryUpdated) {
        return redirect()->route('index.category')->with("error", "Category is not updated");
    }

    return redirect()->route('index.category')->with("success", "Category is updated");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($category) {

                $category->delete();


                return redirect()->route('index.category')->with("success", "Category deleted successfully'");
            }
        } catch (\Exception $e) {
            return redirect()->route('index.category')->with(['error' => 'Failed to delete Category: ' . $e->getMessage()], 500);
        }
    }
}
