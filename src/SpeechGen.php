<?php

namespace Phongvh\SpeechGen;

class SpeechGen
{
    /**
     * Create a new SpeechGen Instance
     */
    public function __construct()
    {

    }

    public static function routes()
    {
        require __DIR__ . '/../routes/speechgen.php';
    }
}
