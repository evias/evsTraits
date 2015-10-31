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
 * @package evsTraits/evsTraitsCurl
 * @author Grégory Saive <greg@evias.be>
 *
 * This file defines the following traits :
 *   - @see trait evsTraitsCurl
 **/

/**
 * The evsTraitsCurl trait can be 'use'd anywhere
 * you need to execute CURL related code.
 *
 * Methods included:
 * - curlRequest($url, $curl_options = [])
 **/
trait evsTraitsCurl
{
    /**
     * The curlRequest method can be used to execute
     * a CURL request and returns its' responseXML.
     *
     * @param   string  $url
     * @param   array   $curl_options   List of options to pass to the PHP function
     *                                  curl_setopt. (@see http://php.net/manual/en/function.curl-setopt.php)
     * @return string    responseXML
     **/
    protected function curlRequest($url, array $curl_options = array())
    {
        $handle = curl_init();

        curl_setopt_array($handle, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ) + $curl_options);

        $xml = curl_exec($handle);
        curl_close($handle);
        return $xml;
    }
}
