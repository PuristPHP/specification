<?php

namespace Purist\Specification;

interface SpecificationInterface
{
    /**
     * Returns a boolean indicating whether this specification can support the given value.
     */
    public function isSatisfiedBy(mixed $value): bool;
}
