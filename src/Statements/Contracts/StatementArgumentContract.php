<?php

namespace GhaniniaIR\Shamsic\Statements\Contracts;

use DateTime;
use DateTimeZone;
use GhaniniaIR\Shamsic\Classes\JalaliCalender;

abstract class StatementArgumentContract 
{
    /**
     * @var mixed $value
     * @var JalaliCalender|null $jalaliCalender
     */
    public function __construct(protected mixed $value, private ?JalaliCalender $jalaliCalender = null)
    {
    }

    /**
     * get jalali date format from gregorian date
     * @var DateTime|null $dateTime
     * @var DateTimeZone|null $dateTimeZone
     * @return JalaliCalender
     */
    public function jalaliCalender(DateTime $dateTime = null, DateTimeZone $dateTimeZone = null): JalaliCalender
    {
        return $this->jalaliCalender ?? new JalaliCalender($dateTime, $dateTimeZone);
    }

    /**
     * passed method is used to check if the value is valid or not.
     * @return bool
     */
    abstract public function passed(): bool;
}
