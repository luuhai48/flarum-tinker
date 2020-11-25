<?php

/*
 * This file is part of luuhai48/flarum-tinker.
 *
 * Copyright (c) 2020 Luuhai48.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


return [
    /*
    |--------------------------------------------------------------------------
    | Auto Aliased Classes
    |--------------------------------------------------------------------------
    |
    | Tinker will not automatically alias classes in your vendor namespaces
    | but you may explicitly allow a subset of classes to get aliased by
    | adding the names of each of those classes to the following list.
    |
    */

    'alias' => [
        'Flarum\User\User'
    ],

    /*
    |--------------------------------------------------------------------------
    | Classes That Should Not Be Aliased
    |--------------------------------------------------------------------------
    |
    | Typically, Tinker automatically aliases classes as you require them in
    | Tinker. However, you may wish to never alias certain classes, which
    | you may accomplish by listing the classes in the following array.
    |
    */

    'dont_alias' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Alias all classes from these packages vendor directory.
    |--------------------------------------------------------------------------
    |
    | Example: 'fof', 'flarum/core/src/User', ...
    |
    */

    'packages' => [
        //
    ],

];
