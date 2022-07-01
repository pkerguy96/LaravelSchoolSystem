<?php

namespace App\Http\Controllers\Backend;

use App\Models\modules;
use App\Models\modules_tp;
use App\Http\Controllers\Controller;
use App\Models\user_tp;
use Illuminate\Http\Request;
use  Carbon\Carbon;

class DevoirsController extends Controller
{
    public function ListDevoirs()
    {
        $data = modules_tp::latest()->get();
        return view('admin.devoir.list_devoirs', compact('data'));
    }
    // add a tp 
    public function AjouteDevoir()
    {
        $data = modules::with('prof')->latest()->get();
        return view('admin.devoir.add_devoir', compact('data'));
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
            return redirect()->route('list.devoirs')->with($notification);
        }
    }
    public function EditDevoir($id)
    {
        $data = modules::with('prof')->latest()->get();
        $devoirs = modules_tp::findorfail($id);
        // get module id so i can show it in the select 
        $modules_id = modules_tp::findorfail($id);
        $modulename = modules::where('id', $modules_id->id_module)->first();
        // 
        return view('admin.devoir.edit_devoir', compact('data', 'devoirs', 'modulename'));
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
                'alert-type' => 'success'
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
        return redirect()->route('list.devoirs')->with($notification);
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
        return redirect()->route('list.devoirs')->with($notification);
    }
}
