
    <div>
    <div class="row">

        <div class="col-10">
            <div class="articles row justify-content-center">
            @dump($activeFilters)
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
</div>

   <div class="col-2 pt-3">
       @foreach ($categories as $category)
           <div class="form-group">
               <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="{{$category->id}}" wire:model="activeFilters.{{$category->id}}"/>
                   <label class="custom-control-label" for ="{{ $category->id }}">
                       <i class="fas fa-{{$category->icon }}"></i>
                       {{$category ->label}}
                   </label>
               </div>
           </div>
       @endforeach
   </div>
   {{-- <div class="d-flex justify-content-center mt-5">
   {{$articles->links('vendor.pagination.custom')}}
   </div> --}}
   </div>
</div>
</div>
