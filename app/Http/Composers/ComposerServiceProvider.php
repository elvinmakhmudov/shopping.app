<?php  namespace App\Http\Composers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('*', 'App\Http\Composers\SidebarComposer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        $this->app->view->composer('pages.partials.nav.categories', 'App\Http\Composers\SidebarComposer');
    }
}