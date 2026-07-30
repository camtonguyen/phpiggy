<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\SessionException;


class SessionMiddleWare implements MiddlewareInterface
{
  public function process(callable $next)
  {
    if (session_status() === PHP_SESSION_ACTIVE) {
      throw new SessionException("Session already active.");
    }

    ob_end_clean();

    if (headers_sent($fileName, $line)) {
      throw new SessionException("Header already sent. Consider enabling output buffering. Data outputted from ${fileName} - Line: {$line}");
    }

    session_start();

    $next();

    session_write_close();
  }
}
