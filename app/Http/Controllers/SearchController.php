<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request){
        ['q'=>$query]=$request->validated();

        $builder=Post::query();
        $this->applyLikeCondition($builder, 'text_content', $query);
        $this->applyLikeCondition($builder, 'created_at', $query);
        $this->applyLikeCondition($builder, 'user_id', $query);

        $posts=$builder->latest()->paginate(3);
        return view('pages.posts.search', [
            'posts'=>$posts
        ]);
    }
    protected function applyLikeCondition(Builder $builder, $key, $text){
        $builder
            ->where($key, 'like', "%$text")
            ->orWhere($key, 'like', "$text%")
            ->orWhere($key, 'like', "%$text%");
    }
}
