<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Status;
use App\News;
class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::latest()->get();
        return view('backend.status.index', compact('statuses'));
    }


    public function create()
    {
        return view('backend.status.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:status|max:255',
            'color'         => 'required'
        ]);

        if($request->status == 'on'){
            $status = true;
        }else{
            $status = false;
        }

        Status::create([
            'name'   => $request->name,
            'color'   => $request->color,
            'status' => $status
        ]);

        return redirect()->route('admin.status.index')->with(['message' => 'Status created successfully!']);
    }


    public function show(Status $Status)
    {
        //
    }


    public function edit(Status $Status)
    {
        $status = Status::findOrFail($Status->id);
        return view('backend.status.edit', compact('status'));
    }


    public function update(Request $request, Status $Status)
    {
        $request->validate([
            'name'                 => 'required|max:255',
            'color'         => 'required'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $Status = Status::findOrFail($Status->id);

        $Status->update([
            'name'   => $request->name,
            'color'   => $request->color,
            'status' => $status,
        ]);

        return redirect()->route('admin.status.index')->with(['message' => 'Status updated successfully!']);
    }


    public function destroy(Status $Status)
    {
        $Status = Status::findOrFail($Status->id);
        if(!isset($Status)) 
            return back()->withErrors(['message' => 'Status delete failed']);
        Status::deleteStatus($Status);
        return back()->with(['message' => 'Status deleted successfully!']);
    }
}
