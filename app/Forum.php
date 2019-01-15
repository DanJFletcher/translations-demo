<?php

namespace App;

use App\TitleTranslation;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function title()
    {
        return $this->morphMany(TitleTranslation::class, 'translatable');
    }
}
