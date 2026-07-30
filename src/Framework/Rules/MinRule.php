<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MinRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    if (empty($data[$field])) {
      return true;
    }

    return (float) $data[$field] >= (float) $params[0];
  }

  public function getMessage(array $data, string $field, array $params): string
  {
    return "Must be at least {$params[0]}.";
  }
}
