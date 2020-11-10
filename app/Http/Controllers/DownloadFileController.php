<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DownloadFile;
class DownloadFileController extends Controller
{
    public function index()
    {
        $download_files = DownloadFile::latest()->get();
        return view('backend.download_file.index', compact('download_files'));
    }


    public function create()
    {
        return view('backend.download_file.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image'              => 'required',
            'title'                 => 'required|max:255',
            'file'                => 'required',
        ]);
        if (strlen($request->image) > 0) {
            $imageName = time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('file'), $imageName);
        }elseif(Setting::where('id',1)->first() !== null){
            $imageName = Setting::where('id',1)->first()->image;
        }else{
            $imageName = 'default.mp4';
        }

        if ($request->hasFile('file')) {
            $file = time().uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('file'), $file);
        }elseif(Setting::where('id',1)->first() !== null){
            $file = Setting::where('id',1)->first()->file;
        }else{
            $file = 'default.mp4';
        }

        DownloadFile::create([
            'image'              => $imageName,
            'title'                 => $request->title,
            'file'                => $file
        ]);

        return redirect()->back()->with(['message' => 'download_file created successfully!']);
    }

    public function getById($image)
    {
        $download_files = DownloadFile::latest()->where('image', $image)->get();
        return view('backend.download_file.index', compact('download_files', 'image'));
    }

    public function show($image)
    {
        $download_files = DownloadFile::findOrFail($image);
        return view('backend.download_file.index', compact('download_files', 'image'));
    }


    public function edit(DownloadFile $download_file)
    {
        $download_file = DownloadFile::findOrFail($download_file->id);
        return view('backend.download_file.edit', compact('download_file'));
    }


    public function update(Request $request, DownloadFile $download_file)
    {
        $request->validate([
            'title'                 => 'required|max:255',
        ]);

        $download_file = DownloadFile::findOrFail($download_file->id);
        if (strlen($request->image) > 0) {

            $image_array_1 = explode(";", $request->image);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'news-'. time().uniqid(). '.jp2';

            file_put_contents(public_path('images/').$imageName, $data);
        }

        if ($request->hasFile('file')) {
            $file = 'download_file/'.$name.'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('file'), $file);
        }elseif(Setting::where('id',1)->first() !== null){
            $file = Setting::where('id',1)->first()->file;
        }else{
            $file = 'default.mp4';
        }

        $download_file->update([
            'image'              => $imageName,
            'title'                 => $request->title,
            'file'                => $file
        ]);
        return redirect()->back()->with(['message' => 'download_file updated successfully!']);
    }


    public function destroy(DownloadFile $download_file)
    {
        $download_file = DownloadFile::findOrFail($download_file->id);
        // delete old images
        if(file_exists(public_path('file/') . $download_file->image)){
            unlink(public_path('file/') . $download_file->image);
        }
        // delete old images
        if(file_exists(public_path('file/') . $download_file->file)){
            unlink(public_path('file/') . $download_file->file);
        }
        if(!isset($download_file)) 
            return back()->withErrors(['message' => 'download_file delete failed']);
        $download_file->delete();
        return back()->with(['message' => 'download_file deleted successfully!']);
    }
}
