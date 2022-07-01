<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_module;
use App\Models\user_tp;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    // view etudients 
    public function ListEtudient()
    {
        $users = user::latest()->get();
        return view('admin.etudient.etudient_list', compact('users'));
    }
    public function AjouteEtudiant()
    {
        return view('admin.etudient.cree_etudient');
    }
    public function AddStudent(request $request)
    {
        user::insert([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'email' => $request->email,
            'password' => hash::make($request->password),

        ]);
        $notification = array(
            'message' => 'Etudient Ajoute successement',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DeleteStudent($id)
    {
        user_tp::where('id_user', $id)->delete();
        user_module::where('user_id', $id)->delete();
        user::findorfail($id)->delete();
        $notification = array(
            'message' => 'Etudient supprime successement',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Student edit page method
    public function EditStudentPage($id)
    {
        $data = user::findorfail($id);
        return view('admin.etudient.modifier_etudient', compact('data'));
    }
    // Save student edit data 
    public function SaveStudent(request $request)
    {
        $student_id = $request->student_id;
        user::findorfail($student_id)->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);
        $notification = array(
            'message' => 'Etudient Modifier successement',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
