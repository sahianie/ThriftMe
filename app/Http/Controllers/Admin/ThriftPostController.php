<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Thrift;
use Illuminate\Http\Request;

class ThriftPostController extends Controller
{
    public function index()
    {
        $thrift = Thrift::with('category')->get();
        return view('Admin.Thrift.index', compact('thrift'));
    }

    public function create()
    {
        $categories = Category::where('category_type', 'thrifted')->get();
        return view('Admin.Thrift.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'size' => 'required|in:small,medium,large',
            'material' => ['required', 'string','min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'condition' => 'required|string|max:255',
            'type' => 'required|in:men,women,kid',
            'price' => ['required', 'regex:/^\d+$/', 'min:1', 'max:200,000'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('thrifts', 'public');
        } else {
            $imagePath = null;
        }

        Thrift::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'size' => $request->size,
            'material' => $request->material,
            'condition' => $request->condition,
            'type' => $request->type,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('index.thrift')->with('success', 'Thrift Post Created Successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Thrift::findOrFail($id);
        $categories = Category::all();
        return view('Admin.Thrift.edit', compact(['data', 'categories']));
    }

    public function update(Request $request, $id)
{
    // dd($request->all());
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
        'size' => 'required|in:small,medium,large',
        'material' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
        'condition' => 'required|string|max:255',
        'type' => 'required|in:men,women,kid',
        'price' => ['required', 'regex:/^\d+$/', 'min:1', 'max:200,000'],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 🔄 Thrift post ko find karo
    $thrift = Thrift::findOrFail($id);
    // dd($thrift);
    // 🖼️ Nayi image milay to update karo
    if ($request->hasFile('image')) {
        // optional: purani image delete karni ho to yahan kar sakte ho
        $imagePath = $request->file('image')->store('thrifts', 'public');
    } else {
        $imagePath = $thrift->image; // purani image rakho
    }

    // 🔧 Update fields
    $thrift->update([
        'category_id' => $request->category_id,
        'title' => $request->title,
        'size' => $request->size,
        'material' => $request->material,
        'condition' => $request->condition,
        'type' => $request->type,
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    // ✅ Redirect with success message
    return redirect()->route('index.thrift')->with('success', 'Thrift Post is Updated Successfully');
}


    

    
    public function destroy(string $id)
    {
        try {
            $thrift = Thrift::findOrFail($id);
            if ($thrift) {
                $thrift->delete();
                return redirect()->route('index.thrift')->with("success", "Thrift Post deleted successfully");
            }
        } catch (\Exception $e) {
            return redirect()->route('index.thrift')->with(['error' => 'Failed to delete Thrift Post: ' . $e->getMessage()], 500);
        }
    }
}
