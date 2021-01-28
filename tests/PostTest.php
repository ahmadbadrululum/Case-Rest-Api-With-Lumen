<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * /Posts [GET]
     */
   
    public function testShouldGetPost()
    {
        $this->get("api/post", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'author',
                    'title',
                    'content',
                ]
            ],
        ]);
    }


    /**
     * /Posts [POST]
     */
    public function testShouldCreatePost(){

        $parameters = [
            'author' => 'badrules',
            'title' => 'Berita Hari ini',
            'content' => 'Depok hujan angin ',
        ];

        $this->post("api/post", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                 [
                    'author',
                    'title',
                    'content',
                ]
            ]    
        );
        
    }
    
    /**
     * /api/post/id [PUT]
     */
    public function testShouldUpdatePost(){

        $parameters = [
            'author' => 'badrules',
            'title' => 'Jakarta Cerah Berawan',
            'content' => 'BMKG prediksi Jakarta cerah',
        ];
        $this->put("api/post/-MS5FISc90MKUsdQ6tts", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                 [
                    'author',
                    'title',
                    'content',
                ]
            ]    
        );
    }
}
