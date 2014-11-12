<?php

namespace League\Squery\Tests\Process;

use League\Squery\Process\SymfonyProcess;
use League\Squery\Tests\TestCase;
use Mockery;
use ReflectionClass;
use Symfony\Component\Process\Process;

class SymfonyProcessTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function itProcessesResponses()
    {
        $response = null;

        $onData = function () use (&$response) {
            $response = "data";
        };

        $onError = function () use (&$response) {
            $response = "error";
        };

        $provider = Mockery::mock(Process::class);
        $provider->shouldReceive("stop");

        $process = new SymfonyProcess($provider);

        $reflection = new ReflectionClass($process);

        $method = $reflection->getMethod("processResponse");
        $method->setAccessible(true);

        $method->invoke($process, "err", "foo", $onData, $onError);

        $this->assertEquals("error", $response);

        $method->invoke($process, "ok", "foo", $onData, $onError);

        $this->assertEquals("data", $response);
    }
}
