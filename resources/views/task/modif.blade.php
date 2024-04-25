@extends('edit')

@section('content_edit')
    <div class="container text-center" style="margin-top: 60px; width:60%;">
       
      <div class="row">

        <h1>MODIFICATION D'UNE TACHE</h1>

        <hr>
           <div class="col s12">
           <form action="{{url("/update/{$task->id}/{$nb}")}}" method="post">
                @csrf
                <input type="text" name="id" style = "display:none" value="{{$task->id}}">
                <div class="form-group mb-3">
                    <label for="nom" class="form-label">Nom de la tâche</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le nom de la tâche" value="{{$task->title }}">
                </div>  

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Entrez sa description">{{$task->description}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="state" class="form-label">Statut de la tâche</label>
                        @if ($task->state==='Terminé')
                        <select name="state" id="state" class="form-select">
                            <option value="En cours">En cours</option>
                            <option value="Terminé" selected>Terminée</option>
                        </select>
                        
                        @else
                        <select name="state" id="state" class="form-select">
                            <option value="En cours" selected>En cours</option>
                            <option value="Terminé">Terminée</option>
                        </select>
                        
                        @endif
             
             
                </div>

                    <br>

                    <button type="submit" class= "btn btn-primary">MODIFIEZ</button>

                <br> 
          </form>
          <br>

          <a href="{{url("/home")}}"class= "btn btn-danger">Revenir à la liste</a>    
       </div>
                

              


      </div>
  </div>
    



@endsection