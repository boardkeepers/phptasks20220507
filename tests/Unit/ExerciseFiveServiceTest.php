<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Service\ExerciseFiveService;

final class ExerciseFiveServiceTest extends TestCase
{
    /**
     * Test if a valid file returns an expected array
     *
     * @return void
     */
    public function testValidFile(): void
    {
        $this->assertEquals(ExerciseFiveService::reaxmlToArray('./assets/sample-reaxml.xml'), 
            [
                '1P3115' => 'commercial',
                '1P0116' => 'commercial',
                '1P0117' => 'commercial',
                '1P0118' => 'rental',
                '1P0119' => 'rural',
                '1P0120' => 'business',
                '1P0121' => 'business',
                '1P0122' => 'business',
                '1P0123' => 'holidayRental',
                '1P0036' => 'residential',
                '1P0006' => 'commercial',
                '2631096' => 'holidayRental'
            ]
        );
    }
    
    /**
     * Test if non-existent or malformatted files that are not a positive integer returns an empty array
     *
     * @return void
     */
    public function testInvalidFiles(): void
    {
        $this->assertEquals(ExerciseFiveService::reaxmlToArray($_SERVER['DOCUMENT_ROOT'].'./assets/non-existent.xml'), []);
        $this->assertEquals(ExerciseFiveService::reaxmlToArray($_SERVER['DOCUMENT_ROOT'].'./src/ExerciseFiveService.php'), []);
    }

    /**
     * Test if null throws TypeError.
     *
     * @return void
     */
    public function testNull(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFiveService::reaxmlToArray(null);
    }
    
    /**
     * Test if an integer throws TypeError.
     *
     * @return void
     */
    public function testInteger(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFiveService::reaxmlToArray(258);
    }
    
    /**
     * Test if array throws TypeError.
     *
     * @return void
     */
    public function testArray(): void
    {
        $this->expectException(\TypeError::class);
        ExerciseFiveService::reaxmlToArray(['./assets/sample-reaxml.xml']);
    }
}