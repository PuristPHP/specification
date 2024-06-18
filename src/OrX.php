<?php

namespace Purist\Specification;

readonly final class OrX extends CompositeSpecification
{
    public function __construct(private SpecificationInterface $x, private SpecificationInterface $y)
    {
    }

    /**
     * {@inheritDoc}
     */
    #[\Override]
    public function isSatisfiedBy(mixed $value) : bool
    {
        return $this->x->isSatisfiedBy($value) || $this->y->isSatisfiedBy($value);
    }
}
