<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class blog extends Model
{
    use HasFactory;

    /**
     * Get all of the blog_details for the blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(blog_details::class, 'blog_id', 'id');
    }

    public function get_details($categoryId = null,$languageId = 1)
    {
        if($categoryId)
            return blog::join('blog_details' , function($join) use($languageId){
                $join->on('blogs.id','=','blog_details.blog_id');
                $join->on('blog_details.language_id','=',DB::raw($languageId));
            })
            ->leftJoin('users','users.id','=','blogs.created_by')
            ->select('blogs.id','blogs.image','blogs.is_active','blogs.created_at','users.name as created_by','blog_details.short_description','blog_details.title')
            ->where('blogs.category_id','=',DB::raw($categoryId))
            ->orderBy('blogs.id','DESC')
            ->get();

        else
            return blog::join('blog_details' , function($join) use ($languageId){
                $join->on('blogs.id','=','blog_details.blog_id');
                $join->on('blog_details.language_id','=',DB::raw($languageId));
            })
            ->leftJoin('users','users.id','=','blogs.created_by')
            ->select('blogs.id','blogs.image','blogs.is_active','blogs.created_at','users.name as created_by','blog_details.short_description','blog_details.title')
            // ->whereNull('blogs.category_id')
            ->orderBy('blogs.id','DESC')
            ->get();
    }

    public  function  getAll($languageId,$categoryId = NULL)
    {
        if($categoryId)
        {

            return blog::join('blog_details' , function($join) use ($languageId){
                $join->on('blogs.id','=','blog_details.blog_id');
                $join->on('blog_details.language_id','=',DB::raw($languageId));
            })
                ->leftJoin('users','users.id','=','blogs.created_by')
                ->select('blogs.id','blogs.image','blogs.is_active','blogs.created_at','users.name as created_by','blog_details.short_description','blog_details.title')
                ->where('blogs.is_active','=',true)
                ->where('category_id','=',$categoryId)
                ->orderBy('blogs.id','ASC')
                ->paginate(12);
        }
        else
        {
            return blog::join('blog_details' , function($join) use ($languageId){
                $join->on('blogs.id','=','blog_details.blog_id');
                $join->on('blog_details.language_id','=',DB::raw($languageId));
            })
                ->leftJoin('users','users.id','=','blogs.created_by')
                ->select('blogs.id','blogs.image','blogs.is_active','blogs.created_at','users.name as created_by','blog_details.short_description','blog_details.title')
                ->where('blogs.is_active','=',true)
                ->whereNull('category_id')
                ->orderBy('blogs.id','DESC')
                ->paginate(12);
        }
    }

    public function getServices($languageId = 1)
    {
        return blog::join('blog_details','blogs.id','=','blog_details.blog_id')
                    ->leftJoin('users','users.id','=','blogs.created_by')
                    ->select('blogs.id','blogs.image','blogs.is_active','blogs.created_at','users.name as created_by','blog_details.short_description','blog_details.title')
                    ->where('blog_details.language_id','=',$languageId)
                    ->where('blogs.is_active','=',true)
                    ->get();
    }

}
