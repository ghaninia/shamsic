<?php

namespace GhaniniaIR\Schedule\Structrue;

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
                "validation" => \GhaniniaIR\Schedule\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\Seprator::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\First\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\First\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\First\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\MinuteRange::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\First\MinuteRange::class,
            ],
        ], [
            /**
             * part 2 = hour
             */
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\Seprator::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Second\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Second\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Second\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\HourRange::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Second\HourRange::class,
            ],
        ], [
            /**
             * part 3 = day of month
             */
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\Seprator::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Third\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Third\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Third\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\DayOfMonthRange::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Third\DayOfMonthRange::class,
            ],
        ], [
            /**
             * part 4 = month
             */
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\Seprator::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Fourth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Fourth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Fourth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\MonthRange::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Fourth\MonthRange::class,
            ],
        ], [
            /**
             * part 5 = day of week
             */
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\Seprator::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Fifth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Schedule\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\Schedule\Statements\Arguments\Fifth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Fifth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Schedule\Validations\Single\DayOfWeekRange::class,
                "statement"  => \GhaniniaIR\Schedule\Statements\Arguments\Fifth\DayOfWeekRange::class,
            ],
        ]
    ];
}
