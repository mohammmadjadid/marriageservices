<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class categorys extends Model
{
    use HasFactory;

    protected $guarder = [];
    protected $table = "categories";
    /**
     * Get all of the comments for the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function language(): HasMany
    {
        return $this->hasMany(category_language::class, 'category_id', 'id');
    }

    public function with_language($id = null)
    {
        if($id)
        return DB::table('categories')
                    ->join('category_languages as arabic_cat',function($join){
                            $join->on('categories.id' ,'=' ,'arabic_cat.category_id');
                            $join->on('arabic_cat.language_id' ,'=' ,DB::raw(1));
                        })
                    ->join('category_languages as english_cat',function($join){
                        $join->on('categories.id' ,'=' ,'english_cat.category_id');
                        $join->on('english_cat.language_id' ,'=' ,DB::raw(2));
                    })
                    ->select('categories.id','categories.is_active','categories.order','arabic_cat.name as arabic_cat','arabic_cat.description as arabic_desc','english_cat.name as english_cat','english_cat.description as english_desc','categories.image','english_cat.id as englishId','arabic_cat.id as arabicId')
                    ->where('categories.id',$id)
                    ->groupBy('categories.id')
                    ->first();
        else
        return DB::table('categories')
                ->join('category_languages as arabic_cat',function($join){
                $join->on('categories.id' ,'=' ,'arabic_cat.category_id');
                $join->on('arabic_cat.language_id' ,'=' ,DB::raw(1));
                })
                ->join('category_languages as english_cat',function($join){
                    $join->on('categories.id' ,'=' ,'english_cat.category_id');
                    $join->on('english_cat.language_id' ,'=' ,DB::raw(2));
                })
                 ->select('categories.id','categories.is_active','categories.order','arabic_cat.name as arabic_cat','arabic_cat.description as arabic_desc','english_cat.name as english_cat','english_cat.description as english_desc','categories.image')
                 ->groupBy('categories.id')
                 ->get();
    }

    public function getActive($languageId)
    {
            return DB::table('categories')
                ->join('category_languages',function($join) use ($languageId){
                    $join->on('categories.id' ,'=' ,'category_languages.category_id');
                    $join->on('category_languages.language_id' ,'=' ,DB::raw($languageId));
                })
                ->select('categories.id','categories.is_header','categories.is_active','categories.order','category_languages.name','category_languages.description','categories.image')
                ->groupBy('categories.id')
                ->get();
    }
}
