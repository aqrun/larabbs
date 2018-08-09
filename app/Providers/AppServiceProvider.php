<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setCarbonLang();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    protected function setCarbonLang()
    {
        //////////////////////////
        //set carbon language
        $lang_array = [
            'en' => 'en',
            'zh-CN' => 'zh',
        ];
        $lang = $lang_array[config('app.locale')]??'en';
        \Carbon\Carbon::setLocale($lang);
    }
}
