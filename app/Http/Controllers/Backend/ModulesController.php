<?php

namespace App\Http\Controllers\Backend;

use  Carbon\Carbon;

use App\Models\modules;
use App\Http\Controllers\Controller;
use App\Models\modules_tp;
use App\Models\professeur;
use App\Models\user_module;
use App\Models\user_tp;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    // view all modules
    public function ViewModules()
    {
        $data = modules::with('prof')->latest()->get();
        return view('admin.modules.list_modules', compact('data'));
    }
    // add module page 
    public function Addmodules()
    {
        $prof = professeur::latest()->get();
        return view('admin.modules.add_modules', compact('prof'));
    }
    // save modules
    public function SaveModules(Request $request)
    {
        modules::insert([
            'code_unique' => $request->code_unique,
            'nom_module' => $request->nom_module,
            'id_professeur' => $request->id_professeur,
            'description' => $request->description,
            'created_at' => carbon::now(),


        ]);
        $notification = array(
            'message' => 'Module Ajoute successement',
            'alert-type' => 'success'
        );
        return redirect()->route('module.list')->with($notification);
    }
    // edit module
    public function EditModule($id)
    {
        $prof = professeur::latest()->get();
        $data = modules::findorfail($id);
        return view('admin.modules.edit_modules', compact('data', 'prof'));
    }
    // moify modules
    public function ModifyModules(request $request)
    {
        $module_id = $request->module_id;
        modules::findorfail($module_id)->update([
            'code_unique' => $request->code_unique,
            'nom_module' => $request->nom_module,
            'id_professeur' => $request->id_professeur,
            'description' => $request->description,
            'updated_at' => carbon::now(),
        ]);
        $notification = array(
            'message' => 'Module Modifier successement',
            'alert-type' => 'success'
        );
        return redirect()->route('module.list')->with($notification);
    }
    // delete module 
    public function DeleteModule($id)
    {
        $test  = modules_tp::where('id_module', $id)->get();
        foreach ($test as $row) {
            $sex = user_tp::where('id_module_tp', $row->id)->delete();
        }


        user_module::where('module_id', $id)->delete();
        modules_tp::where('id_module', $id)->delete();
        modules::findorfail($id)->delete();
        $notification = array(
            'message' => 'Module supprimer successement',
            'alert-type' => 'success'
        );
        return redirect()->route('module.list')->with($notification);
    }
    public function AlltpsGetAjax()
    {
        $data = modules_tp::latest()->get();
        return response()->json(array(
            'data' => $data,

        ));
    }
}
