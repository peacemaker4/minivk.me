@if($posts->isEmpty())
    <h2>No such posts</h2>
@else

    <ol>
        @foreach($posts as $post)
            <li value="{{$post->id}}" class="mt-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('profile', $post->user)}}" class="card-title text-blue-800">{{$post->user->first_name}} {{$post->user->last_name}}</a>
                        <p class="card-text"><small class="text-muted">{{date("d M Y H:i", strtotime($post->created_at))}}</small></p>
                        <p class="card-text mt-2">{{substr($post->text_content, 0, 100)}}</p>
                        <a class="text-blue-600 hover:text-blue-800" href="{{route('posts.show', $post)}}"><small>See more...</small></a>
                        @if($post->image_path)
                            <img height="500px" class="card-img-top img-fluid img-thumbnail"  src="{{ Storage::url($post->image_path) }}">
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ol>

    <p>
        {{$posts->withQueryString()->links()}}
    </p>
@endif
