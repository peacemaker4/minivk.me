@extends('layouts.app')
@section('content')

    <!--Add posts-->

    <nav class="navbar navbar-light bg-light rounded">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-folder-plus"></i>
            </button>
            <span>Create post</span>
        </div>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-light text-black p-4 rounded">
            <div class="md:mt-0 md:col-span-2">
                @include('components.create-form')
            </div>
        </div>
    </div>


    <!--Add posts-->
    @component('components.post-list', ['posts'=>$posts])@endcomponent

@endsection
