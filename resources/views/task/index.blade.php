@extends('app')

@section('content')
<<<<<<< HEAD
    <div class="container-fluid mt-5">

        <h2 class="text-success text-center "> Toutes les tâches inscrites </h2>

        <div class="row justify-content-center">
            @php
                $ide = 1
            @endphp
           @foreach ($tasks->sortBy("id") as $task)

           <div class="col-5 col-md-4 my-2">
                <div class="card mt-3 shadow pull_up h-100 ">
                    <div class="card-body d-flex flex-column justify-content-between align-content-start">

                        <div class="card-tite h5 text-secondary">
                            <span>Titre N°{{$ide}}: </span>{{$task->title}}
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


                            <form action="{{url("/edit/{$task->id}")}}" method="get">
                                @csrf
                                <button class="btn btn-primary">
                                    Modifier
                                </button>
                            </form>
                        </div>

=======
    <div class="container-fluid mt-5 mb-3">
        <h2 class="text-success text-center "> Toutes mes tâches </h2>
        <div class="row justify-content-center">
            @foreach ($tasks as $task)
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
                                <button class="btn btn-success @if ($task->state == 'Terminé') d-none @endif">
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
        <div class="fixed-bottom  mb-3 d-flex justify-content-end style="width: 60px; height: 60px;"">
            <button type="button" class="btn btn-success rounded-circle" data-bs-toggle ="modal"
                data-bs-target = "#modalForm">
                <img src="{{ asset('plus-lg.svg') }}" alt="Nouvelle tache" style="width: 100%; height: 100%;">
            </button>
        </div>
        <div class="modal" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="#formTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="formTitle">
                            <h3 class="text-success">Ajouter une tache</h3>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss = "modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <label class="col-form-label text-dark" for="title">Titre</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description" class="col-form-label text-dark">Description de la tâche</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
>>>>>>> 3d0943eaaa2f6d99764c3cfc4058e2a72643ea36
                    </div>

                </div>

            </div>
            @php
                $ide+= 1 
            @endphp
               
           @endforeach
            
          
        </div>

    </div>

@endsection
