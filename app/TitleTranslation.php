<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitleTranslation extends Model
{
    protected $fillable = [
        'lang_id',
        'text',
        'translatable_id',
    ];

    public function translatable()
    {
        return $this->morphTo();
    }
}
