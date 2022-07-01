<?php

namespace App\Http\Controllers\Frontend;

use  Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modules;
use App\Models\modules_tp;
use App\Models\user_tp;
use App\Models\User;
use App\Models\user_module;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class EtudiantController extends Controller
{
    public function EtudiantProfile()
    {
        $user_id = Auth::user()->id;
        $user_info = user::findorfail($user_id);
        return view('etudiants.profile_etudiant', compact('user_info'));
    }
    public function ModifierEtudiant(request $request)
    {
        $user_id  = $request->user_id;
        if ($request->file) {

            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profilepic/', $filename);
            user::findorfail($user_id)->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'email' => $request->email,
                'profile_photo_path' => $filename,
                'updated_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Le profile Modifier successement avec image',
                'alert-type' => 'success'
            );
        } else {
            user::findorfail($user_id)->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'email' => $request->email,

                'updated_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Le profile Modifier successement SANS image',
                'alert-type' => 'info'
            );
        }
        return redirect()->route('dashboard')->with($notification);
    }
    public function EtudiantSettings()
    {
        return view('etudiants.etudiant_settings');
    }
    public function Changermdp(Request $request)
    {
        $hashedpassword = auth::user()->password;
        if (hash::check($request->old_password, $hashedpassword)) {
            $professeur = user::find(auth::id());
            $professeur->password = hash::make($request->password);
            $professeur->save();
            Auth::logout();
            return redirect()->route('userlogin');
        } else {
            $notification = array(
                'message' => 'les mots de passe ne correspondent pas à cet utilisateur',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function devoirs($id)
    {
        $module_tp = modules_tp::with('moduledata')->where('id_module', $id)->orderby('id', 'desc')->get();
        return view('etudiants.students_devoir', compact('module_tp'));
    }
    public function deposite($id)
    {

        $module_tp = modules_tp::findorfail($id);
        return view('etudiants.list_devoirs', compact('module_tp'));
    }

    public function calendar()
    {
        return view('etudiants.calendar');
    }
    public function AddAnwsers(request $request)
    {
        $student_id = $request->user_id;
        if ($request->file) {
            //
            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/student_tp/', $filename);
            user_tp::insert([
                'id_user' => $student_id,
                'id_module_tp' => $request->module_tp_id,
                'date_depot' => carbon::now(),
                'fichier' => $filename,

                'created_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'votre fichier a été télécharger avec succès',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'veuillez télécharger votre fichier correctement',
                'alert-type' => 'info'
            );
        }
        return redirect()->route('dashboard')->with($notification);
    }
    public function RegisterModule(request $request)
    {
        $userid = $request->user_id;
        $moduleid = $request->module_id;
        user_module::insert([
            'user_id' => $userid,
            'module_id' => $moduleid,
        ]);
        $notification = array(
            'message' => 'enregistré avec succès sur ce module',
            'alert-type' => 'sucess'
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function AllsubscribedModules($id)
    {
        $id = auth()->user()->id;

        $sub_user_modules = user_module::where('user_id', $id)->get();

        $response = [];

        foreach ($sub_user_modules as $row) {
            $moduletp = modules_tp::where('id_module', $row->module_id)->get();
            array_push($response, $moduletp);
        }
        return response()->json(array(
            'data' => $response,

        ));
    }
}
