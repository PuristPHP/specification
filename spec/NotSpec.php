<?php

namespace spec\Purist\Specification;

use PhpSpec\ObjectBehavior;
use Purist\Specification\CompositeSpecification;
use Purist\Specification\Not;
use Purist\Specification\SpecificationInterface;

class NotSpec extends ObjectBehavior
{
    public function it_should_have_correct_types(SpecificationInterface $specification): void
    {
        $this->beConstructedWith($specification);

        $this->shouldHaveType(\Purist\Specification\Not::class);
        $this->shouldHaveType(\Purist\Specification\SpecificationInterface::class);
        $this->shouldHaveType(\Purist\Specification\CompositeSpecification::class);
    }

    public function it_should_pass_if_child_fails(SpecificationInterface $specification): void
    {
        $className = 'foo';
        $this->beConstructedWith($specification);

        $specification->isSatisfiedBy($className)->willReturn(false);

        $this->isSatisfiedBy($className)->shouldReturn(true);
    }
}
