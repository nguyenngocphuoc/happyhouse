<?php

namespace App\Http\Controllers;

use App\GroupCategory;
use Illuminate\Http\Request;

class GroupCategoryController extends Controller
{

    public function index()
    {
        $group_categorys = GroupCategory::latest()->get();

        return view('backend.group_category.index', compact('group_categorys'));
    }


    public function create()
    {
        return view('backend.group_category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:categories|max:255',
            'image'  => 'required|is_img',
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

        // if ($request->hasFile('image')) {
        //     $imageName = 'group-category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('images'), $imageName);
        // }

        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'group-category-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
        }

        GroupCategory::create([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),
            'image'  => $imageName,
            'status' => $status
        ]);

        return redirect()->route('admin.group-category.index')->with(['message' => 'Group Category created successfully!']);
    }


    public function show(GroupCategory $group_category)
    {
        //
    }


    public function edit(GroupCategory $group_category)
    {
        $group_category = GroupCategory::findOrFail($group_category->id);

        return view('backend.group_category.edit', compact('group_category'));
    }


    public function update(Request $request, GroupCategory $group_category)
    {
        $request->validate([
            'name'   => 'required|max:255',
            'image'  => 'is_img',
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $group_category = GroupCategory::findOrFail($group_category->id);

        // if ($request->hasFile('image')) {

        //     if(file_exists(public_path('images/') . $group_category->image)){
        //         unlink(public_path('images/') . $group_category->image);
        //     }

        //     $imageName = 'group-category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('images'), $imageName);

        // }else{
        //     $imageName = $group_category->image;
        // }

        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'group-category-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
        }else{
            $imageName = $group_category->image;
        }

        $group_category->update([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),
            'image'  => $imageName,
            'status' => $status
        ]);

        return redirect()->route('admin.group-category.index')->with(['message' => 'Group Category updated successfully!']);
    }


    public function destroy(GroupCategory $group_category)
    {
        $group_category = GroupCategory::findOrFail($group_category->id);

        if(file_exists(public_path('images/') . $group_category->image)){
            unlink(public_path('images/') . $group_category->image);
        }

        $group_category->delete();

        return back()->with(['message' => 'Group Category deleted successfully!']);
    }
}
