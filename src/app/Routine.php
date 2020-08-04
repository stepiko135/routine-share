<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Routine extends Model
{
    protected $guarded = array('id');

    // foreign key 設定？
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
