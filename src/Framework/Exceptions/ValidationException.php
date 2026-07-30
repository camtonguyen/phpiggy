<?php

declare(strict_types=1);

namespace Framework\Exceptions;

use RuntimeException;

class ValidationException extends RuntimeException
{
  public function __construct(private array $errors, private int $statusCode = 422)
  {
    parent::__construct("Validation failed.");
  }

  public function getErrors(): array
  {
    return $this->errors;
  }

  public function getStatusCode(): int
  {
    return $this->statusCode;
  }
}
