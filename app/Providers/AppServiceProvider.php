<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\ContractType;
use App\Models\PropertyType;

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
        // Custom route binding for PropertyType to resolve from Category, not ContractType
        Route::bind('propertyType', function ($value, $route) {

            $category = $route->parameter('category');

            if ($category instanceof Category) {
                return PropertyType::where('category_id', $category->id)
                    ->where('slug', $value)
                    ->firstOrFail();
            }

            return PropertyType::where('slug', $value)->firstOrFail();
        });
    }
}
