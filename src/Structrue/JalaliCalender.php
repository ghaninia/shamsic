<?php

namespace GhaniniaIR\Schedule\Structrue;

use DateTime;
use DateTimeZone;
use Morilog\Jalali\Jalalian;

class JalaliCalender
{
    private $jalaliDateTime;

    public function __construct(
        protected ?DateTime $dateTime = null,
        protected ?DateTimeZone $timezone = null
    ) {
        $this->jalaliDateTime = Jalalian::fromDateTime($dateTime, $timezone);
    }

    public function getJalaliDateTime()
    {
        return $this->jalaliDateTime;
    }

    public function getCurrentDate()
    {
        return $this->jalaliDateTime->format('Y-m-d');
    }

    public function getCurrentTime()
    {
        return $this->jalaliDateTime->format('H:i:s');
    }

    public function getYear(): int
    {
        return $this->jalaliDateTime->format('Y');
    }

    public function getMonth(): int
    {
        return $this->jalaliDateTime->format('m');
    }

    public function getDay(): int
    {
        return $this->jalaliDateTime->format('d');
    }

    public function getHour(): int
    {
        return $this->jalaliDateTime->format('H');
    }

    public function getMinute(): int
    {
        return $this->jalaliDateTime->format('i');
    }

    public function getSecond(): int
    {
        return $this->jalaliDateTime->format('s');
    }

    public function getWeekDay(): int
    {
        return $this->jalaliDateTime->format('w');
    }

    public function getWeekOfYear(): int
    {
        return $this->jalaliDateTime->format('W');
    }

    public function getDayOfYear(): int
    {
        return $this->jalaliDateTime->format('z');
    }

    public function getDayOfWeek(): int
    {
        return $this->jalaliDateTime->format('N');
    }

    public function getDayOfMonth(): int
    {
        return $this->jalaliDateTime->format('j');
    }

    public function getDayOfWeekInMonth(): int
    {
        return $this->jalaliDateTime->format('W');
    }

    public function getDayOfWeekInYear(): int
    {
        return $this->jalaliDateTime->format('z');
    }

    public function getDayOfWeekInMonthInYear(): int
    {
        return $this->jalaliDateTime->format('W');
    }

    public function getWeekOfMonth(): int
    {
        return $this->jalaliDateTime->format('W');
    }
}
