<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PostController extends Controller{

    private $client;
    public function __construct(){
        $this->client = new Client([
            'base_uri' => 'https://testing-api-e4ef6-default-rtdb.firebaseio.com'
        ]);   
    }

    public function index(Request $request){
        try {
            $response = $this->client->request('get', 'post.json');
            $result = $response->getBody()->getContents();
            return response()->json([
                'success'=> true,
                'data'=> json_decode($result, true) 
            ], 200);

        } catch (\Exception $e) {
            $responseError = [
                'success'=> false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseError, 500);
        }
       
    }

    public function store(Request $request){        
        try {
            $dataRequest = [
                'title' => $request->title,
                'content' => $request->content,
                'author' => $request->author,
            ];
            $response = $this->client->request('post', 'post.json',[
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
            return response()->json($responseError, 500);
        }
    }
}
