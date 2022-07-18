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
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\Seprator::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\First\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\First\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\First\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\MinuteRange::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\First\MinuteRange::class,
            ],
        ], [
            /**
             * part 2 = hour
             */
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\Seprator::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Second\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Second\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Second\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\HourRange::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Second\HourRange::class,
            ],
        ], [
            /**
             * part 3 = day of month
             */
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\Seprator::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Third\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Third\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Third\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\DayOfMonthRange::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Third\DayOfMonthRange::class,
            ],
        ], [
            /**
             * part 4 = month
             */
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\Seprator::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Fourth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Fourth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Fourth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\MonthRange::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Fourth\MonthRange::class,
            ],
        ], [
            /**
             * part 5 = day of week
             */
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\Seprator::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Fifth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\SolarCron\Statements\Arguments\Fifth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Fifth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\SolarCron\Validations\Single\DayOfWeekRange::class,
                "statement"  => \GhaniniaIR\SolarCron\Statements\Arguments\Fifth\DayOfWeekRange::class,
            ],
        ]
    ];
}
