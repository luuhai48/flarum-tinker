<?php

/*
 * This file is part of luuhai48/flarum-tinker.
 *
 * Copyright (c) 2020 Luuhai48.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Luuhai48\FlarumTinker;

use Flarum\Extend;

return [
    (new Extend\Console())->command(TinkerCommand::class),
    (new Extend\Console())->command(TinkerInstallCommand::class),
];
