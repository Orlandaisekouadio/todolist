@extends('app')

@section('content')
    <div class="container-fluid mt-5">
        <h2 class="text-success text-center "> Toutes les tâches inscrites </h2>
        <div class="row justify-content-center">
           @foreach ($tasks->sortBy(id) as $task)

           <div class="col-5 col-md-4">
                <div class="card mt-3 shadow pull_up ">
                    <div class="card-body">
                        <div class="card-tite h5 text-secondary">
                            {{$task->title}}
                        </div>
                        <div class="card-text text-black">
                            {{$tasks->description}}
                        </div>
                        <div class="btn-group mt-3">
                            <a class="btn btn-success">
                                Terminer
                            </a>
                            <a class="btn btn-danger">
                                Supprimer
                            </a>
                            <a class="btn btn-primary">
                                Modifier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
               
           @endforeach
            
          
        </div>
    </div>
@endsection
