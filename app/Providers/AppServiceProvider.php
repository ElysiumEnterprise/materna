<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Support\ServiceProvider;
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
        // Compartilha categorias com todas as views
        View::composer('*', function ($view) {
            $view->with('categorias', Categoria::all());
        });

        View::composer('templates.template-adm', function($view){
            $ultimosUsuarios = Usuario::with('perfils')->latest()->take(3)->get();
            $view->with('ultimosUsuarios', $ultimosUsuarios);
        });
    }
}
