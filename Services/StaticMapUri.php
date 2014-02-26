<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

/**
 * Return a formatted URI to call the API to get the static map
 */
class StaticMapUri extends Uri
{
    /**
     * Returns the suffix pasted immediately after the base url
     * 
     * @return string The suffix appended
     */
    public function getSuffixBaseUrl()
    {
        return 'staticmap?center=';
    }
}