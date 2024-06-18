<?php

namespace Purist\Specification;

readonly final class Not extends CompositeSpecification
{
    public function __construct(private SpecificationInterface $wrapped)
    {
    }

    /**
     * {@inheritDoc}
     */
    #[\Override]
    public function isSatisfiedBy(mixed $value): bool
    {
        return !$this->wrapped->isSatisfiedBy($value);
    }
}
