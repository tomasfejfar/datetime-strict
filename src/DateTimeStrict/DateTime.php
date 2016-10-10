<?php

namespace DateTimeStrict;

class DateTime
{
    public static function createFromFormatStrict($format, $time, \DateTimeZone $timezone = null)
    {
        if (!$timezone) {
            $timezone = new \DateTimeZone(date_default_timezone_get());
        }
        $date = \DateTime::createFromFormat($format, $time, $timezone);
        $errors = \DateTime::getLastErrors();
        $noWarnings = $errors['warning_count'] === 0;
        $noErrors = $errors['error_count'] === 0;
        if ($noWarnings && $noErrors) {
            return $date;
        }
        $message = sprintf('Invalid date time format "%s"', $time);
        throw new StrictFormatException($message, 0, null, $errors['errors'], $errors['warnings']);
    }
}
