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
                        <a href="#" class="btn btn-warning mx-3">Editer</a>
                        <?php //on veut les inforlations avec la méthode delete et pas get
                        // donc on crée un formulaire?>
                        <form action={{route('articles.delete',$article->id)}} method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Supprimer</button>
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