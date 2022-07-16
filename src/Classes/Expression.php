<?php

namespace GhaniniaIR\SolarCron\Classes;

use GhaniniaIR\SolarCron\Validations\Single\{
    AnyValue,
    Seprator,
    RangeOfValue,
    StepValue,
    MinuteRange,
    HourRange,
    DaysOfMonthRange,
    MonthRange,
    DaysOfWeekRange,
};

class Expression
{
    CONST STRUCTURE = [
        [
            #### ARG 0 VALIDATIONS ####
            AnyValue::class,
            Seprator::class => [
                'args' => [
                    0, 59
                ],
            ],
            RangeOfValue::class => [
                'args' => [
                    0, 59
                ],
            ],
            StepValue::class,
            MinuteRange::class,
        ], [
            #### ARG 1 VALIDATIONS ####
            AnyValue::class,
            Seprator::class => [
                'args' => [
                    0, 23
                ],
            ],
            RangeOfValue::class => [
                'args' => [
                    0, 23
                ],
            ],
            StepValue::class,
            HourRange::class,
        ], [
            #### ARG 2 VALIDATIONS ####
            AnyValue::class,
            Seprator::class => [
                'args' => [
                    1, 31
                ],
            ],
            RangeOfValue::class => [
                'args' => [
                    1, 31
                ],
            ],
            StepValue::class,
            DaysOfMonthRange::class,
        ], [
            #### ARG 3 VALIDATIONS ####
            AnyValue::class,
            Seprator::class => [
                'args' => [
                    1, 12
                ],
            ],
            RangeOfValue::class => [
                'args' => [
                    1, 12
                ],
            ],
            StepValue::class,
            MonthRange::class,
        ], [
            #### ARG 4 VALIDATIONS ####
            AnyValue::class,
            Seprator::class => [
                'args' => [
                    0, 6
                ],
            ],
            RangeOfValue::class => [
                'args' => [
                    0, 6
                ],
            ],
            StepValue::class,
            DaysOfWeekRange::class,
        ]
    ];
}
