<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PostController extends Controller{

    public function store(Request $request){
        $client = new Client([
            'base_uri' => 'https://testing-api-e4ef6-default-rtdb.firebaseio.com'
        ]);
        
        try {
            $dataRequest = [
                'title' => $request->title,
                'content' => $request->content,
                'author' => $request->author,
            ];
            $response = $client->request('post', 'post.json',[
                'json' => $dataRequest
            ]);
            return response()->json([
                'success'=> true,
                'data'=> $dataRequest 
            ], 200);

        } catch (\Exception $e) {
            $responseError = [
                'success'=> false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseError, 200);
        }
    }
}
