@extends('app')
@section('content')
    <div class="container-fluid mt-5">
        <h2 class="text-success text-center "> Tâches en cours </h2>
        <div class="row justify-content-center">
            @foreach ($uncompleteTasks as $task)
                <div class="col-5 col-md-4 my-2">
                    <div class="card mt-3 mx-2 shadow pull_up h-100 ">
                        <div class="card-body d-flex flex-column justify-content-between align-content-start">
                            <div class="card-tite h5 text-secondary">
                                {{ $task->title }}
                            </div>
                            <div class="card-text text-black">
                                {{ $task->description }}
                            </div>
                            <div class="btn-group mt-3">
                                <button class="btn btn-success">
                                    Terminer
                                </button>
                                <button class="btn btn-danger">
                                    Supprimer
                                </button>
                                <button class="btn btn-primary">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
