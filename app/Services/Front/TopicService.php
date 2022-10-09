<?php


namespace App\Services\Front;


use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\LikeRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Models\Topic\Comment;
use App\Models\Topic\Topic;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class TopicService
{
    private $topicRepository;
    private $commentRepository;
    private $likeRepository;
    private $commentService;
    private $userRepository ;

    public function __construct(TopicRepositoryInterFace $tr, CommentRepositoryInterface $cr, LikeRepositoryInterface $lr , commentService $cs ,userRepository $ur)
    {
        $this->topicRepository = $tr;
        $this->commentRepository = $cr;
        $this->likeRepository = $lr;
        $this->userRepository = $ur;
        $this->commentService = $cs ;

    }


    public function getAllTopics()
    {
        $topics= $this->topicRepository->getAllTopics();
        $data= [] ;
        foreach ($topics as &$topic){
            array_push($data , $this->getTopicById($topic['id'])) ;

        }


        return $data;

    }

    public function getTopicById($topicId)
    {
        $data = $this->topicRepository->getTopicById($topicId);
        $data['likesCount'] = $this->getTopicLikesCountById($topicId) ;
        $data['isLiked'] = $this->isLiked($topicId) ;
        $data['user_name'] = $this->userRepository->getUserById($data['user_id'])->name;
        return $data;


    }

    public function getTopicAndCommentsById($topicId)
    {
        $data = $this->getTopicById($topicId);
        $data['comments'] = $this->commentService->getCommentsByTopicId($topicId);
        return $data;
    }

    public Function createTopic($topicDetails)
    {

        $validated = $topicDetails->validate([
            'content' => 'required',
        ]);


        return $this->topicRepository->createTopic($topicDetails);

    }

    public Function updateTopicById($topicId, $newDetails)
    {

        $oldDetails = $this->topicRepository->getTopicById($topicId);

        if (Auth::check() && Auth::user()->id == $oldDetails['user_id'])
            return $data = $this->topicRepository->updateTopicById($topicId, $newDetails);
        else {
            return abort(403);
        }

    }

    public Function getUserTopics($userId)
    {

        return $this->topicRepository->getUserTopics($userId);

    }

    public function deleteTopic($topicId)
    {
        $data = $this->topicService->getTopicById($topicId);
        if (Auth::user()->id == $data['user_id']) {
            return $this->topicRepository->deleteTopic($topicId);
        }
        else
            abort(403) ;

    }

    public Function createComment($commentDetails)
    {

        $validated = $commentDetails->validate([
            'content' => 'required',
        ]);


        return $this->commentRepository->createComment($commentDetails);

    }

    private function getTopicLikesCountById($topicId)
    {
        $likes = $this->likeRepository->getTopicLikesById($topicId);
        return $likes->count();

    }

    private function isLiked($topicId)
    {
        $likes= $this->likeRepository->getTopicLikesById($topicId) ;
        foreach ($likes as $like)
        {
            if ($like['user_id'] == Auth::user()->id){
                return 1 ;
                break;
            }

        }
        return 0 ;
    }

}
