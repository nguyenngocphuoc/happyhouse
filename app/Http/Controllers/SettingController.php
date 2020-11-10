<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id',1)->first();

        return view('backend.settings.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name'         => 'required|max:250',
            'meta_description'  => 'required',
            'site_logo'         => 'nullable|image',
            'site_favicon'      => 'nullable',
            'email'             => 'required|max:250',
            'facebook'          => 'nullable|url',
            'twitter'           => 'nullable|url',
            'linkedin'          => 'nullable|url',
            'dribbble'          => 'nullable|url',
            'behance'           => 'nullable|url',
            'vimeo'             => 'nullable|url',
            'youtube'           => 'nullable|url',
            'contract_flow'     => 'nullable',
            'messenger'         => 'nullable',
            'feeds_embed'       => 'nullable',
            'video'             => 'nullable',
            'banner_image'      => 'nullable',
            'map_api_key'       => 'nullable',
            'footer_left'       => 'nullable',
            'footer_right'      => 'nullable',
            'coords'            => 'nullable',
        ]);
        $setting = new Setting();
        $name = round(microtime(true) * 1000) . '';
        if ($request->hasFile('site_logo')) {
            $site_logo = 'logo'.$name.'.'.$request->site_logo->getClientOriginalExtension();
            $request->site_logo->move(public_path('images'), $site_logo);
        }elseif(Setting::where('id',1)->first() !== null){
            $site_logo = Setting::where('id',1)->first()->site_logo;
        }else{
            $site_logo = 'logo.png';
        }

        if ($request->hasFile('site_favicon')) {
            $site_favicon = 'favicon'.$name.'.'.$request->site_favicon->getClientOriginalExtension();
            $request->site_favicon->move(public_path('images'), $site_favicon);
        }elseif(Setting::where('id',1)->first() !== null){
            $site_favicon = Setting::where('id',1)->first()->site_favicon;
        }else{
            $site_favicon = 'favicon.ico';
        }

        if ($request->hasFile('video')) {
            $video = 'video'.$name.'.'.$request->video->getClientOriginalExtension();
            $request->video->move(public_path('video'), $video);
        }elseif(Setting::where('id',1)->first() !== null){
            $video = Setting::where('id',1)->first()->video;
        }else{
            $video = 'default.mp4';
        }
        if ($request->hasFile('banner_image')) {
            $banner_image = 'banner_image'.$name.'.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('images'), $banner_image);
        }elseif(Setting::where('id',1)->first() !== null){
            $banner_image = Setting::where('id',1)->first()->banner_image;
        }else{
            $banner_image = 'hero-bg0.jpg';
        }
        $first = Setting::where('id',1)->first();
        if($first === null){
            DB::table('settings')->insert(
                [
                'id'            => 1,
                'site_name'     => $request->site_name,
                'site_logo'     => $site_logo,
                'site_favicon'  => $site_favicon,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'linkedin'      => $request->linkedin,
                'vimeo'         => $request->vimeo,
                'dribbble'      => $request->dribbble,
                'behance'       => $request->behance,
                'youtube'       => $request->youtube,
                'about_us'      => $request->about_us,
                'address'       => $request->address,
                'contract_flow' => $request->contract_flow,
                'meta_description'      => $request->meta_description,
                'messenger'             => $request->messenger,
                'feeds_embed'           => $request->feeds_embed,
                'video'                 => $video,
                'banner_image'          => $banner_image,
                'map_api_key'           => $request->map_api_key,
                'footer_left'           => $request->footer_left,
                'footer_right'          => $request->footer_right,
                'coords'                => $request->coords
                ]
            );
        }else {
            $setting->updateOrCreate(['id' => 1],
            [
                'site_name'     => $request->site_name,
                'site_logo'     => $site_logo,
                'site_favicon'  => $site_favicon,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'linkedin'      => $request->linkedin,
                'vimeo'         => $request->vimeo,
                'dribbble'      => $request->dribbble,
                'behance'       => $request->behance,
                'youtube'       => $request->youtube,
                'about_us'      => $request->about_us,
                'address'       => $request->address,
                'contract_flow' => $request->contract_flow,
                'meta_description'      => $request->meta_description,
                'messenger'             => $request->messenger,
                'feeds_embed'             => $request->feeds_embed,
                'video'                 => $video,
                'banner_image'          => $banner_image,
                'map_api_key'           => $request->map_api_key,
                'footer_left'           => $request->footer_left,
                'footer_right'          => $request->footer_right,
                'coords'                => $request->coords
            ]
          );
        }


        $notification = array(
            'message'    => 'Settings updated successfully !'
        );
        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl . "#" .  $request->tab)->with('success', 'Setting updated successfully.')->with($notification);
    }


}
