<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use TwimlRestClient;
use WorkerCapability;
use Twiml;
class CreateTask extends Controller
{
   public function creatTask(){

		$client = new TwimlRestClient(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

		$task = $client->taskrouter
		    ->workspaces(env('TWILIO_TWIML_WORKSPACE_SID'))
		    ->tasks
		    ->create(array(
		      'workflowSid' => env('TWILIO_WORKFLOW'),
		      'attributes' => json_encode(array('selected_gender' => "fm"))
		      ));
   }

   public function test(){

		$workerCapability = new WorkerCapability(
    		env('TWILIO_ACCOUNT_SID'),
    		env('TWILIO_AUTH_TOKEN'),
    		env('TWILIO_TWIML_WORKSPACE_SID'),
    		'WK4fae22b7a855535d417e162d800f6946');

    	$workerCapability->allowActivityUpdates();
    	$this->workerToken = $workerCapability->generateToken();

    	$workerToken = $this->workerToken;
		return  view('test',compact('workerToken'));
   }







}
