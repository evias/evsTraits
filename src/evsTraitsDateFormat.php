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
 * @package evsTraits/evsTraitsDateFormat
 * @author Grégory Saive <greg@evias.be>
 *
 * This file defines the following traits :
 *   - @see trait evsTraitsDateFormat
 **/

/**
 * The evsTraitsDateFormat trait can be 'use'd anywhere
 * you need to format a date to SQL format.
 *
 * Methods included:
 * - dateToSQL($date)
 * - datetimeToSQL($date)
 **/
trait evsTraitsDateFormat
{
    /**
     * The dateToSQL method can be used to format a
     * date input into a SQL formatted date field.
     * The method works with dates entered in formats :
     * - dd/mm/yyyy
     * - yyyy/mm/dd
     * - dd-mm-yyyy
     * - yyyy-mm-dd (Nothing to do)
     *
     * @param   string  $date   The date thats needs formatting
     * @return  string  SQL formatted date (yyyy-mm-dd)
     **/
    public function dateToSQL($date)
    {
        $is_format_slash     = (bool) preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $date);
        $is_format_minus     = (bool) preg_match("/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/", $date);
        $is_format_slash_inv = (bool) preg_match("/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/", $date);
        $is_format_minus_inv = (bool) preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/", $date);

        if ($is_format_slash)
            return preg_replace("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", "$3-$2-$1", $date);
        elseif ($is_format_minus)
            return preg_replace("/([0-9]{2})\-([0-9]{2})\-([0-9]{4})/", "$3-$2-$1", $date);
        elseif ($is_format_slash_inv)
            return preg_replace("/([0-9]{4})\/([0-9]{2})\/([0-9]{2})/", "$1-$2-$3", $date);

        /* format_minus_inv YYYY-MM-DD. */
        return $date;
    }

    /**
     * The datetimeToSQL method can be used to format a
     * datetime input into a SQL formatted datetime field.
     * The method works with dates entered in formats :
     * - dd/mm/yyyy hh:ii:ss
     * - yyyy/mm/dd hh:ii:ss
     * - dd-mm-yyyy hh:ii:ss
     * - yyyy-mm-dd hh:ii:ss (Nothing to do)
     *
     * @param   string  $date   The datetime thats needs formatting
     * @return  string  SQL formatted datetime (yyyy-mm-dd hh:ii:ss)
     **/
    public function datetimeToSQL($date)
    {
        $is_format_slash     = (bool) preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4} [0-9]{2}:[0-9]{2}(:[0-9]{2})?$/", $date);
        $is_format_minus     = (bool) preg_match("/^[0-9]{2}\-[0-9]{2}\-[0-9]{4} [0-9]{2}:[0-9]{2}(:[0-9]{2})?$/", $date);
        $is_format_slash_inv = (bool) preg_match("/^[0-9]{4}\/[0-9]{2}\/[0-9]{2} [0-9]{2}:[0-9]{2}(:[0-9]{2})?$/", $date);
        $is_format_minus_inv = (bool) preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2} [0-9]{2}:[0-9]{2}(:[0-9]{2})?$/", $date);

        if ($is_format_slash)
            return preg_replace("/([0-9]{2})\/([0-9]{2})\/([0-9]{4}) ([0-9]{2}:[0-9]{2}(:[0-9]{2})?)/", "$3-$2-$1 $4", $date);
        elseif ($is_format_minus)
            return preg_replace("/([0-9]{2})\-([0-9]{2})\-([0-9]{4}) ([0-9]{2}:[0-9]{2}(:[0-9]{2})?)/", "$3-$2-$1 $4", $date);
        elseif ($is_format_slash_inv)
            return preg_replace("/([0-9]{4})\/([0-9]{2})\/([0-9]{2}) ([0-9]{2}:[0-9]{2}(:[0-9]{2})?)/", "$1-$2-$3 $4", $date);

        /* format_minus_inv YYYY-MM-DD. */
        return $date;
    }
}