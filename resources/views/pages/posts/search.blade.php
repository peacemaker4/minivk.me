@extends('layouts.app')

@section('content')
    <p class="text-muted">Search result:</p>

    @component('components.post-list',[
    'posts'=>$posts
    ])
    @endcomponent

@endsection
