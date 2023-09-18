@extends('base')

@section('content')
<div class="jumbotron">
<h1 class="display-3 text-center">Articles</h1>
<div class="articles row justify-content-center">
@foreach ($articles as $article)
    <div class="col-md-6">
        <div class="card my-3">
            <div class="card-cody">
            <h5 class="card-title">{{$article->title}}</h5>

            <div class="d-flex justify-content-center">
                <span class="badge bg-dark">{{$article->category->label}}</span>
                </div>

            <p class="card-text">{{$article->subtitle}}</p>
            <a href="{{route('article', $article->slug)}}" class="btn btn-primary">
                Lire la suite
                <i class="fas fa-arrow-right"></i>
  
            </a>
        </div>
    </div>

        </div>
@endforeach
</div>
<div class="d-flex justify-content-center mt-5">
{{$articles->links('vendor.pagination.custom')}}
</div>
</div>

@endsection