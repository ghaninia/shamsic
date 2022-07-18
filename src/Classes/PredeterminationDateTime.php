<?php

namespace GhaniniaIR\Schedule\Classes;

use GhaniniaIR\Schedule\Classes\JalaliCalender;

class PredeterminationDateTime
{
    protected ?JalaliCalender $jalaliCalender = null;

    public function setCalender(JalaliCalender $jalaliCalender)
    {
        $this->jalaliCalender = $jalaliCalender;
        return $this;
    }

    public function getCalender(): ?JalaliCalender
    {
        return $this->jalaliCalender;
    }
}
