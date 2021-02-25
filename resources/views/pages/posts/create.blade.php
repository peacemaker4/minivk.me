@extends('layouts.app')

@section('content')
    @include('components.create-form', ['post'=>$post??null])
@endsection
