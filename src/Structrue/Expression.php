<?php

namespace GhaniniaIR\SolarCron\Structrue;

class Expression
{

    /**
     * cron job expression
     * cron job expression contains 5 parts
     * part 1 = minute
     * part 2 = hour
     * part 3 = day of month
     * part 4 = month
     * part 5 = day of week
     */
    const STRUCTURE = [
        [
            /**
             * part 1 = minute
             */


            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class => [
                "condition" => true,
            ],
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 59
                ],
                "condition" => \GhaniniaIR\SolarCron\Conditions\Arguments\First\Seprator::class
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 59
                ],
                "condition" => \GhaniniaIR\SolarCron\Conditions\Arguments\First\RangeOfValue::class
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class => [
                "condition" => \GhaniniaIR\SolarCron\Conditions\Arguments\First\StepValue::class,
            ],
            \GhaniniaIR\SolarCron\Validations\Single\MinuteRange::class => [
                "condition" => \GhaniniaIR\SolarCron\Conditions\Arguments\First\MinuteRange::class,
            ],

        ], [
            /**
             * part 2 = hour
             */
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 23
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 23
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\HourRange::class,
        ], [
            /**
             * part 3 = day of month
             */
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    1, 31
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    1, 31
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\DaysOfMonthRange::class,
        ], [
            /**
             * part 4 = month
             */
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    1, 12
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    1, 12
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\MonthRange::class,
        ], [
            /**
             * part 5 = day of week
             */
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 6
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 6
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\DaysOfWeekRange::class,
        ]
    ];
}
