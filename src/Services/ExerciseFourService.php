<?php

namespace Service;

class ExerciseFourService 
{
    /**
     * Repeatedly computes the sum of each individual digit until the result is a single-digit.
     * 
     * @param int $number
     * @return int $super
     */
    public static function superDigit (int $number) 
    {
        $super = 0;

        //Only positive integer allowed. 0 will be returned if otherwise.
        if ($number > 0)
        {
            $digits = str_split(strval($number));

            foreach($digits as $digit)
            {
                $super += intval($digit);
            }

            if ($super >= 10)
            {
                return ExerciseFourService::superDigit($super);
            }
        }

        //Return the super digit.
        return $super;
    }
}