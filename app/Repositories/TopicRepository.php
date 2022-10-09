<?php


namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Models\Topic\Topic;
use Illuminate\Support\Facades\Auth;


class TopicRepository implements TopicRepositoryInterface
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $cr)
    {
        $this->commentRepository = $cr;

    }

    public function getAllTopics()
    {
        return $data = Topic::all();
    }

    public function getTopicById($topicId)
    {

       return $data = Topic::findOrFail($topicId);


    }

    public Function createTopic($topicDetails)
    {


        $data = Topic::create([
            'content' => strip_tags($topicDetails['content']),
            'user_id' => Auth::user()->id
        ]);


        return $data;

    }

    public Function updateTopicById($topicId, $newDetails)
    {
        $data = Topic::find($topicId)
            ->update(['content' => $newDetails['content']]);

        return $data;


    }

    public function deleteTopic($topicId)
    {
        Topic::destroy($topicId);

    }

    public function getTopicsByUserId($userId)
    {
        return $data=Topic::where('user_id',$userId) ;
    }


}
