<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Communicate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommunicateApiController extends Controller
{
    public function sendMessage(Request $request)
    {
        $this->getModel()::create($request->validate($this->rules()));


        return  response()->json(['message' => 'message sent successfully']);
    }




    protected function rules():array
    {

        return [
            'name' => 'required|string',
            'phoneNumber' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ];

    }
    public function getModel()
    {

        return new Communicate();
    }
}
