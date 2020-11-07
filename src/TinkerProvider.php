<?php

namespace Luuhai48\FlarumTinker;

use Flarum\Foundation\AbstractServiceProvider;

use Luuhai48\FlarumTinker\ConfigureConsole;


class TinkerProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->app->make('events')->subscribe(ConfigureConsole::class);
    }

    public function provides()
    {
        return [];
    }
}
