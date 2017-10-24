<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use WorkerCapability;
class AgentController extends Controller
{
	private $workerToken;
	private $workerSid;

    public function index($workerSid ){


    	$workerCapability = new WorkerCapability(
    		env('TWILIO_ACCOUNT_SID'),
    		env('TWILIO_AUTH_TOKEN'),
    		env('TWILIO_TWIML_WORKSPACE_SID'),
    		$workerSid);

    	$workerCapability->allowActivityUpdates();
    	$this->workerToken = $workerCapability->generateToken();

    	$workerToken = $this->workerToken;
    	return view('welcome',compact('workerToken'));
    }
}
