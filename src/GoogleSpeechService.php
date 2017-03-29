<?php
/**
 * Created by phongvh
 * Date: 3/26/2017
 * Time: 9:58 AM
 */

namespace Phongvh\SpeechGen;


class GoogleSpeechService
{
    private $serviceUrl = 'https://www.google.com/speech-api/v1/synthesize?ie=UTF-8';
    //private $url = 'https://translate.google.com/translate_tts?ie=UTF-8&q=love&tl=en&total=1&idx=0&textlen=4&tk=549405.930597&client=t&prev=input&ttsspeed=0.24';

    /*public $config = array(
        'lang' => 'en-US',
        // 'name' => '',
        'pitch' => 0.5,
        'speed' => 0.4,
        'vol' => 1
    );*/

    private $lang = 'en-US';
    private $pitch = 0.5;
    private $speed = 0.4;
    private $vol = 1;

    private $dest = './';
    private $fileName = '';

    public function __construct($lang = 'en-US', $pitch = 0.5, $speed = 0.4, $vol = 1)
    {
        // TODO: if $lang is an array

        // TODO: make some constraints for the arguments

        $this->lang = $lang;
        $this->pitch = $pitch;
        $this->speed = $speed;
        $this->vol = $vol;

        $this->url = $this->prepareUrl();
    }

    public function setLang($lang)
    {
        // TODO: make contraints for $lang

        $this->lang = $lang;
        $this->url = $this->prepareUrl();
    }

    public function setPitch($pitch)
    {
        // TODO: make contraints for $pitch

        $this->pitch = $pitch;
        $this->url = $this->prepareUrl();
    }

    public function setSpeed($speed)
    {
        // TODO: make contraints for $speed

        $this->speed = $speed;
        $this->url = $this->prepareUrl();
    }

    public function setVol($vol)
    {
        // TODO: make contraints for $vol

        $this->vol = $vol;
        $this->url = $this->prepareUrl();
    }

    public function setDest($dest)
    {
        $dest = rtrim($dest, '/');
        $this->dest = $dest . '/';
    }

    public function setFileName($fileName)
    {
        // TODO: validate $fileName and forcibly change extension to .mp3

        $this->fileName = $fileName;
    }

    private function prepareUrl()
    {
        $lang = urlencode($this->lang);
        $pitch = urlencode($this->pitch);
        $speed = urlencode($this->speed);
        $vol = urlencode($this->vol);

        return $this->serviceUrl . "&lang=$lang&pitch=$pitch&speed=$speed&vol=$vol";
    }

    private function getAudio($text)
    {
        $text = urlencode($text);
        $ch = curl_init($this->url . "&text=$text");

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        // curl_setopt( $ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );

        list($header, $contents) = preg_split('/([\r\n][\r\n])\\1/', curl_exec($ch), 2);

        $this->headers = preg_split('/[\r\n]+/', $header);
        $this->status = curl_getinfo($ch); // TODO: process this

        curl_close($ch);

        return $contents;
    }

    public function outputAudio($text, $toFile = TRUE)
    {
        $contents = $this->getAudio($text);

        if ($toFile === TRUE) {
            if (!$this->fileName) {
                exit('Please set a file name for audio output.');
            }
            $filePath = $this->dest . $this->fileName;
            file_put_contents($filePath, $contents);
        } else {
            foreach ($this->headers as $header) {
                if (preg_match('/^(?:Content-Type|Content-Language|Set-Cookie):/i', $header)) {
                    header($header);
                }
            }
            print $contents;
        }
    }
}