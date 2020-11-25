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

use Exception;
use Flarum\Console\AbstractCommand;
use Flarum\Foundation\Paths;


class TinkerInstallCommand extends AbstractCommand
{
    /**
     * @var Paths
     */
    protected $paths;

    /**
     * @param Paths $paths
     */
    public function __construct(Paths $paths)
    {
        $this->paths = $paths;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tinker:install')
            ->setDescription('Publish config file');
    }

    /**
     * {@inheritdoc}
     */
    protected function fire()
    {
        $this->info('Flarum Tinker v1.1.0 by <fg=red;options=bold>Luuhai48</>');
        $this->info('Publishing config file...');

        $config_file = realpath($raw = __DIR__ . '/../config/tinker.php') ?: $raw;
        $config_dir = $this->paths->base . '/config';

        if (!file_exists($config_dir)) {
            mkdir($config_dir);
        }

        try {
            file_put_contents($config_dir . '/tinker.php', file_get_contents($config_file));
        } catch (Exception $e) {
            $this->error($e);
        }

        $this->info('<fg=blue>All Done!</>');
    }
}
