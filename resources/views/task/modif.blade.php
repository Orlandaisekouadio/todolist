@extends('edit')

@section('content_edit')

   <div class="col s12">

    <form action="{{url("/update/{$task->id}")}}" method="post">
                @csrf
                <input type="text" name="id" style = "display:none" value="{{$task->id}}">
            <div class="form-group">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la tâche" value="{{$task->id }}">
            </div>  

             <div class="form-group">
                 <label for="description" class="form-label">Description</label>
                 <input type="text" class="form-control" id="description" name="description" placeholder="Entrez sa description" value="{{$task->description }}">
             </div>
             <div class="form-group">
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

             <br>

             <a href="{{url("/home")}}"class= "btn btn-danger">Revenir à la liste</a>

             </form>
         </div>   
     </div>
 </div>

@endsection