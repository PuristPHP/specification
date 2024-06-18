<?php

namespace Purist\Specification;

interface CompositeSpecificationInterface extends SpecificationInterface
{
    public function andX(SpecificationInterface $specification): AndX;

    public function orX(SpecificationInterface $specification): OrX;

    public function not(SpecificationInterface $specification): Not;
}
