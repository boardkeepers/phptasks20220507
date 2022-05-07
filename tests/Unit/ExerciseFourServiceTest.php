<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Service\ExerciseFourService;

final class ExerciseFourServiceTest extends TestCase
{
    /**
     * Test if positive integers return expected super-digit value
     *
     * @return void
     */
    public function testPostiveIntegers(): void
    {
        $this->assertEquals(ExerciseFourService::superDigit(4), 4);
        $this->assertEquals(ExerciseFourService::superDigit(18), 9);
        $this->assertEquals(ExerciseFourService::superDigit(258), 6);
    }
    
    /**
     * Test if numbers that are not a positive integer returns 0
     *
     * @return void
     */
    public function testInvalidNumbers(): void
    {
        $this->assertEquals(ExerciseFourService::superDigit(0), 0);
        $this->assertEquals(ExerciseFourService::superDigit(-258), 0);
    }

    /**
     * Test if float throws TypeError.
     *
     * @return void
     */
    public function testFloat(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFourService::superDigit(25.80);
    }

    /**
     * Test if null throws TypeError.
     *
     * @return void
     */
    public function testNull(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFourService::superDigit(null);
    }
    
    /**
     * Test if an string throws TypeError.
     *
     * @return void
     */
    public function testString(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFourService::superDigit('258');
    }
    
    /**
     * Test if array throws TypeError.
     *
     * @return void
     */
    public function testArray(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFourService::superDigit([258]);
    }
}