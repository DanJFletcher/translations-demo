<?php

namespace Tests\Feature;

use App\Forum;
use Tests\TestCase;
use App\TitleTranslation;
use App\Services\ForumService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForumServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_forum_with_title_translations()
    {
        $forumService = new ForumService;

        $payload = [
            'title' => [
                [
                    'text' => 'test title',
                    'lang_id' => 1
                ]
            ]
        ];

        $forum = $forumService->create($payload)->load('title');

        $this->assertInstanceOf(Forum::class, $forum);
        $this->assertEquals($forum->title[0]->text, 'test title');
    }

    /** @test */
    public function can_update_forum_with_title_translations()
    {
        $forum = factory(Forum::class)->create();

        factory(TitleTranslation::class)->create([
            'translatable_id' => $forum->id,
            'translatable_type' => Forum::class
        ]);

        $forumService = new ForumService;

        $payload = [
            'title' => [
                [
                    'text' => 'edited test title',
                    'lang_id' => 1
                ]
            ]
        ];

        $updatedForum = $forumService->update($forum, $payload)->load('title');

        $this->assertEquals($updatedForum->title[0]->text, 'edited test title');
    }
}
