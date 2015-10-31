<?php
/**
 * LICENSE
 *
 Copyright 2015 Grégory Saive (greg@evias.be)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 *
**/

/**
 * @package evsTraits/evsTraitsStringFormat
 * @author Grégory Saive <greg@evias.be>
 *
 * This file defines the following traits :
 *   - @see trait evsTraitsStringFormat
 **/

/**
 * The evsTraitsStringFormat trait can be 'use'd anywhere
 * you need to format string values to given other formats.
 *
 * Methods included:
 * - toUrlFriendly($name, $replace_space='-')
 **/
trait evsTraitsStringFormat
{
    /**
     * The toUrlFriendly method can be used to format a
     * string input into a "Url Friendly" name. Be careful
     * that this method DOES NOT urlencode() the string.
     * In fact, it replaces special characters to there
     * equivalent ASCII character.
     *
     * @param   string  $name   The string to format
     * @param   string  $replace_space  Character(s) to replace Spaces with
     * @return  string  formatted string
     **/
    public function toUrlFriendly($name, $replace_space = '-')
    {
        if (! $replace_space)
            $replace_space = " ";

        $replacements = array(
            'ç' => 'c', 'ñ' => 'n',
            'ä' => 'a', 'â' => 'a', 'à' => 'a', 'á' => 'a',
            'Ä' => 'a', 'Â' => 'a', 'À' => 'a', 'Á' => 'a',
            'é' => 'e', 'è' => 'e', 'ë' => 'e', 'ê' => 'e',
            'É' => 'e', 'È' => 'e', 'Ë' => 'e', 'Ê' => 'e',
            'ï' => 'i', 'î' => 'i', 'ì' => 'i', 'í' => 'i',
            'Ï' => 'i', 'Î' => 'i', 'Ì' => 'i', 'Í' => 'i',
            'ö' => 'o', 'ô' => 'o', 'ò' => 'o', 'ó' => 'o',
            'Ö' => 'o', 'Ô' => 'o', 'Ò' => 'o', 'Ó' => 'o',
            'ü' => 'u', 'û' => 'u', 'ù' => 'u', 'ú' => 'u', 'µ' => 'u',
            'Ü' => 'u', 'Û' => 'u', 'Ù' => 'u', 'Ú' => 'u',);
        $app = strtr(strtolower($name), $replacements);

        $app = preg_replace(
            array(
                "/([\.\-\#\!\?\:\;\&\%\$\"\'])/",
                "/([\s])([\s]*)/",),
            array("", $replace_space), $app);

        return trim($app, $replace_space);
    }
}
