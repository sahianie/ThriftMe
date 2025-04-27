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

            'category_id' => 'required|exists:categories,id',
           'title' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'size' => 'required|in:small,medium,large',
           'material' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'condition' => 'required|string|max:255',
            'type' => 'required|in:men,women,kid',
            'rent_per_day' => ['required', 'regex:/^\d+$/', 'min:1'],
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
        $data = Rental::findorfail($id);
         // dd($data);
         $categories = Category::all(); 
         return view('Admin.Rental.edit', compact(['data','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
       'title' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        'size' => 'required|in:small,medium,large',
        'material' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        'condition' => 'required|string|max:255',
        'type' => 'required|in:men,women,kid',
       'rent_per_day' => ['required', 'regex:/^\d+$/', 'min:1'],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 🔄 Rental ko find karo
    $rental = Rental::findOrFail($id);

    // 🖼️ Nayi image milay to update karo
    if ($request->hasFile('image')) {
        // optional: purani image delete karna chaho to yahan kar sakte ho
        $imagePath = $request->file('image')->store('rentals', 'public');
    } else {
        $imagePath = $rental->image; // purani image rakho
    }

    // 🔧 Update fields
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

    // ✅ Redirect with success message
    return redirect()->route('index.rental')->with('success', 'RentalPost is Updated Successfully');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
    {
        $rental = Rental::findOrFail($id);

        if ($rental)
        {

        $rental->delete();


        return redirect()->route('index.rental')->with("success","Rental Post deleted successfully'");
        }
    }
    catch (\Exception $e)
    {
        return redirect()->route('index.rental')->with(['error' => 'Failed to delete Rental Post: '. $e->getMessage()], 500);
    }
    }

    
}
