<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    const VALIDATION_RULE = [
        'name' => 'required',
        'name_ukr' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png',
    ];
    //TODO change rules
    public function index()
    {
        $data['categories'] = Category::paginate(10);
        return view('category.index', $data);
    }

    public function create()
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('category.create');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                $validatedData["image"] = ($request->image)->store("uploads/genres");
            } else {
                $validatedData["image"] = "css/not_found_image.jpg";
            }

            $validatedData['slug']=Utility::slugify($validatedData['name']);

            Category::create($validatedData);

            return redirect()->route('category.index')->with('success', 'Category has been created successfully');
        }
        return redirect()->back();
    }

    public function show(Category $category)
    {
        $data['category'] = $category;
        $data['books'] = $data['category']->books;
        return view('book.index', $data);
    }

    public function edit(Category $category)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('category.edit', compact('category'));
        }
        return redirect()->back();
    }

    public function update(Request $request, Category $category)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                if ($category->img != "uploads/noimage.jpg")
                    Storage::delete($category->image);
                $validatedData["image"] = ($request->image)->store("uploads/categories");
            } else {
                $validatedData["image"] = "uploads/noimage.jpg";
            }

            $validatedData['slug']=Utility::slugify($validatedData['name']);

            $category->fill($validatedData)->save();
            return redirect()->route('category.index')->with('success', 'Category has been updated successfully');
        }
        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {

            if ($category->image != "uploads/noimage.jpg")
                Storage::delete($category->image);

            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category has been deleted successfully');
        }
        return redirect()->back();
    }
}
