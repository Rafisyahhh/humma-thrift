<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Set the default string length for migrations
        Schema::defaultStringLength(191);

        // Enable pagination with bootstrap 5
        Paginator::useBootstrapFive();

        # Share data to all views
        if (Schema::hasTable('product_categories')) {
            View::share('productCategories', ProductCategory::all());
        }

        # Give Custom Directive For Currency Format
        Blade::directive('currency', function($expression) {
            return "Rp<?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        # Adding Alias
        $loader = AliasLoader::getInstance();

        $loader->alias('Bank', \App\Models\Bank::class);
        $loader->alias('WithdrawalStatusEnum', \App\Enums\WithdrawalStatusEnum::class);
    }
}
