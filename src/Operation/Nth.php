<?php

declare(strict_types=1);

namespace drupol\collection\Operation;

use drupol\collection\Contract\Collection;

/**
 * Class Nth.
 */
final class Nth extends Operation
{
    /**
     * {@inheritdoc}
     */
    public function run(Collection $collection): Collection
    {
        [$step, $offset] = $this->parameters;

        return $collection::withClosure(
            static function () use ($step, $offset, $collection) {
                $position = 0;

                foreach ($collection->getIterator() as $key => $item) {
                    if ($position++ % $step !== $offset) {
                        continue;
                    }

                    yield $key => $item;
                }
            }
        );
    }
}
