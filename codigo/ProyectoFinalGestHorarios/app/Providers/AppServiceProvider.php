<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PeriodosAcademico;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $pAcademicos = PeriodosAcademico::all();
        $docentes = Docente::all();
        $usuarios = user::all();
        $users = User::whereDoesntHave('docente')->get();

        View::composer('*', function ($view) use ($pAcademicos) {
            $view->with('pAcademicos', $pAcademicos);
        });

        View::composer('*', function ($view) use ($docentes) {
            $view->with('docentes', $docentes);
        });

        View::composer('*', function ($view) use ($users) {
            $view->with('users', $users);
        });

        View::composer('*', function ($view) use ($usuarios) {
            $view->with('usuarios', $usuarios);
        });

        
    }
}