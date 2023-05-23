<?php declare(strict_types=1);

namespace entities;

use DateTime;
use entities\EmailValidator;
use entities\PasswordValidator;

class User
{
  public function __construct(
      private string $firstname,
      private string $name,
      private string $email,
      private string $password,
      private string $birthdate,
      private EmailValidator $emailValidator
    )
  {}

  public function isValid(): bool
  {
    if (empty($this->firstname) || empty($this->name) || empty($this->email) || empty($this->birthdate) || empty($this->password)) {
      return false;
    }

    if (!$this->emailValidator->isValid($this->email)) {
      return false;
    }

    if (!$this->passwordValidator->isValid($this->password)) {
      return false;
    }

    if ($this->is13YearsOld()) {
      return true;
    }

    return false;
  }

  private function is13YearsOld(): bool
  {
    $now = new DateTime();
    $birthdate = new DateTime($this->birthdate);
    $interval = $birthdate->diff($now);

    return $interval->y >= 13;
  }
}