<?php

namespace Service;

const DESCRIPTORS = [
    'first',
    'second', 
    'third', 
    'fourth', 
    'fifth', 
    'last',
    'monday',
    'tuesday',
    'wednesday',
    'thursday',
    'friday',
    'saturday',
    'sunday',
    'of',
    'january',
    'february',
    'march',
    'april',
    'may',
    'june',
    'july',
    'august',
    'september',
    'october',
    'november',
    'december',
];

class ExerciseTwoService 
{
    /**
     * Take a description of a date, and return the actual date in the "YYYY-mm-dd" format.
     * 
     * @param string $literal
     * @return string|null
     */
    public static function parseLiteralDate (string $literal) 
    {

        $words = explode(' ', $literal);
        $literal_formatted = '';

        foreach($words as $word)
        {
            $word_lower = strtolower($word);
            //Only keep the word if its one of the expected descriptors or contains a number.
            if (in_array($word_lower, DESCRIPTORS) || preg_match('~[0-9]+~', $word))
            {
                $literal_formatted .= $word.' ';
            }
        }

        //If the formatted string can't be parsed to a timestamp, then return null.
        if (!strtotime($literal_formatted)) 
        {
            return null;
        }

        $date = new \DateTime($literal_formatted);

        //Return the parsed date in "YYYY-mm-dd" format.
        return $date->format('Y-m-d');
    }
}