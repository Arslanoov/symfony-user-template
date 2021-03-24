<?php

declare(strict_types=1);

namespace User\Exception;

use Domain\Exception\DomainException;
use Throwable;

final class ExistsWithThisUsername extends DomainException
{
    public function __construct(
        string $message = 'User with this username already exists',
        int $code = 419,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
