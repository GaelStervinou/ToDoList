<?php declare(strict_types=1);

namespace entities;

class EmailValidator
{
  public function isValid(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
  }
}