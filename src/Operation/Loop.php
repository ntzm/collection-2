<?php

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use InfiniteIterator;
use loophp\collection\Contract\Operation;
use loophp\collection\Iterator\IterableIterator;

/**
 * Class Loop.
 */
final class Loop implements Operation
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): Closure
    {
        return static function (iterable $collection): Generator {
            $iterator = new InfiniteIterator(
                new IterableIterator($collection)
            );

            foreach ($iterator as $value) {
                yield $value;
            }
        };
    }
}
