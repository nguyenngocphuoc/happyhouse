<?php

namespace App\Http\Controllers;

use App\InfoSubmit;
use App\GroupCategory;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InfoSubmitController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index()
    {
        $listInfoSubmit = InfoSubmit::latest()->with('news')->get();
        return view('backend.info_submit.index', compact('listInfoSubmit'));
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'max:255',
            'message'        => 'required',
            'orders'         => 'required',
            'phone'          => 'required|string|min:1|max:15',
            'address'        => 'max:255',
            'appoinment'     => 'after:'.date(DATE_ATOM, time() + (5 * 60 * 60)),
        ]);

        $infoSubmit = InfoSubmit::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'message'       => $request->message,
            'phone'         => $request->phone,
            'orders'        => $request->orders,
            'appoinment'    => $request->appoinment,
            'order_code'    => uniqid()
        ]);
        return redirect()->back()->with(['message' => config('properties.text.info_submit_success')]);
    }
    
    public function show(InfoSubmit $infoSubmit)
    {
        $info = InfoSubmit::with('news')->findOrFail($infoSubmit->id);
        $news = News::latest()->get();
        return view('backend.info_submit.detail', compact('info', 'news'));
    }
    public function destroy(InfoSubmit $infoSubmit)
    {
        $infoSubmit = InfoSubmit::findOrFail($infoSubmit->id);

        // if(file_exists(public_path('images/') . $group_category->image)){
        //     unlink(public_path('images/') . $group_category->image);
        // }

        $infoSubmit->delete();

        return back()->with(['message' => 'Info deleted successfully!']);
    }

    public function update(Request $request, InfoSubmit $infoSubmit)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'max:255',
            'message'        => 'required',
            'phone'          => 'required|string|min:1|max:15',
            'orders'         => 'required',
            'note'           => 'nullable',
            'order_code'     => 'required',
            'appoinment'     => 'after:'.date(DATE_ATOM, time() + (5 * 60 * 60))
        ]);
        if(isset($request->star)){
            $star = true;
        }else{
            $star = false;
        }
        $infoSubmit = InfoSubmit::findOrFail($infoSubmit->id);
        $infoSubmit->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'message'       => $request->message,
            'phone'         => $request->phone,
            'orders'        => $request->orders,
            'star'          => $star,
            'note'          => $request->note,
            'order_code'    => $request->order_code,
            'appoinment'    => $request->appoinment,
            'stage'         => $request->stage,
        ]);
        return redirect()->route('admin.info-submit.index')->with(['message' => 'successfully!']);
    }


    public function readed($id)
    {
        $infoSubmit = InfoSubmit::whereId($id)->update([
            'status'        => 1
        ]);
        return 'successfully!';
    }

    public function unreadedNotify()
    {
        return view('backend.layout.partials.notify');
    }


}
