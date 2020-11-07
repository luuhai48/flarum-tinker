<?php

namespace Luuhai48\FlarumTinker;

use Flarum\Extend\ExtenderInterface;
use Flarum\Extension\Extension;
use Illuminate\Contracts\Container\Container;

use Luuhai48\FlarumTinker\TinkerProvider;


class EnableTinker implements ExtenderInterface
{
    public function extend(Container $container, Extension $extension = null)
    {
        if (!array_key_exists(TinkerProvider::class, $container->getLoadedProviders())) {
            $container->register(TinkerProvider::class);
        }
    }
}
