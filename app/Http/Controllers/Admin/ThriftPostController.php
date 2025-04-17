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
        $thrift = Thrift::all();
        return view('Admin.Thrift.index', compact('thrift'));
    }

    public function create()
    {
        $categories = Category::where('category_type', 'thrift')->get();
        return view('Admin.Thrift.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'size' => 'nullable|in:small,medium,large',
            'material' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'type' => 'nullable|in:men,women,kid',
            'price' => 'required|numeric|min:0',
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

    public function update(Request $request, string $id)
    {
        //
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
