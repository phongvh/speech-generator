<?php
/**
 * Created by phongvh
 * Date: 3/26/2017
 * Time: 8:48 AM
 */

namespace Phongvh\SpeechGen\Facades;

use Illuminate\Support\Facades\Facade;

class SpeechGen extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SpeechGen';
    }
}