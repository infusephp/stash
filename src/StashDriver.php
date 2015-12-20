<?php

namespace App\Stash;

class StashDriver
{
    public function __invoke($app)
    {
        $config = $app['config'];

        $driverClass = $config->get('cache.driver');
        if (!$driverClass) {
            $driverClass = 'Stash\Driver\Ephemeral';
        }

        $opts = (array) $config->get('cache.options');
        $driver = new $driverClass($opts);

        return $driver;
    }
}
