<?php

declare(strict_types=1);

namespace User\Model;

use Assert\AssertionFailedException;
use Domain\Exception\DomainAssertionException;
use Domain\Validation\DomainLogicAssertion;
use Exception\UnexpectedUuidType;
use Ramsey\Uuid\Uuid;

class Id
{
    private const UUID4 = 'uuid4';

    private string $value;

    /**
     * Id constructor.
     * @param string $value
     * @throws AssertionFailedException
     * @throws DomainAssertionException
     */
    public function __construct(string $value)
    {
        DomainLogicAssertion::notBlank($value, 'User id required');
        $this->value = $value;
    }

    /**
     * @throws UnexpectedUuidType
     * @throws AssertionFailedException
     * @param string $type
     * @return self
     */
    public static function generate(string $type = self::UUID4): self
    {
        if ($type === self::UUID4) {
            return new self(Uuid::uuid4()->toString());
        }

        throw new UnexpectedUuidType();
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
