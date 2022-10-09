<?php


namespace App\Repositories;


use App\Interfaces\LikeRepositoryInterface;
use App\Models\Topic\Like;
use Illuminate\Support\Facades\Auth;


class LikeRepository implements LikeRepositoryInterface
{



    public function getTopicLikesById($topicId)
    {
        $data = Like::where('topic_id',$topicId)->get()  ;
        return $data ;
    }

    public function unLikeTopicById($topicId)
    {
        return Like::Where(['topic_id' => $topicId, 'user_id' => Auth::user()->id])->delete();
    }

    public function likeTopicById($topicId)
    {

        $data = Like::create([
            'topic_id' => $topicId,
            'user_id' => Auth::user()->id,
        ]);
        return $data;


    }
}
