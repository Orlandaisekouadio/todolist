<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.modif', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Mis à jour (traitement de la modification)
        $task = Task::find($id);
        //Validation des champs du formulaire de modification
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'state' => 'required'
        ]);
        
        //L'envoi à nos attributs du modèle Task
        $task->title = $request->title;
        $task->description = $request->description;
        $task->state = $request->state;

        // Modification vers la bdd
        $task->update();

        return redirect("/home")->with('success','Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Suppression des tâches 
        $task = Task::find($id);
        $task->delete();
        return redirect("/home")->with('success','Bien supprimé');
    }

    public function status(string $id){
        $task = Task::find($id);
        if ($task->state==="Terminé") {
            $task->state= "En cours";
            $task->save();
            return redirect("/home")->with("success","La tâche est toujours en cours");
        } else {
            $task->state= "Terminé";
            $task->save();
            return redirect("/home")->with("success","La tâche est à présent terminée");
        }
    }
}
