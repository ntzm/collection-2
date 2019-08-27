<?php

declare(strict_types=1);

namespace drupol\collection\Operation;

/**
 * Class Pad.
 */
final class Pad extends Operation
{
    /**
     * Pad constructor.
     *
     * @param int $size
     * @param mixed $value
     */
    public function __construct(int $size, $value)
    {
        parent::__construct(...[$size, $value]);
    }

    /**
     * {@inheritdoc}
     */
    public function on(\Traversable $collection): \Closure
    {
        [$size, $value] = $this->parameters;

        return static function () use ($size, $value, $collection): \Generator {
            $y = 0;

            foreach ($collection as $key => $item) {
                ++$y;

                yield $key => $item;
            }

            while ($y++ < $size) {
                yield $value;
            }
        };
    }
}
