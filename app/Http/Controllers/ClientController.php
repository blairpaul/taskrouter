<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use ClientToken;
use Twiml;
use Input;
use TwimlRestClient;
class ClientController extends Controller
{


	public function token(){

		$capability = new ClientToken(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
		$capability->allowClientOutgoing(env('TWILIO_TWIML_APP_SID'));
		$token = $capability->generateToken();

		// return serialized token 
		header('Content-Type: application/json');

		return json_encode(array(
		    'token' => $token,
		));
	}

	public function index(){

		return view('clients');
	}

	public function voice(Request $request){

		$response = new Twiml;

		// get the phone number from the page request parameters, if given
		if (isset($request->To) && strlen($request->To) > 0) {
		    $number = htmlspecialchars($request->To);
		    $dial = $response->dial(array('callerId' => env('TWILIO_CALLER_ID')));
		    
		    // wrap the phone number or client name in the appropriate TwiML verb
		    // by checking if the number given has only digits and format symbols
		    if (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
		        $dial->number($number);
		    } else {
		        $dial->client($number);
		    }

		} else {
		    $response->say("Thanks for calling!");
		}

		header('Content-Type: text/xml');

		return $response;
	}


	public  function haha(Request $request) {


		$client = new TwimlRestClient(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

		// Read TwiML at this URL when a call connects (hold music)
		$call = $client->calls->create(
		  '639566822571 ', // Call this number
		  '6326263279 ', // From a valid Twilio number
		  array(
		      'url' => 'https://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
		  )
		);
	}

}
