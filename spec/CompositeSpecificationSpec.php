<?php

namespace spec\Purist\Specification;

use PhpSpec\ObjectBehavior;
use Purist\Specification\AndX;
use Purist\Specification\CompositeSpecification;
use Purist\Specification\Not;
use Purist\Specification\OrX;
use Purist\Specification\SpecificationInterface;

class CompositeSpecificationSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beAnInstanceOf('spec\Purist\Specification\DummySpec');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(\Purist\Specification\CompositeSpecification::class);
    }

    public function it_should_return_and_specification(SpecificationInterface $specification): void
    {
        $specification->isSatisfiedBy('foo')->willReturn(true);

        $and = $this->andX($specification);
        $and->shouldHaveType(\Purist\Specification\AndX::class);
        $and->isSatisfiedBy('foo')->shouldReturn(true);
    }

    public function it_should_return_or_specification(SpecificationInterface $specification): void
    {
        $specification->isSatisfiedBy('foo')->willReturn(false);

        $or = $this->orX($specification);
        $or->shouldHaveType(\Purist\Specification\OrX::class);
        $or->isSatisfiedBy('foo')->shouldReturn(true);
    }

    public function it_should_return_not_specification(SpecificationInterface $specification): void
    {
        $specification->isSatisfiedBy('foo')->willReturn(true);

        $not = $this->not($specification);
        $not->shouldHaveType(\Purist\Specification\Not::class);
        $not->isSatisfiedBy('foo')->shouldReturn(false);
    }
}

readonly class DummySpec extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    #[\Override]
    public function isSatisfiedBy($value): bool
    {
        return $value === 'foo';
    }
}
