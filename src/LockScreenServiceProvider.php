<?php

namespace OpenAdminCore\Admin\LockScreen;

use OpenAdminCore\Admin\Facades\Admin;
use OpenAdminCore\Admin\LockScreen\Http\Middleware\LockScreen as Middleware;
use OpenAdminCore\Admin\Widgets\Navbar;
use Illuminate\Support\ServiceProvider;


class LockScreenServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LockScreen $extension)
    {
        if (! LockScreen::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-lock-screen');
        }

        $this->app->booted(function () {
            LockScreen::routes(__DIR__.'/../routes/web.php');
        });

        Admin::booting(function () {
            Admin::navbar(function (Navbar $navbar) {
                $navbar->right(LockScreen::link());
            });
        });

        app('router')->aliasMiddleware('admin.lock', Middleware::class);
    }
}