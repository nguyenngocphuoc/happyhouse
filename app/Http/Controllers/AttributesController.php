<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Attributes;
class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attributes::latest()->get();
        return view('backend.attribute.index', compact('attributes'));
    }


    public function create()
    {
        return view('backend.attribute.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'news_id'              => 'required',
            'name'                 => 'required|unique:attributes|max:255',
            'value'                => 'required',
        ]);

        Attributes::create([
            'news_id'              => $request->news_id,
            'name'                 => $request->name,
            'value'                => $request->value
        ]);

        return redirect()->back()->with(['message' => 'attribute created successfully!']);
    }

    public function getById($news_id)
    {
        $attributes = Attributes::latest()->where('news_id', $news_id)->get();
        return view('backend.attribute.index', compact('attributes', 'news_id'));
    }

    public function show($news_id)
    {
        $attributes = Attributes::latest()->where('news_id', $news_id)->get();
        return view('backend.attribute.index', compact('attributes', 'news_id'));
    }


    public function edit(attribute $attribute)
    {
        $attribute = Attributes::findOrFail($attribute->id);
        return view('backend.attribute.edit', compact('attribute'));
    }


    public function update(Request $request, attribute $attribute)
    {
        $request->validate([
            'news_id'              => 'required',
            'name'                 => 'required|max:255',
            'value'         => 'required'
        ]);

        $attribute = Attributes::findOrFail($attribute->id);

        $attribute->update([
            'news_id'   => $request->news_id,
            'name'   => $request->name,
            'value'   => $request->value,
        ]);
        return redirect()->back()->with(['message' => 'attribute updated successfully!']);
    }


    public function destroy(Attributes $attribute)
    {
        $attribute = Attributes::findOrFail($attribute->id);
        if(!isset($attribute)) 
            return back()->withErrors(['message' => 'attribute delete failed']);
        $attribute->delete();
        return back()->with(['message' => 'attribute deleted successfully!']);
    }
}
