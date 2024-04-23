@extends('app')

@section('content')
    <div class="container-fluid mt-5">
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
        <div class="fixed-bottom me-3 mb-3 d-flex justify-content-end ">
            <button type="button" class="btn btn-success rounded-circle" style="width: 60px; height: 60px;"
                data-toggle ="modal" data-target = "#modalForm">
                <img src="{{ asset('plus-lg.svg') }}" alt="Nouvelle tache" style="width: 100%; height: 100%;">
            </button>
        </div>
        <div class="modal" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="#formTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="formTitle">
                            <h3 class="text-success">Ajouter une tache</h3>
                            <button type="button" class="close" data-dismiss = "modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <label class="form-label" for="title">Titre</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Description de la tâche</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
