<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Setting extends Model
{
    protected $fillable = [
        'site_name',    'site_logo',    'site_favicon',     'email',    'phone',
        'facebook',     'twitter',      'linkedin',         'vimeo',    'dribbble',
        'behance',      'youtube',      'contract_flow',    'messenger',    'coords',
        'feeds_embed',  'about_us',     'address',          'video',    'banner_image', 
        'map_api_key',  'footer_left',  'footer_right',     'breaking_news_category_id', 
        'meta_description'
    ];

    public static function getEmail() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->email;
        return "this is default email";
    }

    public static function getDescription() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->meta_description;
        return "this is default description";
    }
    public static function getTitle() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->site_name;
        return "this is default title";
    }
    public static function getIcon() {
        if(Setting::where('id',1)->first() !== null)
            return 'images/'.Setting::where('id',1)->first()->site_favicon;
        return "favicon.ico";
    }
    public static function getLogo() {
        if(Setting::where('id',1)->first() !== null)
            return 'images/'.Setting::where('id',1)->first()->site_logo;
        return "img/core-img/logo.png";
    }
    public static function getPhoneNumber() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->phone;
        return "0947467073";
    }
    public static function phoneNumberFormat() {
        if(Setting::where('id',1)->first() !== null)
            $data = Setting::where('id',1)->first()->phone;
        else $data = "0947467073";
        return "(".substr($data, 0, 3).") ".substr($data, 3, 3)." ".substr($data,6);
    }
    public static function getFacebook() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->facebook;
        return "";
    }
    public static function getTwitter() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->twitter;
        return "";
    }
    public static function getYoutube() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->youtube;
        return "";
    }
    public static function getDribbble() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->dribbble;
        return "";
    }
    public static function getBehance() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->behance;
        return "";
    }
    public static function getLinkedin() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->linkedin;
        return "";
    }
    public static function getAddress() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->address;
        return "";
    }
    public static function getMessenger() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->messenger;
        return "";
    }
    public static function getFeeds() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->feeds_embed;
        return "";
    }
    
    public static function getCoords() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->coords;
        return "";
    }
    public static function getMapApiKey() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->map_api_key;
        return "";
    }
    public static function getVideo() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->video;
        return "";
    }
    public static function getBannerImage() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->banner_image;
        return "";
    }
    public static function getLeftFooter() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->footer_left;
        return "";
    }
    public static function getRightFooter() {
        if(Setting::where('id',1)->first() !== null)
            return Setting::where('id',1)->first()->footer_right;
        return "";
    }
    public static function getRandomId() {
        if(Session::has('defaultId')){
            Session::put('defaultId', session('defaultId'));
        }else{
            Session::put('defaultId', rand(100000,1000000));
        }
        return session('defaultId');
    }
}
