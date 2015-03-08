<?php

namespace spec\Rb\Specification;

use PhpSpec\ObjectBehavior;
use Rb\Specification\AndX;
use Rb\Specification\CompositeSpecification;
use Rb\Specification\Not;
use Rb\Specification\OrX;
use Rb\Specification\SpecificationInterface;

class CompositeSpecificationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(DummySpec::class);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CompositeSpecification::class);
    }

    public function it_should_return_and_specification(SpecificationInterface $specification)
    {
        $specification->isSatisfiedBy('foo')->willReturn(true);

        $and = $this->andX($specification);
        $and->shouldHaveType(AndX::class);
        $and->isSatisfiedBy('foo')->shouldReturn(true);
    }

    public function it_should_return_or_specification(SpecificationInterface $specification)
    {
        $specification->isSatisfiedBy('foo')->willReturn(false);

        $or = $this->orX($specification);
        $or->shouldHaveType(OrX::class);
        $or->isSatisfiedBy('foo')->shouldReturn(true);
    }

    public function it_should_return_not_specification(SpecificationInterface $specification)
    {
        $specification->isSatisfiedBy('foo')->willReturn(true);

        $not = $this->not($specification);
        $not->shouldHaveType(Not::class);
        $not->isSatisfiedBy('foo')->shouldReturn(false);
    }
}

class DummySpec extends CompositeSpecification
{
    /**
     * Returns a boolean indicating whether or not this specification can support the given class
     * @param  string $className
     * @return bool
     */
    public function isSatisfiedBy($className)
    {
        return $className === 'foo';
    }
}
