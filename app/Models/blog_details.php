<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_details extends Model
{
    use HasFactory;

    public  function  blog()
    {
        return $this->belongsTo(blog::class , 'blog_id','id');
    }

    public function getByLanguage($id , $language_id)
    {
        return blog_details::where(['blog_id'=>$id , 'language_id' => $language_id])
                            ->first();
    }

    public function search($text)
    {
        return blog_details::select('title','id')
                            ->where('description' , 'like','%'.$text.'%')
                            ->orWhere('title' , 'like','%'.$text.'%')
                            ->orderBy('id')
                            ->get();
    }

}
