<?php declare(strict_types=1);

namespace entities;

class PasswordValidator
{
  public function isValid(string $password): bool
  {
    if (!$this->passwordLength($password) ||
        !$this->passwordContainsUppercase($password) ||
        !$this->passwordContainsLowercase($password) ||
        !$this->passwordContainsNumber($password) ||
        !$this->passwordContainsSpecialCharacter($password) ||
        $this->passwordContainsSpace($password)
      ) {
      return false;
    }

    return true;
  }

  private function passwordLength(string $password): bool
  {
    if (strlen($password) > 40 || strlen($password) < 8) {
      return false;
    }

    return true;
  }

  private function passwordContainsUppercase(string $password): bool
  {
    if (preg_match('/[A-Z]/', $password) === 0) {
      return false;
    }

    return true;
  }

  private function passwordContainsLowercase(string $password): bool
  {
    if (preg_match('/[a-z]/', $password) === 0) {
      return false;
    }

    return true;
  }

  private function passwordContainsNumber(string $password): bool
  {
    if (preg_match('/[0-9]/', $password) === 0) {
      return false;
    }

    return true;
  }

  private function passwordContainsSpecialCharacter(string $password): bool
  {
    if (preg_match('/[^a-zA-Z\d]/', $password) === 0) {
      return false;
    }

    return true;
  }

  private function passwordContainsSpace(string $password): bool
  {
    if (preg_match('/\s/', $password) === 0) {
      return false;
    }

    return true;
  }
}