<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class SameRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    return ($data[$field] ?? null) === ($data[$params[0]] ?? null);
  }

  public function getMessage(array $data, string $field, array $params): string
  {
    return "Must match {$params[0]}.";
  }
}
