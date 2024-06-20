<?php

namespace Purist\Specification;

abstract readonly class CompositeSpecification implements CompositeSpecificationInterface
{
    #[\Override]
    public function andX(SpecificationInterface $specification): AndX
    {
        return new AndX($this, $specification);
    }

    #[\Override]
    public function orX(SpecificationInterface $specification): OrX
    {
        return new OrX($this, $specification);
    }

    #[\Override]
    public function not(SpecificationInterface $specification): Not
    {
        return new Not($specification);
    }
}
