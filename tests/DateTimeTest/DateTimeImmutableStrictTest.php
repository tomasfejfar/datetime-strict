<?php
namespace TomasFejfarTest\DateTime;

use TomasFejfar\DateTime\DateTimeImmutableStrict;
use TomasFejfar\DateTime\InvalidFormatException;

class DateTimeImmutableStrictTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateValidDateTime()
    {
        $date = DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11 13:35:08');
        $this->assertInstanceOf(\DateTimeImmutable::class, $date);
        $this->assertEquals(\DateTimeImmutable::class, get_class($date));
    }

    public function testCreateInvalidDate()
    {
        try {
            DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', '1986-13-11 13:35:08');
            $this->fail('Must throw exception!');
        } catch (InvalidFormatException $e) {
            $warnings = $e->getWarnings();
            $this->assertCount(1, $warnings);
            $warning = array_pop($warnings);
            $this->assertEquals('The parsed date was invalid', $warning);
        }
    }

    public function testCreateInvalidTime()
    {
        try {
            DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11 24:35:08');
            $this->fail('Must throw exception!');
        } catch (InvalidFormatException $e) {
            $warnings = $e->getWarnings();
            $this->assertCount(1, $warnings);
            $warning = array_pop($warnings);
            $this->assertEquals('The parsed time was invalid', $warning);
        }
    }

    public function testCreateInvalidDateTime()
    {
        try {
            DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', '1986-13-11 24:35:08');
            $this->fail('Must throw exception!');
        } catch (InvalidFormatException $e) {
            $warnings = $e->getWarnings();
            $this->assertCount(1, $warnings);
            $warning = array_pop($warnings);
            $this->assertEquals('The parsed date was invalid', $warning);
        }
    }

    public function testCreateValidDate()
    {
        try {
            DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11');
            $this->fail('Must throw exception!');
        } catch (InvalidFormatException $e) {
            $errors = $e->getErrors();
            $this->assertCount(1, $errors);
            $error = array_pop($errors);
            $this->assertEquals('Data missing', $error);
        }
    }

    public function testCreateInvalidFormat()
    {
        try {
            DateTimeImmutableStrict::createFromFormat('Y-m-d H:i:s', 'this is not a date');
            $this->fail('Must throw exception!');
        } catch (InvalidFormatException $e) {
            $errors = $e->getErrors();
            $this->assertCount(2, $errors);
            $error = array_pop($errors);
            $this->assertEquals('Data missing', $error);
            $error = array_pop($errors);
            $this->assertEquals('A four digit year could not be found', $error);
        }
    }
}
