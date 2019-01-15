<?php

namespace App\Services;

use App\Forum;

interface IForumService
{
    public function create($payload): Forum;
    public function update(Forum $forum, $payload): Forum;
}
