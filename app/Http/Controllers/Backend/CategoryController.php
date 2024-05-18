<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoriesView()
    {
        $categories = Category::all();

        return view("admin.categories.categories_view", compact("categories"));
    }

    public function categoriesStore()
    {
        return view("admin.categories.categories_store");
    }

    public function categoriesAdd(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Category Added Seccessfuly !',
        );

        return redirect()->route('categories.view')->with('success', $notification);
    }

    public function categoriesEdit($id)
    {
        $categories = Category::where('id', $id)->first();

        return view('admin.categories.categories_edit', compact('categories'));
    }

    public function categoriesUpdate(CategoryRequest $request, Category $categories, $id)
    {
        $categories = Category::find($id);

        $categories->update([
            'name' => $request->name,w
        ]);

        $notification = array(
            'message' => 'Category Updated Seccessfuly !',
        );

        return redirect()->route('categories.view')->with('success', $notification);
    }

    public function categoriesDelete($id)
    {
        $categories = Category::find($id);

        $categories->delete();

        $notification = array(
            'message' => 'Category Deleted Seccessfuly !',
        );

        return redirect()->route('categories.view')->with('error', $notification);
    }
}
