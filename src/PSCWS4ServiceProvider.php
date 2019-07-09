<?php
/**
 * Created by PhpStorm.
 * User: myron
 * Date: 2019/7/9
 * Time: 下午4:13
 */
namespace Mecyu\LaravelPscws4;

use Illuminate\Support\ServiceProvider;

class PSCWS4ServiceProvider extends ServiceProvider
{
    /**
     * delay to load down or not
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PSCWS4', function ($app) {
            return new PSCWS4($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/pscws4.php' => config_path('pscws4.php'), // publish the config file
            __DIR__.'/config/etc/rules.ini' => storage_path('app/etc/rules.ini'), // publish the gbk rules
            __DIR__.'/config/etc/rules.utf8.ini' => storage_path('app/etc/rules.utf8.ini'), // publish the utf8 rules
            __DIR__.'/config/etc/dict.xdb' => storage_path('app/etc/dict.xdb') // publish the dictionary file
        ]);
    }

    /**
     * $defer=true
     *
     * @return array
     */
    public function provides()
    {
        return ['PSCWS4'];
    }
}