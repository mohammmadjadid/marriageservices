<?php

namespace App\Providers;

use App\Models\categorys;
use Illuminate\Support\ServiceProvider;
use App\Models\contanst_language;
use App\Models\blog;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $languageId = 1;
        $constantsData = contanst_language::where('language_id' ,"=","1")->get()->toArray();
        $constants = array();
        foreach($constantsData as $row)
        {
            $constants[$row['key']] = $row['value'];
        }

        $navServices = categorys::getActive($languageId);
        $footerServices = blog::getServices($languageId);

        $headerServices = array();
        foreach($navServices as $row)
        {
            if($row->is_active)
            {
                $headerServices[] = array(
                    'title' => $row->name,
                    'blogs' => blog::getAll($languageId , $row->id)
                );
            }
        }
        view()->share(['websiteTitle'=>'الزواج السعيد','constants'=>$constants,'footerServices' =>$footerServices,'headerServices'=>$headerServices]);
    }
}
