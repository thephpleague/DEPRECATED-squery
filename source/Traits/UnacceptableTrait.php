<?php

namespace Formativ\Query\Traits;

use LogicException;

trait UnacceptableTrait
{
    /**
     * @param mixed  $instance
     * @param string $interface
     *
     * @return void
     *
     * @throws LogicException
     *
     * @see https://www.youtube.com/watch?v=07So_lJQyqw
     */
    public function throwIfUnacceptable($instance, $interface)
    {
        if (!($instance instanceof $interface)) {
            $class = get_class($instance);

            throw new LogicException(
                "{$class} does not implement {$interface}"
            );
        }
    }
}
