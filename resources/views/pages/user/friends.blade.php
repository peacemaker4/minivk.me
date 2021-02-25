@extends('layouts\app')

@section('content')
    @if($friends->isEmpty())
        <h2>No friends...</h2>
    @else
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                @foreach($friends as $friend)
                    <li class="list-group-item"><p>{{$friend}}</p></li>
                @endforeach
            </ul>
        </div>



    @endif
@endsection
