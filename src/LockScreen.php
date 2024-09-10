<?php

namespace OpenAdminCore\Admin\LockScreen;

use OpenAdminCore\Admin\Extension;

class LockScreen extends Extension
{
    const LOCK_KEY = 'laravel-admin-lock';

    public $name = 'lock-screen';

    public $views = __DIR__.'/../resources/views';

    public static function link()
    {
        $url = route('laravel-admin-lock');

        return <<<HTML
<li>
    <a href="{$url}">
      <i class="fa icon-lock"></i>
    </a>
</li>
HTML;

    }
}