<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text_content'=>[
                'required', 'string'
            ],
            'image'=>[
                'nullable','file','image'
            ]
        ];
    }
    function validatedWithImage(){
        $data=$this->validated();
        if($this->hasFile('image')){
            /** @var Post $post */
            if($post=$this->route('post')){
                $post->deleteImage();
            }

            $data['image_path']=$this->file('image')->store('public/images');
        }

        return $data;
    }
}
