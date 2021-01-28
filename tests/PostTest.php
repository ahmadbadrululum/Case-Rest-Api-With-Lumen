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


}
