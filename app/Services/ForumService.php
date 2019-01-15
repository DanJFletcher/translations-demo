<?php

namespace App\Services;

use App\Forum;
use App\Services\IForumService;

class ForumService implements IForumService
{
    public function create($payload): Forum
    {
        $forum = Forum::create();

        $forum->title()->createMany(
            collect($payload['title'])->map(function ($translation) use ($forum) {
                return [
                    'text' => $translation['text'],
                    'lang_id' => $translation['lang_id'],
                    'translatable_id' => $forum->id,
                ];
            })->toArray()
        );

        return $forum;
    }

    public function update(Forum $forum, $payload): Forum
    {
        collect($payload['title'])->each(function ($translation) use ($forum) {
            $forum->title()->update($translation);
        });

        return $forum;
    }
}
