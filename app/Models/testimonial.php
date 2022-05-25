<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class testimonial extends Model
{
    use HasFactory;

    public function getByLanguage($id , $languageId)
    {
        return testimonial::leftJoin('testimonial_languages', function($join) use($languageId){
            $join->on('testimonials.id','=','testimonial_languages.testimonial_id');
            $join->on('testimonial_languages.language_id','=',DB::raw($languageId));
        })
        ->select('testimonials.*','testimonial_languages.text','testimonial_languages.username','testimonial_languages.position')
        ->where('testimonials.id','=',$id)
        ->first();
    }

    public function getAll()
    {
        return testimonial::leftJoin('testimonial_languages', function($join){
            $join->on('testimonials.id','=','testimonial_languages.testimonial_id');
            $join->on('testimonial_languages.language_id','=',DB::raw(1));
        })
        ->select('testimonials.*','testimonial_languages.text','testimonial_languages.username','testimonial_languages.position')
        ->get();
    }
}
