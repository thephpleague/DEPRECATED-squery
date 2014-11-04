<?php

namespace Formativ\Query\Process;

use Symfony\Component\Process\Process as Provider;

class SymfonyProcess implements Process
{

    /**
     * @var Provider
     */
    protected $provider;

    /**
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param string        $command
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return $this
     */
    public function run($command, callable $onData = null, callable $onError = null)
    {
        $this->provider->setCommandLine($command);

        $this->provider->run(function ($type, $buffer) use ($onData, $onError) {
            if ($type === "err") {
                if ($onError !== null) {
                    $onError($buffer);
                }
            } else {
                if ($onData !== null) {
                    $onData($buffer);
                }
            }
        });

        return $this;
    }
}
