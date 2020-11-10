<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\News;
class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::latest()->get();
        return view('backend.district.index', compact('districts'));
    }


    public function create()
    {
        return view('backend.district.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'                 => 'required|unique:district|max:255',
            'romanji_name'         => 'required|unique:district|max:255',
            'image'                => 'required|is_img',
        ]);
        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'district-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
        }
        if($request->status == 'on'){
            $status = true;
        }else{
            $status = false;
        }

        District::create([
            'name'          => $request->name,
            'romanji_name'  => $request->romanji_name,
            'image'         => $imageName,
            'status'        => $status
        ]);

        return redirect()->route('admin.district.index')->with(['message' => 'District created successfully!']);
    }


    public function show(District $District)
    {
        //
    }


    public function edit(District $District)
    {
        $district = District::findOrFail($District->id);
        return view('backend.district.edit', compact('district'));
    }


    public function update(Request $request, District $District)
    {
        $request->validate([
            'name'                 => 'required|max:255',
            'romanji_name'         => 'required',
            'image'                => 'is_img'
        ]);
        
        $district = District::findOrFail($District->id);
        
        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }
        // save new images
        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'district-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
            // delete old images
            if(file_exists(public_path('images/') . $district->image)){
                unlink(public_path('images/') . $district->image);
            }
        }else{
            $imageName = $district->image;
        }


        $District->update([
            'name'   => $request->name,
            'romanji_name'   => $request->romanji_name,
            'image'  => $imageName,
            'status' => $status,
        ]);
        return redirect()->route('admin.district.index')->with(['message' => 'District updated successfully!']);
    }


    public function destroy(District $District)
    {
        $District = District::findOrFail($District->id);
        if(!isset($District)) 
            return back()->withErrors(['message' => 'District delete failed']);
        District::deleteDistrict($District);
        return back()->with(['message' => 'District deleted successfully!']);
    }
}
