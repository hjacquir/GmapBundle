<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

/**
 * Return a formatted URI to call the API to get the location of a place
 */
class LocationUri extends Uri
{
    /**
     * Returns the suffix pasted immediately after the base url
     * 
     * @return string The suffix appended
     */
    public function getSuffixBaseUrl()
    {
        return 'geocode/json?address=';
    }
}
