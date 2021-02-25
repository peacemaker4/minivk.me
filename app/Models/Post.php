<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
      'text_content', 'image_path'
    ];
    function user(){
        return $this->belongsTo(User::class);
    }


    function deleteImage(){
        if(!$this->image_path)
            return;
        $path=storage_path('app/' . $this->image_path);

        if(file_exists($path))
            unlink($path);
    }
}
