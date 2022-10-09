<?php

namespace App\Models\Topic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='comments' ;
    protected $fillable =[
        'id',
        'user_id',
        'topic_id',
        'content',



    ] ;
    public $timestamps= True;



    ########## relations ##########
    public function Post(){
        return $this-> belongsTo(Topic::class , 'topic_id') ;
    }
}
