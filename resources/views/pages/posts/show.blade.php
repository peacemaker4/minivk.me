@extends('layouts.app')


@php
    $now=date("Y-m-d H:i:s");
    $now=date("Y-m-d", strtotime($now));
    $post_date=$posts->created_at??null;
    $ago=date("Y-m-d", strtotime($post_date));
    $now_min=date("i");
    $post_min=date("i",strtotime($post_date));
    if($now==$ago){
        $now_hour=date("H");
        $post_hour=date("H",strtotime($post_date));
        $minus_hour=$now_hour-$post_hour;
        if($now_hour>$post_hour){
            $minus_min=($minus_hour*60)+date("i")-$post_min;
            if($minus_min>=60){
                $ago=$minus_hour;
            if($ago>1)
                $ago=$ago . " hours ago";
            else
                $ago=$ago . " hour ago";
            }
            else{
                if($minus_min==0)
                    $ago="just now";
                else if($minus_min==1)
                    $ago=($minus_min) . " minute ago";
                else
                    $ago=($minus_min) . " minutes ago";
            }
        }
        else{
            $minus_min=$now_min-$post_min;
            if($minus_min==0)
                    $ago="just now";
                else if($minus_min==1)
                    $ago=($minus_min) . " minute ago";
                else
                    $ago=($minus_min) . " minutes ago";
        }
    }
    else if(date("Y")==date("Y", strtotime($post_date)))
        $ago=date("d M H:i", strtotime($post_date));
    else
        $ago=date("d M Y", strtotime($post_date));
@endphp

@section('content')

    <div class="badge bg-primary text-wrap" style="width: 6rem;">
        Post
    </div>
    <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">

                    @can('update', $posts)
                        <form method="get" action="{{route('posts.edit', $posts)}}">
                            <button  class="text-gray-700"><i class="fas fa-pen"></i></button>
                        </form>
                    @endcan
                    @if($posts->image_path)
                        @can('update', $posts)
                            <form action="{{route('posts.removeImage',$posts)}}" method="post">
                                @csrf @method('put')
                                <button><i class="fas fa-photo-video text-red-700"></i></button>
                            </form>
                        @endcan
                    @endif
                    @can('delete', $posts)
                        <form action="{{route('posts.destroy', $posts)}}" method="post">
                            @csrf @method('delete')
                            <button ><i class="fas fa-times text-red-700"></i></button>
                        </form>
                    @endcan

                </div>

            </div>
        <div class="card-body">
            <a href="{{route('profile', $posts->user)}}" class="card-title text-blue-800">{{$posts->user->first_name}} {{$posts->user->last_name}}</a>
            <p class="text-gray-500 text-muted">{{$ago}}</p>
            <p class="card-text mt-2">{{$posts->text_content}}</p>
            @if($posts->image_path)
                <img height="500px" class="card-img-top img-fluid img-thumbnail"  src="{{ Storage::url($posts->image_path) }}">
            @endif

            <p class="card-text"><small class="text-muted">Last updated: {{date("d M H:i", strtotime($posts->updated_at))}}</small></p>
        </div>
    </div>


@endsection
