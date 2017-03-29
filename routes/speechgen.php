<?php
/**
 * Created by phongvh
 * Date: 3/26/2017
 * Time: 9:07 AM
 */

$namespacePrefix = '\\' . 'Phongvh\\SpeechGen\\Http\\Controllers' . '\\';
Route::get('speech', ['uses' => $namespacePrefix . 'SpeechGenController@index', 'as' => 'speechgen.speech']);
Route::post('speech', ['uses' => $namespacePrefix . 'SpeechGenController@speech', 'as' => 'speechgen.speech']);