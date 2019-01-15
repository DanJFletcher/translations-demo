<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateForumTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_forum_with_title_translations()
    {
        $response = $this->json(
            'POST',
            '/api/forums',
            [
                'title' => [
                    [
                        'text' => 'test title',
                        'lang_id' => 1
                    ],
                ]
            ]
        );

        $this->assertEquals(
            'test title',
            $response->json()['title'][0]['text']
        );
        $response->assertStatus(200);
    }
}
