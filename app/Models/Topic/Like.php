<?php

namespace App\Models\Topic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table ='likes' ;
    protected $fillable =[
        'id',
        'user_id',
        'topic_id',
    ] ;
    public $timestamps= false ;




    ########## relations ##########
    public function Post(){
        return $this-> belongsTo(Topic::class , 'topic_id') ;
    }
}
