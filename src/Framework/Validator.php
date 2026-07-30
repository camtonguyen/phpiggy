<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator
{
  private array $rules = [];

  public function add(string $alias, RuleInterface $rule)
  {
    $this->rules[$alias] = $rule;
  }
  public function validate(array $formData, array $fields)
  {
    $errors = [];

    foreach ($fields as $fieldName => $rules) {
      foreach ($rules as $rule) {
        [$ruleName, $params] = $this->parseRule($rule);
        $ruleValidator = $this->rules[$ruleName];
        if ($ruleValidator->validate($formData, $fieldName, $params)) {
          continue;
        }

        $errors[$fieldName][] = $ruleValidator->getMessage($formData, $fieldName, $params);
      }
    }

    if (count($errors)) {
      throw new ValidationException($errors);
    }
  }

  private function parseRule(string $rule): array
  {
    if (!str_contains($rule, ':')) {
      return [$rule, []];
    }

    [$name, $paramString] = explode(':', $rule, 2);
    return [$name, explode(',', $paramString)];
  }
}
