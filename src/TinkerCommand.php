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

use Psy\Shell;
use Psy\Configuration;
use Psy\VersionUpdater\Checker;
use Flarum\Foundation\Paths;
use Flarum\Console\AbstractCommand;


class TinkerCommand extends AbstractCommand
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

        $config_file = realpath($raw = __DIR__ . '/../config/tinker.php') ?: $raw;
        $published_config_file = realpath($raw = $paths->base . '/config/tinker.php') ?: $raw;

        if (file_exists($published_config_file)) {
            $this->config = collect(require $published_config_file);
        } else {
            $this->config = collect(require $config_file);
        }


        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tinker')
            ->setDescription('Interact with your application');
    }

    /**
     * {@inheritdoc}
     */
    protected function fire()
    {
        $this->info('Flarum Tinker v1.0.0 by <fg=red;options=bold>Luuhai48</>');

        $this->getApplication()->setCatchExceptions(false);

        $config = Configuration::fromInput($this->input);
        $config->setUpdateCheck(Checker::NEVER);
        $config->getPresenter()->addCasters(
            $this->getCasters()
        );

        $shell = new Shell($config);

        $vendor = $this->paths->vendor;
        $path = $vendor . '/composer/autoload_classmap.php';

        $loader = ClassAliasAutoloader::register(
            $shell,
            $path,
            $this->config->get('packages', []),
            $this->config->get('alias', []),
            $this->config->get('dont_alias', [])
        );

        try {
            return $shell->run();
        } finally {
            $loader->unregister();
        }
    }

    protected function getCasters()
    {
        $casters = [
            'Illuminate\Support\Collection' => 'Laravel\Tinker\TinkerCaster::castCollection',
            'Illuminate\Support\HtmlString' => 'Laravel\Tinker\TinkerCaster::castHtmlString',
        ];

        if (class_exists('Flarum\Database\AbstractModel')) {
            $casters['Flarum\Database\AbstractModel'] = 'Laravel\Tinker\TinkerCaster::castModel';
        }

        if (class_exists('Illuminate\Foundation\Application')) {
            $casters['Illuminate\Foundation\Application'] = 'Laravel\Tinker\TinkerCaster::castApplication';
        }

        return $casters;
    }
}
