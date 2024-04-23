@extends('app')

@section('content')
    <div class="container-fluid mt-5">

        <h2 class="text-success text-center "> Toutes les tâches inscrites </h2>

        <div class="row justify-content-center">
           @foreach ($tasks->sortBy("id") as $task)

           <div class="col-5 col-md-4 my-2">
                <div class="card mt-3 shadow pull_up h-100 ">
                    <div class="card-body d-flex flex-column justify-content-between align-content-start">

                        <div class="card-tite h5 text-secondary">
                            {{$task->title}}
                        </div>

                        <div class="card-text text-black">
                            {{$task->description}}
                        </div>

                        <div class="btn-group mt-3">
                            <form action="{{url("/status/{$task->id}")}}" methode="get">
                                @csrf
                            
                                <button class="btn btn-success">
                                    Terminer
                                </button>
                            </form>
                            <form action="{{url("/delete/{$task->id}")}}" method="POST">
                             @csrf
                             @method('DELETE')
                                <button class="btn btn-danger">
                                    Supprimer
                                </button>
                            </form>
                            <form action="{{url("modifier/{$task->id}")}}" method="get">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary">
                                    Modifier
                                </a>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
               
           @endforeach
            
          
        </div>

    </div>

@endsection
