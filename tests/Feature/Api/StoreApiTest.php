<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_stores()
    {


        $response = $this->getJson('/api/stores');
        $response->assertOk();
        $response->assertJson([

            'stores' => [
                'current_page' => 1,
                'data' => [],
                "first_page_url" =>  "http://localhost/api/stores?page=1",
                "from" =>  null,
                "last_page" =>  1,
                "last_page_url" =>  "http://localhost/api/stores?page=1",
                "links" =>  [
                    [
                        "url" =>  null,
                        "label" =>  "&laquo; Previous",
                        "active" =>  false
                    ],
                    [
                        "url" =>  "http://localhost/api/stores?page=1",
                        "label" =>  "1",
                        "active" =>  true
                    ],
                    [
                        "url" =>  null,
                        "label" =>  "Next &raquo;",
                        "active" =>  false
                    ]
                ],
                "next_page_url" => null,
                "path" => "http://localhost/api/stores",
                "per_page" => 20,
                "prev_page_url" => null,
                "to" => null,
                "total" => 0
            ]

        ]);
    }
    public function test_show_store()
    {
        $response = $this->getJson('/api/stores/1');
        $response->assertOk();

    }
}
