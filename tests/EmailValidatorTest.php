<?php declare(strict_types=1);

require 'entities/EmailValidator.php';

use PHPUnit\Framework\TestCase;
use entities\EmailValidator;

class EmailValidatorTest extends TestCase
{

  /**
   * @dataProvider provideTestIsValid
  */
  public function testIsValid($email, $expected): void
  { 
    // Arrange
    $emailValidator = new EmailValidator();

    // Act
    $output = $emailValidator->isValid($email);

    // Assert
    self::assertEquals($expected, $output);
  }

  public static function provideTestIsValid(): array {
    return [
      'Should be true with a good email' => ['johndoe@gmail.com', true],
      'Should be false with a email without @' => ['johndoegmail.com', false],
      'Should be false with a email without .' => ['johndoe@gmailcom', false],
      'Should be false with a email without domain' => ['johndoe@.com', false],
      'Should be false with a email without name' => ['@gmail.com', false],
    ];
  }
}