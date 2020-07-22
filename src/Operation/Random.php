<?php

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use loophp\collection\Contract\Operation;
use loophp\collection\Transformation\Run;

final class Random extends AbstractOperation implements Operation
{
    public function __construct(int $size = 1)
    {
        $this->storage = [
            'size' => $size,
        ];
    }

    public function __invoke(): Closure
    {
        return static function (iterable $collection, int $size): Generator {
            yield from (new Run(new Limit($size)))((new Run(new Shuffle()))($collection));
        };
    }
}