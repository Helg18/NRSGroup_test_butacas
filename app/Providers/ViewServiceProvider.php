<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 02:37 PM
 */

namespace App\Providers;


use App\Http\ViewComposers\ReservationComposer;
use App\Http\ViewComposers\ReservationCreateUpdateComposer;
use App\Http\ViewComposers\UserComposer;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('users.index', UserComposer::class);
        View::composer('reservations.index', ReservationComposer::class);
        View::composer(['reservations.create', 'reservations.edit', 'reservations.show'],
            ReservationCreateUpdateComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}