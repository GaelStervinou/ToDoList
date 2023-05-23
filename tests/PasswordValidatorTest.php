<?php declare(strict_types=1);

require 'entities/PasswordValidator.php';

use PHPUnit\Framework\TestCase;
use entities\PasswordValidator;

class PasswordValidatorTest extends TestCase
{
  /**
   * @dataProvider provideTestIsValid
  */
  public function testIsValid($password, $expected): void
  { 
    // Arrange
    $passwordValidator = new PasswordValidator();

    // Act
    $output = $passwordValidator->isValid($password);

    // Assert
    self::assertEquals($expected, $output);
  }

  public static function provideTestIsValid(): array {
    return [
      'Should be true with a good password' => ['Azerty1234!', true],
      'Should be false with a password without number' => ['Azerty!', false],
      'Should be false with a password without uppercase' => ['azerty1234!', false],
      'Should be false with a password without lowercase' => ['AZERTY1234!', false],
      'Should be false with a password without special character' => ['Azerty1234', false],
      'Should be false with a password with less than 8 characters' => ['Azerty!', false],
      'Should be false with a password with more than 40 characters' => ['Azerty1234!Azerty1234!Azerty1234!Azerty1234!Azerty1234!', false],
    ];
  }
}