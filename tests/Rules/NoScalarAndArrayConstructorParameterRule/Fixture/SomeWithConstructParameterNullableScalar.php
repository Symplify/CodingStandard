<?php

declare(strict_types=1);

namespace Symplify\CodingStandard\Tests\Rules\NoScalarAndArrayConstructorParameterRule\Fixture;

final class SomeWithConstructParameterNullableScalar
{
    /**
     * @var string|null
     */
    private $string;

    public function __construct(?string $string)
    {
        $this->string = $string;
    }
}
