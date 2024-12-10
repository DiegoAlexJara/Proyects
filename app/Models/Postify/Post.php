<?php

namespace App\Models\Postify;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["content", "user_id", "title"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
