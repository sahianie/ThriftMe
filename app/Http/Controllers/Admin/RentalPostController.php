<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rental = Rental::all(); // Sab categories le aayega
        return view('Admin.Rental.index', compact('rental'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('category_type', 'rental')->get();
        return view('Admin.Rental.create',compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'size' => 'nullable|in:small,medium,large',
            'material' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'type' => 'nullable|in:men,women,kid',
            'rent_per_day' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ✅ **Image Upload Handling**
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rentals', 'public');
        } else {
            $imagePath = null;
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
    
            // ✅ **Redirect with Success Message**
            return redirect()->route('index.rental')->with('success","RentalPost is  Created Successful');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
