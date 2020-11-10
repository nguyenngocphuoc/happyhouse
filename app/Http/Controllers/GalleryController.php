<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleries = Gallery::get();//where('news_id', $id)->get();

        return view('backend.gallery.upload',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'size'          => 'required',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,jpg,png,gif|max:8000'
        ]);
        if ($request->hasFile('file')) {
            $imageName = 'news-img-'.time().uniqid().'.jp2';
            $request->file->move(public_path('images'), $imageName);
        }else{
            $imageName = "default.png";
        }
        
        $id = Gallery::create([
            'news_id'       => $request->news_id,
            'path'          => $imageName,
            'size'          => $request->size
        ])->id;
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galleries = Gallery::where('news_id', $id)->get();

        return view('backend.gallery.upload',compact('id', 'galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Gallery = Gallery::findOrFail($id);
        $Gallery->delete();
        if(file_exists(public_path('images/') . $Gallery->path)){
            unlink(public_path('images/') . $Gallery->path);
        }
        return 'image deleted successfully!';
    }
}
