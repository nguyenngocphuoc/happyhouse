<?php

namespace App\Http\Controllers;

use App\Category;
use App\GroupCategory;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('groupCategory')->latest()->get();
        $arrGroupCategory = GroupCategory::latest()->get();
        return view('backend.category.index', compact('categories', 'arrGroupCategory'));
    }


    public function create()
    {
        $arrGroupCategory = GroupCategory::latest()->get();
        return view('backend.category.create', compact('arrGroupCategory'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'                 => 'required|unique:categories|max:255',
            'slug'                 => 'required',
            'image'                => 'required|is_img',
            'group_categories_id'  => 'required|max:2'
        ]);

        // if(isset($request->status)){
        //     $status = true;
        // }else{
        //     $status = false;
        // }
        if($request->status == 'on'){
            $status = true;
        }else{
            $status = false;
        }

        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'category-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
        }

        // if ($request->hasFile('image')) {
        //     $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('images'), $imageName);
        // }

        Category::create([
            'name'   => $request->name,
            'slug'   => str_slug($request->slug),
            'image'  => $imageName,
            'status' => $status,
            'group_categories_id' => $request->group_categories_id,
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category created successfully!']);
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $arrGroupCategory = GroupCategory::latest()->get();
        return view('backend.category.edit', compact('category', 'arrGroupCategory'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'                 => 'required|max:255',
            'slug'                 => 'required',
            'image'                => 'is_img',
            'group_categories_id'  => 'required|max:2'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $category = Category::findOrFail($category->id);
        // save new image
        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'category-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
            // delete old images
            if(file_exists(public_path('images/') . $category->image)){
                unlink(public_path('images/') . $category->image);
            }
        }else{
            $imageName = $category->image;
        }

        
        $category->update([
            'name'   => $request->name,
            'slug'   => str_slug($request->slug),
            'image'  => $imageName,
            'status' => $status,
            'group_categories_id' => $request->group_categories_id,
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category updated successfully!']);
    }


    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        if(!isset($category)) 
            return back()->withErrors(['message' => 'Category delete failed']);
        Category::deleteCategory($category);
        return back()->with(['message' => 'Category deleted successfully!']);
    }
}
