<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateForumTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_update_forum_title_translations()
    {
        $response = $this->json(
            'POST',
            '/api/forums',
            [
                'title' => [
                    [
                        'text' => 'updated test title',
                        'lang_id' => 1
                    ],
                ]
            ]
        );

        $this->assertEquals(
            'updated test title',
            $response->json()['title'][0]['text']
        );
        $response->assertStatus(200);
    }
}
