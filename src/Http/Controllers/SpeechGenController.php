<?php
/**
 * Created by phongvh
 * Date: 3/26/2017
 * Time: 9:14 AM
 */

namespace Phongvh\SpeechGen\Http\Controllers;

use Phongvh\SpeechGen\GoogleSpeechService;

class SpeechGenController extends Controller
{
    public function index()
    {
        return view('speechgen::speech');
    }

    public function speech()
    {
        $voices = request('body');

        $tts = new GoogleSpeechService('vi-VN');
        $tts->setDest(storage_path('app/public/mp3'));
        
        $files = array();
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $voices) as $voice) {            
            $fileName = implode('-', explode(' ', str_slug($voice))) . '.mp3';
            array_push($files, $fileName);
            $tts->setFileName($fileName);
            $tts->outputAudio($voice);
            //echo $tts->getQueryUrl();
        }
        return view('speechgen::result', compact('files'));
    }
}