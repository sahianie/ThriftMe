<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalPostController extends Controller
{

    public function index()
    {
        $rental = Rental::all();
        return view('Admin.Rental.index', compact('rental'));
    }

    public function create()
    {
        $categories = Category::where('category_type', 'rental')->get();
        return view('Admin.Rental.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'size' => 'required|in:small,medium,large',
            'material' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'condition' => 'required|string|max:255',
            'type' => 'required|in:men,women,kid',
            'rent_per_day' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:100', 'max:50000'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rentals', 'public');
        }

        Rental::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'size' => $request->size,
            'material' => $request->material,
            'condition' => $request->condition,
            'type' => $request->type,
            'rent_per_day' => $request->rent_per_day,
            'image' => $imagePath,
        ]);

        return redirect()->route('index.rental')->with('success', 'Rental Post Created Successfully');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $data = Rental::findOrFail($id);
        $categories = Category::where('category_type', 'rental')->get();
        return view('Admin.Rental.edit', compact('data', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $rental = Rental::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'size' => 'required|in:small,medium,large',
            'material' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'condition' => 'required|string|max:255',
            'type' => 'required|in:men,women,kid',
            'rent_per_day' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:100', 'max:50000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if (!$request->hasFile('image') && !$rental->image) {
            return back()->withErrors(['image' => 'Image field is required.'])->withInput();
        }

        $imagePath = $rental->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rentals', 'public');
        }

        $rental->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'size' => $request->size,
            'material' => $request->material,
            'condition' => $request->condition,
            'type' => $request->type,
            'rent_per_day' => $request->rent_per_day,
            'image' => $imagePath,
        ]);

        return redirect()->route('index.rental')->with('success', 'Rental Post is Updated Successfully');
    }

    public function destroy(string $id)
    {
        try {
            $rental = Rental::findOrFail($id);

            if ($rental) {

                $rental->delete();


                return redirect()->route('index.rental')->with("success", "Rental Post deleted successfully'");
            }
        } catch (\Exception $e) {
            return redirect()->route('index.rental')->with(['error' => 'Failed to delete Rental Post: ' . $e->getMessage()], 500);
        }
    }
}
