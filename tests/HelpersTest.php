<?php

namespace Qless\Tests;

use Qless\Signal\SignalHandler;

/**
 * Qless\Tests\HelpersTest
 *
 * @package Qless\Tests
 */
class HelpersTest extends QlessTestCase
{
    /**
     * @test
     * @dataProvider signalDataProvider
     *
     * @param int    $signal
     * @param string $expected
     */
    public function shouldGetSignalName(int $signal, string $expected)
    {
        $handler = new SignalHandler();
        $this->assertEquals($expected, $handler->name($signal));
    }

    public function signalDataProvider(): array
    {
        return [
            [300,     'UNKNOWN'],
            [SIGUSR1, 'SIGUSR1'],
            [SIGBUS,  'SIGBUS'],
            [SIGXCPU, 'SIGXCPU'],
            [1,       'SIGHUP' ],
            [-999999, 'UNKNOWN'],
        ];
    }
}
