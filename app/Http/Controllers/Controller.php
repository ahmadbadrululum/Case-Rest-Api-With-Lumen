<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function responseError($message){
        $responseError = [
            'success'=> false,
            'message' => $message
        ];
        return response()->json($responseError, 500);
    }    
}
