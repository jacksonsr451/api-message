<?php

namespace App\Tests\Entity\Email;

use App\Entity\Email\Email;
use App\Service\BadWordsService;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testConstructorWithValidArguments(): void
    {
        $to = 'user@example.com';
        $subject = 'Valid subject';
        $body = 'Valid body';

        $email = new Email(to: $to, subject: $subject, body: $body, forbiddenWords: new BadWordsService());

        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals($to, $email->getTo());
        $this->assertEquals($subject, $email->getSubject());
        $this->assertEquals($body, $email->getBody());
    }

    public function testConstructorWithInvalidSubject(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $to = 'user@example.com';
        $subject = 'Invalid subject containing forbidden_word';
        $body = 'Valid body';

        new Email(to: $to, subject: $subject, body: $body, forbiddenWords: new BadWordsService());
    }

    public function testConstructorWithInvalidBody(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $to = 'user@example.com';
        $subject = 'Valid subject';
        $body = 'Invalid body containing forbidden_word';

        new Email(to: $to, subject: $subject, body: $body, forbiddenWords: new BadWordsService());
    }
}
