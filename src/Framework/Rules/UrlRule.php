<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class UrlRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    if (empty($data[$field])) {
      return true;
    }

    if (!filter_var($data[$field], FILTER_VALIDATE_URL)) {
      return false;
    }

    $scheme = parse_url($data[$field], PHP_URL_SCHEME);
    return in_array($scheme, ['http', 'https'], true);
  }

  public function getMessage(array $data, string $field, array $params): string
  {
    return "Must be a valid URL starting with http:// or https://.";
  }
}
