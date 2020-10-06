<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use loophp\collection\Contract\Collection;

/**
 * @psalm-template T
 */
interface Containsable
{
    /**
     * @param mixed ...$value
     * @psalm-param T ...$value
     *
     * @psalm-return \loophp\collection\Contract\Collection<int, bool>
     */
    public function contains(...$value): Collection;
}
