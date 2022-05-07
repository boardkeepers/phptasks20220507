<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Service\ExerciseTwoService;

final class ExerciseTwoServiceTest extends TestCase
{
    /**
     * Test if valid literal date expressions return the correct date in "YYYY-mm-dd" format.
     *
     * @return void
     */
    public function testValidText(): void
    {
        $this->assertEquals(ExerciseTwoService::parseLiteralDate('The first Monday of October 2019'), '2019-10-07');
        $this->assertEquals(ExerciseTwoService::parseLiteralDate('The third Tuesday of October 2019'), '2019-10-15');
        $this->assertEquals(ExerciseTwoService::parseLiteralDate('The last Wednesday of October 2019'), '2019-10-30');
    }

    /**
     * Test if invalid literal date expressions return null.
     *
     * @return void
     */
    public function testInvalidText(): void
    {
        $this->assertNull(ExerciseTwoService::parseLiteralDate('The sixth Monday of October 2019'));
        $this->assertNull(ExerciseTwoService::parseLiteralDate('The third Xmasday of October 2019'));
        $this->assertNull(ExerciseTwoService::parseLiteralDate(''));
    }
    
    /**
     * Test if null throws TypeError.
     *
     * @return void
     */
    public function testNull(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseTwoService::parseLiteralDate(null);
    }
    
    /**
     * Test if an integer throws TypeError.
     *
     * @return void
     */
    public function testInteger(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseTwoService::parseLiteralDate(123);
    }
    
    /**
     * Test if zero throws TypeError.
     *
     * @return void
     */
    public function testZero(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseTwoService::parseLiteralDate(0);
    }
    
    /**
     * Test if array throws TypeError.
     *
     * @return void
     */
    public function testArray(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseTwoService::parseLiteralDate(['The first Monday of October 2019']);
    }
}