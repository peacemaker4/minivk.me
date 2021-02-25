@extends('layouts.app')

@section('content')
    <div class="card text-center">
        <div class="card-header">
            Profile
            <i class="far fa-smile"></i>
        </div>
        <div class="card-body">
            <h5 class="card-title fs-1">{{$user->first_name}} {{$user->last_name}}</h5>
            <p class="card-text">{{$user->gender}}</p>
{{--            <form method="post" action="{{url('profile/' . Auth::user()->id . '/friend_request/' . $user->id .'')}}">--}}
{{--                @csrf--}}
{{--                <button class="btn btn-primary mt-3">Add friend</button>--}}
{{--            </form>--}}
{{--            <a href="#" class="btn btn-outline-danger mt-3">Unfriend</a>--}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="far fa-envelope text-blue-600"></i> Email: {{$user->email}}</li>
            <li class="list-group-item"><i class="fas fa-birthday-cake text-pink-600"></i> Birthday: {{date("d M Y", strtotime($user->birth_date))}}</li>
            <li class="list-group-item"><i class="far fa-clock text-purple-600"></i> Created: {{date("d M Y H:i", strtotime($user->created_at))}}</li>
            <li class="list-group-item"><i class="fas fa-archive text-yellow-400"></i> Wall posts: {{$user->posts()->count()}}</li>
        </ul>
    </div>

    @component('components.post-list', ['posts'=>$user->posts()->latest()->paginate(5)])@endcomponent
@endsection
