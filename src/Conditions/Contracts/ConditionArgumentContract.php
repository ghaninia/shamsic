<?php

namespace GhaniniaIR\SolarCron\Conditions\Contracts;

use DateTime;
use DateTimeZone;
use GhaniniaIR\SolarCron\Structrue\JalaliCalender;

abstract class ConditionArgumentContract
{
    /**
     * @var mixed $value
     */
    public function __construct(protected $value)
    {
    }

    /**
     * get jalali date format from gregorian date
     * @var DateTime|null $dateTime
     * @var DateTimeZone|null $dateTimeZone
     * @return JalaliCalender
     */
    public function jalaliCalender(DateTime $dateTime = null, DateTimeZone $dateTimeZone): JalaliCalender
    {
        return new JalaliCalender($dateTime, $dateTimeZone);
    }

    /**
     * passed method is used to check if the value is valid or not.
     * @return bool
     */
    abstract public function passed(): bool;
}
