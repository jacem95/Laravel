@if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert"> 

        <strong>{{$message}}</strong>
        <button type="button"  class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>

      </div>
@endif 

