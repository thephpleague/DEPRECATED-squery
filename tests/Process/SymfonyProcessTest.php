<?php

namespace League\Squery\Test\Process;

use League\Squery\Process\SymfonyProcess;
use League\Squery\Test\Test;
use Mockery;
use Symfony\Component\Process\Process;

class SymfonyProcessTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itRunsCommands()
    {
        $provider = $this->getNewProcessMock();

        $process = new SymfonyProcess($provider);

        $this->assertOkCallback($provider, $process);

        $this->assertErrorCallback($provider, $process);
    }

    /**
     * @return Mockery\MockInterface
     */
    protected function getNewProcessMock()
    {
        $provider = Mockery::mock("Symfony\\Component\\Process\\Process");

        $provider->shouldReceive("setCommandLine");
        $provider->shouldReceive("stop");

        return $provider;
    }

    /**
     * @param Process        $provider
     * @param SymfonyProcess $process
     *
     * @return void
     */
    protected function assertOkCallback($provider, $process)
    {
        $provider->shouldReceive("run")
            ->once()
            ->with(
                Mockery::on(function ($callback) {
                    $callback("ok", "mocked ok");

                    return true;
                })
            );

        $response = null;

        $process->run("foo", function ($buffer) use (&$response) {
            $response = $buffer;
        });

        $this->assertEquals("mocked ok", $response);
    }

    /**
     * @param Process        $provider
     * @param SymfonyProcess $process
     *
     * @return void
     */
    protected function assertErrorCallback($provider, $process)
    {
        $provider->shouldReceive("run")
            ->once()
            ->with(
                Mockery::on(function ($callback) {
                    $callback("err", "mocked error");

                    return true;
                })
            );

        $response = null;

        $process->run("foo", null, function ($error) use (&$response) {
            $response = $error;
        });

        $this->assertEquals("mocked error", $response);
    }
}
