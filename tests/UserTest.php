<?php declare(strict_types=1);

require 'entities/User.php';

use PHPUnit\Framework\TestCase;
use entities\User;

class UserTest extends TestCase
{
  /**
   * @dataProvider providerTestIsValid
   */
  public function testIsValid($firstName, $lastName, $birthday, $expected): void 
  {
    // Arrange
    $user = new User($firstName, $lastName, 'johndoe@gmail.com', 'Azerty1234!', $birthday);

    // Act
    $output = $user->isValid();

    // Assert
    self::assertEquals($expected, $output);
  }

  public static function providerTestIsValid(): array {
    $dateTime = new DateTime();
    $dateTime->modify('-13 years');
    $dateTime = $dateTime->format('Y-m-d');

    $dateTimeTooYoung = new DateTime();
    $dateTimeTooYoung->modify('-10 years');
    $dateTimeTooYoung = $dateTimeTooYoung->format('Y-m-d');

    return [
      'Should be true with a good user' => ['John', 'Doe', $dateTime, true],
      'Should be false with a user without first name' => ['', 'Doe', $dateTime, false],
      'Should be false with a user without last name' => ['John', '', $dateTime, false],
      'Should be false with a user without birthday' => ['John', 'Doe', '', false],
      'Should be false with a user under 13' => ['John', 'Doe', $dateTimeTooYoung, false],
    ];
  }

}