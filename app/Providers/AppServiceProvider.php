<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Laravel\Dusk\DuskServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Author\AuthorRepositoryInterface::class,
            \App\Repositories\Author\AuthorRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Book\BookRepositoryInterface::class,
            \App\Repositories\Book\BookRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Publisher\PublisherRepositoryInterface::class,
            \App\Repositories\Publisher\PublisherRepository::class
        );

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('user.layouts.menu', function ($view) {
            $bookCategories = Category::all();
            $authors = Author::all();
            $publishers = Publisher::all();
            $view->with([
               'bookCategories' => $bookCategories,
               'authors' => $authors,
               'publishers' => $publishers,

            ]);

        });

    }
}
