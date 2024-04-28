<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        $users = auth()->user();
        // dd($users->id);


        return view('task.index', compact('tasks','users'));
    }

    public function completedTasks(){
        $tasks = Task::where('state', 'Terminé')->get();
        $users = auth()->user();

        return view('task.completed', compact('tasks','users'));
    }

    public function uncompletedTasks()
    {

        $tasks = Task::where('state', 'En cours')->get();
        $users = auth()->user();

        // dd($uncompleteTasks);
        return view('task.uncompleted', compact('tasks','users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'description'=> 'required',
        ]);
        $user=auth()->user();

        $task = new Task();
        $currentUrl = $request->header("referer");
        dd($currentUrl);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->state = 'En cours';
        $task->user_id = $user->id;
        $task->save();
        return redirect("/home")->with("success","Ajout avec succès");
    }

    public function myTasks(){
        $tasks = Task::all();
        $users = auth()->user();
        return view("task.mytasks", compact("tasks","users"));
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
    public function edit($id,$nb)
    {
        $task = Task::find($id);
        return view('task.modif', compact('task','nb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id,$nb)
    {

        //Validation des champs du formulaire de modification
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'state' => 'required',
        ]);


        $task = Task::find($id);

        //L'envoi à nos attributs du modèle Task
        $task->title = $request->title;
        $task->description = $request->description;
        $task->state = $request->state;

        // Modification vers la bdd
        $task->update();

        if($nb==1){
            return redirect("/home")->with('success', 'Modification réussie');
        }elseif($nb == 2){
            return redirect('/uncompleted')->with('success','Modification réussie');
        } elseif ($nb == 3) {
            return redirect('/completed')->with('success', 'Modification réussie');
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Suppression des tâches
        $task = Task::find($id);
        $task->delete();



        return redirect("/home")->with('success', 'Bien supprimé');
    }

    public function status(string $id,Request $request)
    {
        $task = Task::find($id);

        if ($task->state === "Terminé") {
            $task->state = "En cours";
            $task->save();
            $currentUrl = $request->header("referer");



            return Redirect::to($currentUrl)->with("success", "La tâche est à présent terminée");

        } else {
            $task->state = "Terminé";
            $task->save();
            $currentUrl = $request->header("referer");



            return Redirect::to($currentUrl)->with("success", "La tâche est à présent terminée");

        }
    }
}
