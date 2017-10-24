<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Twiml;

class EnqueueCallController extends Controller
{

    public function enqueueCall(Request $request){
    	$response = new Twiml();
    	$digit_pressed = $request->input("Digits");
    	$gender = 'fm';
  		if ($digit_pressed == '1') {
  		  $gender = "fm";
  		} else {
  		  $gender = "m";
  		}


        $selectProductInstruction = new \StdClass();
        $selectProductInstruction->selected_gender = $gender;
        $enqueue = $response->enqueue(['workflowSid' =>  env('TWILIO_WORKFLOW')]);
        $enqueue->task(json_encode($selectProductInstruction));

        return response($response)->header('Content-Type', 'text/xml');
    }
}
