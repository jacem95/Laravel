@extends('base')

@section('content')
<div class="container">
    
   <h1 class="text-center my-5">Articles</h1>
        <div class="d-flex justify-content-center">
             <a class="btn btn-info my-5" href="{{route('articles.create')}}"><i class="fas fa-plus mx-2"></i>Ajouter un nouvel article</a>
        </div> 
   <table class="table table-hover">
      <thead>
        <tr class='Table-active'>
          <th scope="col">ID</th>
          <th scope="col">Titre</th>
          <th scope="col">Crée le</th>
          <th scope="col">Action </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article )
            <tr>
                <th>{{$article->id}}</th>
                <th>{{$article->title}}</th>
                <th>{{$article->dateformated()}}</th>
                    <td class="d-flex">
                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning mx-3">Editer</a>
                        <?php //on veut les inforlations avec la méthode delete et pas get
                        // donc on crée un formulaire?>
                          <button type="submit" class="btn btn-danger" onclick="document.getElementById('model-open-{{$article->id}}').style.display='block'">Supprimer</button>

                        <form action={{route('articles.destroy',$article->id)}} method="POST">
                          @csrf
                          @method('DELETE')
                          
                            <div class="modal" id="model-open-{{$article->id}}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">La suppression d'un élément est définitif</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('model-open').style.display='none'">
                                      <span aria-hidden="true"></span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Etes-vous sûres de vouloir supprimer cet élément ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Oui</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('model-open-{{$article->id}}').style.display='none'">Annuler</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                        </form>
                  </td>
                    </tr>
        @endforeach
       
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-5">
        {{$articles->links('vendor.pagination.custom')}}
        </div>
   
</div>
@endsection