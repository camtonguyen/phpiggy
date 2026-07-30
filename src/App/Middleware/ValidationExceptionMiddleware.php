<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
  public function process(callable $next)
  {
    try {
      $next();
    } catch (ValidationException $e) {
      $_SESSION['errors'] = $e->getErrors();
      $_SESSION['old'] = array_diff_key($_POST, array_flip(['password', 'confirmPassword']));
      $referer = $_SERVER['HTTP_REFERER'];
      redirectTo($referer);
    }
  }
}
