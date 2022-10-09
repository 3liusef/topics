<?php

namespace App\Models\Topic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = [
        'id',
        'user_id',
        'content',
        'photo',


    ];

    ########## relations ##########
    public function like()
    {
        return $this->hasMany(like::class, 'topic_id');
    }
}
