<?php

namespace Service;

class ExerciseFiveService 
{
    /**
     * Reads a standard REAXML at the specified $file, and returns an array of uniqueID & proprerty-type key-value pairs.
     * 
     * @param string $file
     * @return array $result
     */
    public static function reaxmlToArray (string $file) 
    {
        $result = [];
        
        if (file_exists($file))
        {
            $xml = simplexml_load_file($file);
            
            foreach ($xml as $propertyType => $property) 
            {
                if (isset($property->uniqueID))
                {
                    $result[strval($property->uniqueID)] = $propertyType;
                }
            }
        }

        return $result;
    }
}