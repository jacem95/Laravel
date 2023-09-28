@extends('base')

@section('content')

        <h1 class="display-3 text-center">Articles</h1>
        @livewire('filters',['categories'=>$categories])

@endsection