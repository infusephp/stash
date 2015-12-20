<?php

class StashTest extends PHPUnit_Framework_TestCase
{
    public function testStash()
    {
        $app = new App([
            'services' => [
                'stash' => 'App\Stash\Stash',
                'stash_driver' => 'App\Stash\StashDriver',
            ],
            'cache' => [
                'namespace' => 'namespace', ], ]);

        $stash = $app['stash'];
        $this->assertInstanceOf('Stash\Pool', $stash);
        $this->assertEquals('namespace', $stash->getNamespace());
        $this->assertInstanceOf('Stash\Driver\Ephemeral', $app['stash_driver']);
    }
}
