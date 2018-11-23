<?php

namespace App\Providers;

use App\Models\Item;
use App\Observers\ItemObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);

        View::share('browser_key', 'AIzaSyDcEAVCwHf0OtZ4jKB3aVOE_auka3pLPQU');
        View::share('server_key', 'AIzaSyByaynCk7vcuS66I4S6Ed46IgreC54UVEg');

        View::share('browser_key_placeholder', 'BROWSER_KEY');
        View::share('server_key_placeholder', 'SERVER_KEY');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('id_ID');
        });
    }
}
