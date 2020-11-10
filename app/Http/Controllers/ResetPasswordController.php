<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function ressetForm()
    {

        return view('authentication.reset_pass');
    }

    public function checkExist(Request $request)
    {
        $request->validate([
            'email'         => 'required',
            'password'      => 'required',
            'repassword'    => 'required',
            'cupassword'    => 'required'
        ]);

        $emailReq    = $request->email;
        $passwordReq = $request->password;
        $repasswordReq = $request->repassword;
        $cupassword = $request->cupassword;

        if($repasswordReq == $passwordReq) {
            $users = User::select('*')->get();
            foreach ($users as $user) {
                if($user->email == $emailReq) {
                    if(Hash::check($cupassword, $user->password)) {
                        DB::table('users')->where('id',$user->id)->update(["password" => bcrypt($passwordReq)]);
                        return redirect()->route('dashboard')->with(['message' => 'Đổi mật khẩu thành công!!']);
                    } else {
                        return redirect()->route('resetpassword')->with('errorcredentials','Mật khẩu hiện tại chưa chính xác!');
                    }
                }
            } 
        }
       return redirect()->route('resetpassword')->with('errorcredentials','Xác nhận mật khẩu không đúng!');
    }
}