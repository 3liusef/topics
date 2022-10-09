<?php


namespace App\Services\Front;


use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\LikeRepositoryInterface;
use App\Interfaces\TopicRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


class CommentService
{
    private $topicRepository;
    private $commentRepository;
    private $likeRepository;
    private $userRepository;

    public function __construct(TopicRepositoryInterFace $tr, CommentRepositoryInterface $cr, LikeRepositoryInterface $lr, userRepository $ur)
    {
        $this->topicRepository = $tr;
        $this->commentRepository = $cr;
        $this->likeRepository = $lr;
        $this->userRepository = $ur;

    }

    public function createComment($commentDetails)
    {

        $validate = $commentDetails->validate([
            'content' => 'required'
        ]);

        return $data = $this->commentRepository->createComment($commentDetails);
    }

    public function deleteComment($commentId)
    {

        $comment = $this->commentRepository->getCommentById($commentId);
        if (Auth::user()->id == $comment['user_id']) {
            return $data = $this->commentRepository->deleteCommentById($commentId);
        }
        return abort(403);
    }

    public function updateCommentById($commentId, $newDetails)
    {

        $comment = $this->commentRepository->getCommentById($commentId);
        if (Auth::user()->id == $comment['user_id']) {

            return $data = $this->commentRepository->updateCommentById($commentId, $newDetails);
        }
        return abort(403);
    }

    public function getCommentById($commentId)
    {
        $data = $this->commentRepository->getCommentById($commentId);

        $data['user_name'] = $this->userRepository->getUserById($data['user_id'])->name;
        $data->makeHidden('topic_id');
        return $data;
    }


    function getCommentsByTopicId($topicId)
    {
        $comments= $this->commentRepository->getCommentsByTopicId($topicId);
        $data=[] ;


        foreach ($comments as $comment)
        {
            array_push($data, $this->getCommentById($comment['id'])  );

        }
        return $data;
    }

}


