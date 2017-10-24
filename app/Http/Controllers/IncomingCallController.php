<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Twiml;
use TwimlRestClient;
class IncomingCallController extends Controller
{
   public function call(){
    $response = new Twiml();

    $params = array();
    $params['action'] = '/enqueue-call';
    $params['numDigits'] = 1;
    $params['timeout'] = 5;
    $params['method'] = "POST";

    $params = $response->gather($params);
    $params->say('For female doctos, please hold or press one');
    $params->say('For male doctos, please hold or press two ');

    return response($response)->header('Content-Type', 'text/xml','charset=utf-8');

    }
}
