<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use Iterator;
use loophp\collection\Contract\Collection;

/**
 * @template TKey
 * @template T
 */
interface Mapable
{
    /**
     * Apply one or more callbacks to a collection and use the return value.
     * Usage with multiple callbacks is deprecated and will be removed in a future major version.
     * Use mapN instead for multiple callbacks.
     *
     * @template V
     *
     * @param callable(T, TKey, Iterator<TKey, T>): V ...$callbacks
     *
     * @return Collection<TKey, V>
     */
    public function map(callable ...$callbacks): Collection;
}
