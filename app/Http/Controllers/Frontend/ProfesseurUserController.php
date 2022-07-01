<?php

namespace App\Http\Controllers\Frontend;

use  Carbon\Carbon;
use App\Models\user_tp;
use App\Models\modules;
use App\Models\modules_tp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\professeur;

class ProfesseurUserController extends Controller
{
    public function Alltps()
    {
        $data = modules_tp::latest()->get();
        return view('professeur.devoirs_list', compact('data'));
    }
    public function EditDevoir($id)
    {
        $data = modules::with('prof')->latest()->get();
        $devoirs = modules_tp::findorfail($id);
        // get module id so i can show it in the select 
        $modules_id = modules_tp::findorfail($id);
        $modulename = modules::where('id', $modules_id->id_module)->first();
        // 
        return view('professeur.devoir_edit', compact('data', 'devoirs', 'modulename'));
    }
    public function ModifyDevoir(request $request)
    {

        $devoir_id = $request->devoir_id;
        $prof = modules::findorfail($request->module);
        $prof_id = $prof->id_professeur;
        // updating with a new file 
        if ($request->file) {

            $file = $request->file;
            // removes the old file
            $oldfile = modules_tp::findorfail($devoir_id);
            @unlink(public_path('upload/devoirs/' . $oldfile->fichier));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/devoirs/', $filename);
            modules_tp::findorfail($devoir_id)->update([
                'nom_tp' => $request->nom_tp,
                'description' => $request->description,
                'id_module' => $request->module,
                'date_limite' => $request->date_limite,
                'fichier' => $filename,
                'id_professeur' => $prof_id,
                'updated_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Devoirs Ajoute successement Avec le fichier ',
                'alert-type' => 'success',
            );
        } else {
            // updatinng without a file 
            modules_tp::findorfail($devoir_id)->update([
                'nom_tp' => $request->nom_tp,
                'description' => $request->description,
                'id_module' => $request->module,
                'date_limite' => $request->date_limite,
                'id_professeur' => $prof_id,
                'updated_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Devoirs Ajoute SANS fichier ',
                'alert-type' => 'info',
            );
        }
        return redirect()->route('prof.devoirs')->with($notification);
    }
    public function DeleteDevoir($id)
    {
        user_tp::where('id_module_tp', $id)->delete();

        $oldfile = modules_tp::findorfail($id);
        @unlink(public_path('upload/devoirs/' . $oldfile->fichier));
        modules_tp::findorfail($id)->delete();
        $notification = array(
            'message' => 'devoir supprimer successement',
            'alert-type' => 'success'
        );
        return redirect()->route('prof.devoirs')->with($notification);
    }
    public function AjouteDevoir()
    {
        $data = modules::with('prof')->latest()->get();
        return view('professeur.ajoute_devoir', compact('data'));
    }
    //save tp 
    public function SaveDevoir(request $request)
    {
        $prof = modules::findorfail($request->module);
        $prof_id = $prof->id_professeur;
        if ($request->file) {

            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/devoirs/', $filename);
            modules_tp::insert([
                'nom_tp' => $request->nom_tp,
                'description' => $request->description,
                'id_module' => $request->module,
                'date_limite' => $request->date_limite,
                'fichier' => $filename,
                'id_professeur' => $prof_id,
                'created_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Devoirs Ajoute successement Avec le fichier ',
                'alert-type' => 'success'
            );
            return redirect()->route('prof.devoirs')->with($notification);
        }
    }
    public function Allremises()
    {
        $id = auth()->user()->id;
        $data = user_tp::with('remises', 'userinfo')->latest()->get();
        $response = [];
        foreach ($data as $row) {
            if ($row->remises->id_professeur == $id) {
                array_push($response, $row);
            }
        }

        return view('professeur.list_remises', compact('response'));
    }
    public function Profprofile()
    {
        $id = auth()->user()->id;
        $data = professeur::find($id);
        return view('professeur.myprofile', compact('data'));
    }
    public function Updateprofessor(request $request)
    {
        $prof_id  = $request->professeur_id;
        if ($request->file) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profilepic/', $filename);
            professeur::findorfail($prof_id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
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
            professeur::findorfail($prof_id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
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
        return redirect()->route('prof.devoirs')->with($notification);
    }
    public function ProfSettings()
    {
        return view('professeur.settings_professeur');
    }
    public function ProfChangePw(request $request)
    {
        $hashedpassword = auth::user()->password;
        if (hash::check($request->old_password, $hashedpassword)) {
            $professeur = professeur::find(auth::id());
            $professeur->password = hash::make($request->password);
            $professeur->save();
            Auth::logout();
            return redirect()->route('professeur.login.portal');
        } else {
            $notification = array(
                'message' => 'les mots de passe ne correspondent pas à cet utilisateur',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function ProfNote($id, $user_id)
    {

        $datanote = user_tp::findorfail($id)::where('id_user', $user_id)->get();
        return view('professeur.ajoute_note', compact('datanote'));
    }
    public function NoteStore(request $request)
    {
        $user_id = $request->id_user;
        $tp_id = $request->devoir_id;
        if ($request->note <= 20) {
            user_tp::findorfail($tp_id)::where('id_user', $user_id)->update([
                'note' => $request->note,
                'commentaire' => $request->commentaire,
            ]);
            $notification = array(
                'message' => 'vous avez noté cet tp avec succès',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'vous ne pouvez pas dépasser la note 20 ! ',
                'alert-type' => 'info'
            );
        }
        return redirect()->route('remise.page')->with($notification);
    }
    public function AllprofTpsAJax()
    {
        $id = auth()->user()->id;
        $data = modules_tp::where('id_professeur', $id)->get();
        return response()->json(array(
            'data' => $data,

        ));
    }
}
