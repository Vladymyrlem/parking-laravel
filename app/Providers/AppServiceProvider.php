<?php

    namespace App\Providers;

    use App\Models\Reservation;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\View;

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
            Paginator::useBootstrap();
            View::composer('layouts.app', function ($view) {
                $arrayData = Reservation::all('new_date');
                $view->with('arrayData', $arrayData);
            });
        }
    }
