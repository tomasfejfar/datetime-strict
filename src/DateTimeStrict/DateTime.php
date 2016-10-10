<?php

namespace DateTimeStrict;

class DateTime
{
    public static function createFromFormatStrict($format, $time, \DateTimeZone $object = null)
    {
        if (!$object) {
            $object = new \DateTimeZone(date_default_timezone_get());
        }
        $date = \DateTime::createFromFormat($format, $time, $object);
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
