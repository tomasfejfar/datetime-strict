<?php
namespace TomasFejfarTest\DateTime;

use TomasFejfar\DateTime\DateTimeStrict;
use TomasFejfar\DateTime\InvalidFormatException;

class DateTimeStrictTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateValidDateTime()
    {
        $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11 13:35:08');
        $this->assertInstanceOf(\DateTime::class, $date);
        $this->assertEquals(\DateTime::class, get_class($date));
    }

    public function testCreateInvalidDate()
    {
        try {
            $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '1986-13-11 13:35:08');
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
            $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11 24:35:08');
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
            $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '1986-13-11 24:35:08');
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
            $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '1986-08-11');
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
            $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', 'this is not a date');
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
