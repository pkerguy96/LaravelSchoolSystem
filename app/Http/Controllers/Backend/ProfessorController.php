<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Hash;
use  Carbon\Carbon;
use App\Models\professeur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // all professor methodes here 
    // view professors 
    public function ViewProfessors()
    {
        $professors = professeur::latest()->get();
        return view('admin.professor.professeur_list', compact('professors'));
    }

    // add professor page route 
    public function AddProfessor()
    {
        return view('admin.professor.add_professor');
    }
    public function SaveProfessor(Request $request)
    {

        professeur::insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'created_at' => carbon::now(),
        ]);
        $notification = array(
            'message' => 'Professeur Ajoute successement',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // edit professor method
    public function EditProfessor($id)
    {
        $data = professeur::findorfail($id);
        return view('admin.professor.edit_professor', compact('data'));
    }
    // modify professor 
    public function ModifyProf(request $request)
    {
        $prof_id = $request->prof_id;
        professeur::findorfail($prof_id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'updated_at' => carbon::now(),
        ]);
        $notification = array(
            'message' => 'Professeur Modifier successement',
            'alert-type' => 'success'
        );
        return redirect()->route('professor.list')->with($notification);
    }
    // delete professor method
    public function DeleteProfessor($id)
    {
        professeur::findorfail($id)->delete();
        $notification = array(
            'message' => 'Professeur supprime successement',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
