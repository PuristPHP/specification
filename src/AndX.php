<?php

namespace Purist\Specification;

final readonly class AndX extends CompositeSpecification
{
    public function __construct(private SpecificationInterface $x, private SpecificationInterface $y)
    {
    }

    #[\Override]
    public function isSatisfiedBy(mixed $value): bool
    {
        return $this->x->isSatisfiedBy($value) && $this->y->isSatisfiedBy($value);
    }
}
