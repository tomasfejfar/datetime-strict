<?php
namespace TomasFejfar\DateTime;

class DateTimeImmutableStrict
{
    /**
     * Parse a string into a new DateTimeImmutable object according to the specified format with strict checking
     *
     * @param string $format Format accepted by date().
     * @param string $time String representing the time.
     * @param \DateTimeZone $timezone A DateTimeZone object representing the desired time zone.
     * @return \DateTimeImmutable
     * @throws InvalidFormatException
     * @link http://php.net/manual/en/datetime.createfromformat.php
     */
    public static function createFromFormat($format, $time, \DateTimeZone $timezone = null)
    {
        if (!$timezone) {
            $timezone = new \DateTimeZone(date_default_timezone_get());
        }
        $date = \DateTimeImmutable::createFromFormat($format, $time, $timezone);
        $errors = \DateTimeImmutable::getLastErrors();
        $handler = new DateTimeErrorHandler();
        try {
            $handler->handle($date, $errors);
            return $date;
        } catch (InvalidFormatException $e) {
            $message = sprintf('Invalid date time format "%s"', $time);
            throw new InvalidFormatException($message, 0, null, $e->getErrors(), $e->getWarnings());
        }
    }
}
