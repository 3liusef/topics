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


class UserService
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


    public function getUserById($userId)
    {
        return $this->userRepository->getUserById($userId) ;
    }

    public function getUserByApiToken($token)
    {

        return $this->userRepository->getUserByApiToken($token) ;

    }



    public function deleteUser($userId)
    {
        return $this->userRepository->deleteUser($userId) ;
    }

    public function createUser($userDetails)
    {

        return $this->userRepository->createUser($userDetails) ;
    }

    public function updateUser($userId, $newDetails)
    {
        return $this->userRepository->updateUser($userId,$newDetails) ;
    }
}
