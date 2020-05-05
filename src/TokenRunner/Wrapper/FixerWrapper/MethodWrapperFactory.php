<?php

declare(strict_types=1);

namespace Symplify\CodingStandard\TokenRunner\Wrapper\FixerWrapper;

use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use Symplify\CodingStandard\TokenRunner\Guard\TokenTypeGuard;
use Symplify\CodingStandard\TokenRunner\ValueObject\Wrapper\FixerWrapper\MethodWrapper;

final class MethodWrapperFactory
{
    /**
     * @var ArgumentWrapperFactory
     */
    private $argumentWrapperFactory;

    /**
     * @var TokenTypeGuard
     */
    private $tokenTypeGuard;

    public function __construct(ArgumentWrapperFactory $argumentWrapperFactory, TokenTypeGuard $tokenTypeGuard)
    {
        $this->argumentWrapperFactory = $argumentWrapperFactory;
        $this->tokenTypeGuard = $tokenTypeGuard;
    }

    public function createFromTokensAndPosition(Tokens $tokens, int $position): MethodWrapper
    {
        /** @var Token $token */
        $token = $tokens[$position];
        $this->tokenTypeGuard->ensureIsTokenType($token, [T_FUNCTION], __METHOD__);

        return new MethodWrapper(
            $tokens,
            $position,
            $this->argumentWrapperFactory->createArgumentsFromTokensAndFunctionPosition($tokens, $position)
        );
    }
}
