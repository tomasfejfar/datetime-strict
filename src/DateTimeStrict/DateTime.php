<?php

namespace DateTimeStrict;

class DateTime extends \DateTime
{
    public static function createFromFormat($format, $time, $object = null)
    {
        $date = parent::createFromFormat($format, $time, $object);
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
