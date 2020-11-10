<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // $users = User::orderBy('name','desc')->where('role_id','!=',1)->get();
         $users = User::orderBy('name','desc')->get();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'name'        => 'required|string|max:190',
          'email'       => 'required|string|email|max:190|unique:users',
          'password'    => 'required|string|min:6',
          'role_id'     => 'required|numeric',
          'photo'       => 'image|mimes:jpg,png,jpeg',
          'description' => 'required',
          'position'    => 'required'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        if ($request->hasFile('photo')) {
            $imageName = 'user-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $imageName);
        }else{
            $imageName = "default.png";
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role_id'   => $request->role_id,
            'photo'     => $imageName,
            'status'    => $status,
            'description'=> $request->description
        ]);

        return redirect()->route('admin.users.index')->with(['message' => 'User added successfully.']);
    }

    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        $roles = Role::get();
        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'name'      => 'required|string|max:250',
          'email'     => 'required|string|email|max:250',
          'role_id'   => 'required|numeric',
          'photo'     => 'image|mimes:jpg,png,jpeg',
          'description'=> 'required',
          'position'    => 'required'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            if(file_exists(public_path('images/') . $user->photo) && ($user->photo != 'default.png')){
                unlink(public_path('images/') . $user->photo);
            }
            $imageName = 'user-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $imageName);
        }else{
            $imageName = $user->photo;
        }

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'photo'     => $imageName,
            'status'    => $status,
            'description'=> $request->description,
            'position'    => $request->position,
            'facebook'    => $request->facebook, 
            'twitter'     => $request->twitter, 
            'instagram'   => $request->instagram
        ]);

        return redirect()->route('admin.users.index')->with(['message' => 'User updated successfully.']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

       /* if(file_exists(public_path('images/') . $user->photo) && ($user->photo != 'default.png')){
            unlink(public_path('images/') . $user->photo);
        }

        $user->delete();
*/
        $user->update([
            'status'    => 0,
        ]);
        return back()->with(['message' => 'User deleted successfully!']);

    }


}
