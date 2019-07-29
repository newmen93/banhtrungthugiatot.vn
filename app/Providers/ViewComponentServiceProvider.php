<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //out of date in laravel 5.8 version
        /*\Blade::directive('render', function ($component) {
    return "<?php echo (app($component))->toHtml(); ?>";
    });*/
    }
}
