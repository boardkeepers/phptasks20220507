<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Service\ExerciseOneService;

final class ExerciseOneServiceTest extends TestCase
{
    /**
     * Test if words without a repeating letter return true
     *
     * @return void
     */
    public function testValidWords(): void
    {
        $this->assertTrue(ExerciseOneService::hasNoRepeatingLetter('documentarily'));
        $this->assertTrue(ExerciseOneService::hasNoRepeatingLetter('aftershock'));
        $this->assertTrue(ExerciseOneService::hasNoRepeatingLetter('countryside'));
        $this->assertTrue(ExerciseOneService::hasNoRepeatingLetter('six-year-old'));
    }

    /**
     * Test if words with a repeating letter return false
     *
     * @return void
     */
    public function testInvalidWords(): void
    {
        $this->assertFalse(ExerciseOneService::hasNoRepeatingLetter('Double-down'));
        $this->assertFalse(ExerciseOneService::hasNoRepeatingLetter('Euclidean'));
        $this->assertFalse(ExerciseOneService::hasNoRepeatingLetter('epidemic'));
    }
    
    /**
     * Test if an empty string returns true.
     *
     * @return void
     */
    public function testEmpty(): void
    {
        $this->assertTrue(ExerciseOneService::hasNoRepeatingLetter(''));
    }
    
    /**
     * Test if null throws TypeError.
     *
     * @return void
     */
    public function testNull(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseOneService::hasNoRepeatingLetter(null);
    }
    
    /**
     * Test if an integer throws TypeError.
     *
     * @return void
     */
    public function testInteger(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseOneService::hasNoRepeatingLetter(123);
    }
    
    /**
     * Test if zero throws TypeError.
     *
     * @return void
     */
    public function testZero(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseOneService::hasNoRepeatingLetter(0);
    }
    
    /**
     * Test if array throws TypeError.
     *
     * @return void
     */
    public function testArray(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseOneService::hasNoRepeatingLetter(['d','o','c','u','m','e','n','t','a','r','i','l','y']);
    }
}