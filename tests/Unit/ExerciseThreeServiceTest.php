<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Service\ExerciseThreeService;

final class ExerciseThreeServiceTest extends TestCase
{
    /**
     * Test if two strings return a string merged charcter by character
     *
     * @return void
     */
    public function testStrings(): void
    {
        $this->assertEquals(ExerciseThreeService::mergeCharacterByCharacter('MICHAEL', 'JORDAN'), 'MJIOCRHDAAENL');
        $this->assertEquals(ExerciseThreeService::mergeCharacterByCharacter('MICHAEL', ''), 'MICHAEL');
        $this->assertEquals(ExerciseThreeService::mergeCharacterByCharacter('MICHAEL 1', '!@# jordan'), 'M!I@C#H AjEoLr d1an');
    }
    
    /**
     * Test if empty strings return an empty string.
     *
     * @return void
     */
    public function testEmpty(): void
    {
        $this->assertEquals(ExerciseThreeService::mergeCharacterByCharacter('', ''), '');
        $this->assertEquals(ExerciseThreeService::mergeCharacterByCharacter('  ', '    '), '');
    }
    
    /**
     * Test if null throws TypeError.
     *
     * @return void
     */
    public function testNull(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseThreeService::mergeCharacterByCharacter(null, null);
    }
    
    /**
     * Test if an integer throws TypeError.
     *
     * @return void
     */
    public function testInteger(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseThreeService::mergeCharacterByCharacter(123, 456);
    }
    
    /**
     * Test if array throws TypeError.
     *
     * @return void
     */
    public function testArray(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseThreeService::mergeCharacterByCharacter(['MICHAEL'], ['J','O','R','D','A','N']);
    }
}