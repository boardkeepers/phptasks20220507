<?php

namespace Service;

class ExerciseThreeService 
{
    /**
     * Merges two strings, character by character.
     * 
     * @param string $word1
     * @param string $word2
     * @return string $merged
     */
    public static function mergeCharacterByCharacter (string $word1, string $word2) 
    {
        $merged = '';

        $letters1 = str_split(trim($word1));
        $letters2 = str_split(trim($word2));

        $max = count($letters1) > count($letters2) ? count($letters1) : count($letters2);

        for ($i = 0; $i < $max; $i++)
        {
            $letter1 = $letters1[$i] ?? '';
            $letter2 = $letters2[$i] ?? '';

            $merged .= $letter1.$letter2;
        }

        //Return the parsed date in "YYYY-mm-dd" format.
        return $merged;
    }
}