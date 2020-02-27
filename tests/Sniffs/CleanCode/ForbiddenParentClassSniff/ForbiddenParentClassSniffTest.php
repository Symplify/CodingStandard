<?php

declare(strict_types=1);

namespace Symplify\CodingStandard\Tests\Sniffs\CleanCode\ForbiddenParentClassSniff;

use Iterator;
use Symplify\CodingStandard\Sniffs\CleanCode\ForbiddenParentClassSniff;
use Symplify\EasyCodingStandardTester\Testing\AbstractCheckerTestCase;

final class ForbiddenParentClassSniffTest extends AbstractCheckerTestCase
{
    /**
     * @dataProvider provideDataForTest()
     */
    public function test(string $file): void
    {
        $this->doTestFiles([$file]);
    }

    public function provideDataForTest(): Iterator
    {
        yield [__DIR__ . '/Fixture/wrong.php.inc'];
        yield [__DIR__ . '/Fixture/wrong2.php.inc'];
        yield [__DIR__ . '/Fixture/wrong3.php.inc'];
        yield [__DIR__ . '/Fixture/wrong4.php.inc'];
        yield [__DIR__ . '/Fixture/correct.php.inc'];
        yield [__DIR__ . '/Fixture/correct2.php.inc'];
    }

    protected function getCheckerClass(): string
    {
        return ForbiddenParentClassSniff::class;
    }

    /**
     * @return mixed[]
     */
    protected function getCheckerConfiguration(): array
    {
        return [
            'forbiddenParentClasses' => [
                '*\SomeForbiddenParentClass',
                'SomeOtherNamespace\ExactClassMatch',
                'PreslashExactClassMatch',
            ],
        ];
    }
}
