<?php

namespace GhaniniaIR\Shamsic\Classes;

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
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\Seprator::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\First\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 59
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\First\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\First\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\MinuteRange::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\First\MinuteRange::class,
            ],
        ], [
            /**
             * part 2 = hour
             */
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\Seprator::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Second\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 23
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Second\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Second\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\HourRange::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Second\HourRange::class,
            ],
        ], [
            /**
             * part 3 = day of month
             */
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\Seprator::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Third\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 31
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Third\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Third\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\DayOfMonthRange::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Third\DayOfMonthRange::class,
            ],
        ], [
            /**
             * part 4 = month
             */
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\Seprator::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Fourth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\RangeOfValue::class,
                    "args" => [
                        1, 12
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Fourth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Fourth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\MonthRange::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Fourth\MonthRange::class,
            ],
        ], [
            /**
             * part 5 = day of week
             */
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\AnyValue::class,
                "statement" => true,
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\Seprator::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Fifth\Seprator::class
            ],
            [
                "validation" => [
                    "class" => \GhaniniaIR\Shamsic\Validations\Single\RangeOfValue::class,
                    "args" => [
                        0, 6
                    ],
                ],
                "statement" => \GhaniniaIR\Shamsic\Statements\Arguments\Fifth\RangeOfValue::class
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\StepValue::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Fifth\StepValue::class,
            ],
            [
                "validation" => \GhaniniaIR\Shamsic\Validations\Single\DayOfWeekRange::class,
                "statement"  => \GhaniniaIR\Shamsic\Statements\Arguments\Fifth\DayOfWeekRange::class,
            ],
        ]
    ];
}
