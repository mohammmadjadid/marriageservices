<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class statistics extends Model
{
    use HasFactory;

    public function getByLanguage($id , $languageId)
    {
        return statistics::leftJoin('statistics_languages', function($join) use($languageId){
            $join->on('statistics.id','=','statistics_languages.statistic_id');
            $join->on('statistics_languages.language_id','=',DB::raw($languageId));
        })
        ->select('statistics.*','statistics_languages.key','statistics_languages.value')
        ->where('statistics.id','=',$id)
        ->first();
    }

    public function getAll($languageId = 1)
    {
        return statistics::leftJoin('statistics_languages', function($join) use ($languageId){
            $join->on('statistics.id','=','statistics_languages.statistic_id');
            $join->on('statistics_languages.language_id','=',DB::raw($languageId));
        })
        ->select('statistics.*','statistics_languages.key','statistics_languages.value')
        ->get();
    }
}
