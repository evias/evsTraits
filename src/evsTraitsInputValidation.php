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
 * @package evsTraits/evsTraitsInputValidation
 * @author Grégory Saive <greg@evias.be>
 *
 * This file defines the following traits :
 *   - @see trait evsTraitsInputValidation
 **/

/**
 * The evsTraitsInputValidation trait can be 'use'd anywhere
 * you need to check or validate the user input.
 *
 * Methods included:
 * - checkMandatoryFields($mandatory, $params, $remove_empty=false)
 **/
trait evsTraitsInputValidation
{
    /**
     * The checkMandatoryFields method can be used to check the presence
     * of fields defined by $mandatory in the array $params. The third
     * argument $remove_empty (default false) can be used to determine
     * wether empty VALUES must be removed or not.
     *
     * @param   array   $mandatory  list of mandatory field names to be present
     *                              as keys in the second argument.
     * @param   array   $params     list of parameters to check mandatory fields
     *                              presence IN.
     * @param   bool    $remove_empty   Wether to take care about empty VALUES or not.
     * @return bool
     * @throws evsException   on missing mandatory field.
     **/
    public function checkMandatoryFields(array $mandatory, array $params, $remove_empty = false)
    {
        if ($remove_empty)
            $params = array_diff($params, array(null, ''));

        $diff = array_diff_key(array_flip($mandatory), $params);

        if (! empty($diff)) {
            $message = sprintf("Missing fields: %s", implode(", ", array_keys($diff)));
            throw new evsException($message);
        }

        return true;
    }
}
