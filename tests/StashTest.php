<?php

use Infuse\Application;

class StashTest extends PHPUnit_Framework_TestCase
{
    public function testStash()
    {
        $app = new Application([
            'services' => [
                'stash' => 'Infuse\Stash\Stash',
                'stash_driver' => 'Infuse\Stash\StashDriver',
            ],
            'cache' => [
                'namespace' => 'namespace', ], ]);

        $stash = $app['stash'];
        $this->assertInstanceOf('Stash\Pool', $stash);
        $this->assertEquals('namespace', $stash->getNamespace());
        $this->assertInstanceOf('Stash\Driver\Ephemeral', $app['stash_driver']);
    }
}
