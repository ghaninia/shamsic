<?php

use GhaniniaIR\Schedule\Validations\ExpressionRule;
use PHPUnit\Framework\TestCase;

class ExpressionRuleTest extends TestCase
{

    public function validExpression()
    {
        return [
            ["* * * * *"],
            ["5 0 * 8 *"],
            ["15 14 1 * *"],
            ["0 22 * * 1-5"],
            ["0 0,12 1 */2 *"] ,
            ["0-59 0-23 1-31 1-12 0-6"],
            ["0,59 0,23 1,31 1,12 0,6"],
            ["59 22 31 12 5"],
            ["0 0,12 1 */2 *"],
            ["0 4 8-14 * *"],
            ["0 0 1,15 * 3"],
            ["1,5 0 1,15 * 3"],
            ["2,8 0 1,15 * 3"],
            ["*/5 0 1,15 * 3"],
            ["0-59 0 1,15 * 3"],
            ["59-59 0 1,15 * 3"],
            ["* * * * 7"],
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
        $this->expectException(\GhaniniaIR\Schedule\Exceptions\ArgumentCountError::class);
        $rule = (new ExpressionRule('* * * *'))->dispath();
    }

    /** 
     * @test 
     */
    public function exceptionErrorsWhenTooMoreArgs()
    {
        $this->expectException(\GhaniniaIR\Schedule\Exceptions\ArgumentCountError::class);
        $rule = (new ExpressionRule('* * * *'))->dispath();
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative1()
    {
        $rule = (new ExpressionRule('* * * * 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(4, $errors[0]);
        $this->assertCount(1, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative2()
    {
        $rule = (new ExpressionRule('* * * 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(3, $errors[0]);
        $this->assertEquals(4, $errors[1]);
        $this->assertCount(2, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative3()
    {
        $rule = (new ExpressionRule('* * 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(2, $errors[0]);
        $this->assertEquals(3, $errors[1]);
        $this->assertEquals(4, $errors[2]);
        $this->assertCount(3, $errors);
    }
    
    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative4()
    {
        $rule = (new ExpressionRule('* 980 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(1, $errors[0]);
        $this->assertEquals(2, $errors[1]);
        $this->assertEquals(3, $errors[2]);
        $this->assertEquals(4, $errors[3]);
        $this->assertCount(4, $errors);
    }
    
    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative5()
    {
        $rule = (new ExpressionRule('x 980 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(0, $errors[0]);
        $this->assertEquals(1, $errors[1]);
        $this->assertEquals(2, $errors[2]);
        $this->assertEquals(3, $errors[3]);
        $this->assertEquals(4, $errors[4]);
        $this->assertCount(5, $errors);
    }
}
