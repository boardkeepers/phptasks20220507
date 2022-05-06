<?php

namespace Service;

class ExerciseOneService 
{
    /**
     * Returns TRUE if a word does not have any repeating letter.
     * 
     * @param string $word
     * @return bool
     */
    public static function hasNoRepeatingLetter (string $word) 
    {
        $letters = str_split($word);
        $appeared = [];

        foreach($letters as $letter)
        {
            //Assuming from the 'Examples of valid words', only alphabets are subject to this function.
            if (ctype_alpha($letter))
            {
                //Case insensitive
                $letter_lower = strtolower($letter);

                //If the $letter_lower has previously appeared (aka. repeated), then return FALSE.
                if (in_array($letter_lower, $appeared))
                {
                    return false;
                }

                $appeared[] = $letter_lower;
            }
        }

        //None of the characters were repeated, so return TRUE.
        return true;
    }
}