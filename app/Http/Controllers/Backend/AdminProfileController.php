<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function ViewProfile()
    {

        $id = auth()->user()->id;

        $data = Admin::findorfail($id);
        return view('admin.profile.view_profile', compact('data'));
    }
    public function EditAdmin(request $request)
    {
        $admin_id = $request->admin_id;
        if ($request->file) {
            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profilepic/', $filename);
            admin::findorfail($admin_id)->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'email' => $request->email,
                'profile_photo_path' => $filename,
            ]);
            $notification = array(
                'message' => 'Admin Modifier Avec photo successement',
                'alert-type' => 'success'
            );
        } else {
            admin::findorfail($admin_id)->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'email' => $request->email,

            ]);
            $notification = array(
                'message' => 'Admin Modifier Sans photo successement',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function UpdateadminPassword()
    {
        return view('admin.profile.settings_admin');
    }
    public function UpdatePassword(Request $request)
    {

        $hashedpassword = auth::user()->password;
        if (hash::check($request->old_password, $hashedpassword)) {
            $admin = admin::find(auth::id());
            $admin->password = hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.login.page');
        } else {
            $notification = array(
                'message' => 'les mots de passe ne correspondent pas à cet utilisateur',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
}
