<?php

use GhaniniaIR\SolarCron\Validations\ExpressionRule;
use PHPUnit\Framework\TestCase;

class ExpressionRuleTest extends TestCase
{

    public function validExpression()
    {
        return [
            ['* * * * *'],
            ['0-59 0-23 1-31 1-12 0-6'],
            ['0,59 0,23 1,31 1,12 0,6'],
            ['59 22 31 12 5'],
            ['0 0,12 1 */2 *'],
            ['0 4 8-14 * *'],
            ['0 0 1,15 * 3'],
            ['1,5 0 1,15 * 3'],
            ['2,8 0 1,15 * 3'],
            ['*/5 0 1,15 * 3'],
            ['0-59 0 1,15 * 3'],
            ['59-59 0 1,15 * 3'],
            ['* * * * 7'],
        ];
    }

    public function invalidExpression()
    {
        return [

            ['0-60 * * * *'],
            ['0,60 * * * *'],
            ['* 0-24 * * *'],
            ['* 0,24 * * *'],

            ['* * 0 * *'],
            ['* * 32 * *'],
            ['* * 0-31 * *'],
            ['* * 0-32 * *'],
            ['* * 0,31 * *'],
            ['* * 0,32 * *'],

            ['* * * 0 *'],
            ['* * * 13 *'],
            ['* * * 0-13 *'],
            ['* * * 0-13 *'],
            ['* * * 0,13 *'],
            ['* * * 0,14 *'],

            ['* * * * 8'],
            ['* * * * 0-7'],
            ['* * * * 0,7'],
        ];
    }

    /** 
     * @test 
     * @dataProvider validExpression
     */
    public function validExpressionRule($expression)
    {
        $rule = (new ExpressionRule($expression))->dispath();
        $this->assertTrue($rule->passed());
    }

    /** 
     * @test 
     * @dataProvider invalidExpression
     */
    public function invalidExpressionRule($expression)
    {
        $rule = (new ExpressionRule($expression))->dispath();
        $this->assertFalse($rule->passed());
    }

    /** 
     * @test 
     */
    public function exceptionErrorsWhenTooFewArgs()
    {
        $this->expectException(\GhaniniaIR\SolarCron\Exceptions\ArgumentCountError::class);
        $rule = (new ExpressionRule('* * * *'))->dispath();
    }

    /** 
     * @test 
     */
    public function exceptionErrorsWhenTooMoreArgs()
    {
        $this->expectException(\GhaniniaIR\SolarCron\Exceptions\ArgumentCountError::class);
        $rule = (new ExpressionRule('* * * *'))->dispath();
    }
}
