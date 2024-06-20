<?php

namespace Purist\Specification;

final readonly class Not extends CompositeSpecification
{
    public function __construct(private SpecificationInterface $wrapped)
    {
    }

    #[\Override]
    public function isSatisfiedBy(mixed $value): bool
    {
        return !$this->wrapped->isSatisfiedBy($value);
    }
}
