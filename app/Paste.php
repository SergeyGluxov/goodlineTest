<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    use HasHashSlug;
    public $timestamps = false;
    protected $dates = ['hide_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
