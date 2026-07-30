<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;


class FlashMiddleware implements MiddlewareInterface
{
  public function __construct(private TemplateEngine $view) {}

  public function process(callable $next)
  {

    $this->view->addGlobal('errors', $_SESSION['errors'] ?? []);
    $this->view->addGlobal('old', $_SESSION['old'] ?? []);

    unset($_SESSION['errors'], $_SESSION['old']);

    $next();
  }
}
