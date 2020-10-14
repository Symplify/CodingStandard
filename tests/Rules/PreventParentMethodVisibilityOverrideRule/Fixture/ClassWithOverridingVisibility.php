<?php

declare(strict_types=1);

namespace Symplify\CodingStandard\Tests\Rules\PreventParentMethodVisibilityOverrideRule\Fixture;

final class ClassWithOverridingVisibility extends GoodVisibility
{
    public function run()
    {
    }
}
