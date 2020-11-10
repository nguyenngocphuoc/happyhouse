<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\District;
use App\News;
class MapController extends Controller
{
    public function index()
    {
        $maps = Map::with('district')->latest()->get();
        $arrDistrict = District::latest()->get();
        return view('backend.map.index', compact('maps', 'arrDistrict'));
    }


    public function create()
    {
        $shapes = config('properties.shapes');
        $arrDistrict = District::latest()->get();
        return view('backend.map.create', compact('arrDistrict', 'shapes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'coords'                 => 'required|unique:map',
            'shape' => 'required',
            'district_id'        => 'required|max:2'
        ]);

        Map::create([
            'coords'   => $request->coords,
            'shape' => $request->shape,
            'district_id' => $request->district_id,
        ]);

        return redirect()->route('admin.map.index')->with(['message' => 'Map created successfully!']);
    }


    public function show(Map $Map)
    {
        //
    }


    public function edit(Map $Map)
    {
        $map = Map::findOrFail($Map->id);
        $arrDistrict = District::latest()->get();
        $shapes = config('properties.shapes');
        return view('backend.map.edit', compact('map', 'arrDistrict', 'shapes'));
    }


    public function update(Request $request, Map $Map)
    {
        $request->validate([
            'coords'                 => 'required',
            'shape' => 'required',
            'district_id'  => 'required|max:2'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $Map = Map::findOrFail($Map->id);

        $Map->update([
            'coords'   => $request->coords,
            'shape' => $request->shape,
            'district_id' => $request->district_id,
        ]);

        return redirect()->route('admin.map.index')->with(['message' => 'Map updated successfully!']);
    }


    public function destroy(Map $Map)
    {
        $Map = Map::findOrFail($Map->id);
        if(!isset($Map)) 
            return back()->withErrors(['message' => 'Map delete failed']);
        Map::deleteMap($Map);
        return back()->with(['message' => 'Map deleted successfully!']);
    }
}
