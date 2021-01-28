<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Case6Controller extends Controller{

    public function getHandleResponse(){
        $client = new Client();
        try {
            $response = $client->request('post', 'https://reqres.in/api/register',[
                'json' => [
                    'email'=> 'eve.holt@reqres.in',
                    'password'=> 'pistol'
                ]
            ]);

            $result=$response->getBody();
            return response()->json([
                'success'=> true,
                'data'=> json_decode($result, true) 
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success'=> false,
                'message'=> $e->getMessage() 
            ], 409);
        }
    }

    public function getHandleResponseLogin(){
        $client = new Client();
        try {
            $response = $client->request('post', 'https://reqres.in/api/login',[
                'json' => [
                    'email'=> 'eve.holt@reqres.in',
                    'password'=> 'cityslicka'
                ]
            ]);
            $result=$response->getBody();
            return response()->json([
                'success'=> true,
                'data'=> json_decode($result, true) 
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success'=> false,
                'message'=> $e->getMessage() 
            ], 401);
        }
    }



}
