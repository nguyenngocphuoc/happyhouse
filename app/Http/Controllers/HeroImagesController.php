<?php

namespace App\Http\Controllers;
use App\Category;
use App\HeroImages;
use App\ReWork;
use Illuminate\Http\Request;

class HeroImagesController extends Controller
{

    public function index()
    {
        // $listReWorks = ReWork::with('category')->latest()->get();
        $listHeroImages = HeroImages::select('*')->get();
        return view('backend.hero_images.index', compact('listHeroImages'));
    }


    public function create()
    {
        return view('backend.hero_images.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image'    => 'required|is_img'
        ]);

        $status = ($request->status == null) ? 0 : 1;
        $title = ($request->title == null) ? '' : $request->title;

        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'heroImg-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
        }

        HeroImages::create([
            'title'         => $title,
            'status'        => $status,
            'image'         => $imageName
        ]);

        return redirect()->route('admin.hero-images.index')->with(['message' => 'Tạo thành công!']);
    }


    public function edit($id)
    {
        $hero    = HeroImages::where("id",$id)->first();
        return view('backend.hero_images.edit', compact('hero'));
    }

 
    public function update(Request $request, $id)
    {
        $hero = HeroImages::findOrFail($id);
        $status = ($request->status == null) ? 0 : 1;
        $title = ($request->title == null) ? '' : $request->title;
        // save new images
        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'heroImg-'. time().uniqid(). '.png';

            file_put_contents(public_path('images/').$imageName, $data);
            // delete old images
            if(file_exists(public_path('images/') . $hero->image)){
                unlink(public_path('images/') . $hero->image);
            }
        }else{
            $imageName = $hero->image;
        }

        $hero->update([
            'title'         => $title,
            'status'        => $status,
            'image'         => $imageName
        ]);

        return redirect()->route('admin.hero-images.index')->with(['message' => 'Chỉnh sửa thành công!']);
    }

 
    public function destroy($id)
    {
        $heros = HeroImages::findOrFail($id);

        if(file_exists(public_path('images/') . $heros->image)){
            unlink(public_path('images/') . $heros->image);
        }
        $heros->delete();
        return back()->with(['message' => 'Xóa thành công!']);
    }
}
