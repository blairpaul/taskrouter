<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CallBackController extends Controller
{
    public function taskAssignment(){

        $dequeueInstructionModel = new \stdClass;
        $dequeueInstructionModel->instruction = "dequeue";
        $dequeueInstructionModel->post_work_activity_sid = env('TWILIO_POST_WORK_ACTIVITY_SID');
        $dequeueInstructionModel->from = '+6326263279';
        $dequeueInstructionJson = json_encode($dequeueInstructionModel);


        return response($dequeueInstructionJson)->header('Content-Type', 'application/json');
    }
}
