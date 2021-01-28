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
            return $this->responseError($e->getMessage());
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
            return $this->responseError($e->getMessage());
        }
    }

    public function getId(string $id){
        try {
            $response = $this->client->request('get', 'post/'.$id.'.json');
            $result = $response->getBody()->getContents();
            return response()->json([
                'success'=> true,
                'data'=> json_decode($result, true) 
            ], 200);

        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function update(Request $request, $id){      
        try {
            $dataRequest = [
                'title' => $request->title,
                'content' => $request->content,
                'author' => $request->author,
            ];
            $response = $this->client->request('PUT', 'post/'.$id.'.json',[
                'json' => $dataRequest
            ]);
            return response()->json([
                'success'=> true,
                'data'=> $dataRequest
            ], 200);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function destroy($id, array $data=[]){      
        try {
            $this->client->request('delete', 'post/'.$id.'.json', $data);
            return response()->json([
                'success'=> true,
                'message'=> 'delete succesfully',
            ], 200);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
