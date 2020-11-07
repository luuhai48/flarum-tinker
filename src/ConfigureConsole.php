<?php

namespace Luuhai48\FlarumTinker;

use Flarum\Console\Event\Configuring;
use Illuminate\Contracts\Events\Dispatcher;

use Luuhai48\FlarumTinker\TinkerCommand;


class ConfigureConsole
{
    /**
     * @var array
     */
    protected $commands = [
        TinkerCommand::class,
    ];

    public function subscribe(Dispatcher $events)
    {
        $events->listen(Configuring::class, [$this, 'configure']);
    }

    public function configure(Configuring $event)
    {
        foreach ($this->commands as $command) {
            $event->addCommand($command);
        }
    }
}
