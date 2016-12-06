<?php
namespace TomasFejfar\DateTime;

class DateTimeErrorHandler
{
    public function handle($date, array $errors)
    {
        $noWarnings = $errors['warning_count'] === 0;
        $noErrors = $errors['error_count'] === 0;
        $dateParsingSucceeded = ($date !== false);
        if ($dateParsingSucceeded && $noWarnings && $noErrors) {
            return;
        }
        throw new InvalidFormatException('Parsing failed', 0, null, $errors['errors'], $errors['warnings']);
    }
}
