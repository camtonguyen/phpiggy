<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class InRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    if (empty($data[$field])) {
      return true;
    }

    return in_array($data[$field], $params, true);
  }

  public function getMessage(array $data, string $field, array $params): string
  {
    return "Must be one of: " . implode(', ', $params) . ".";
  }
}
