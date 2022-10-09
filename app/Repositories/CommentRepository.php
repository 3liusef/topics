<?php


namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Topic\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CommentRepository implements CommentRepositoryInterface
{
    public function getCommentById($id)
    {
        $data = Comment::find($id) ;
        return $data ;
    }

    public function getCommentsByTopicId($topicId)
    {
        $data = Comment::where('topic_id',$topicId)->get() ;
        return $data ;
    }

    public function deleteCommentById($commentId)
    {
        Comment::destroy($commentId);
    }

    public function createComment($commentDetails)
    {

        $data = Comment::create([
            'content' => strip_tags($commentDetails['content']),
            'user_id' => Auth::user()->id,
            'topic_id' => $commentDetails['topic_id'],

        ]);

        return $data;
    }

    public function updateCommentById($commentId, $newDetails)
    {
        $data = $data = Comment::where('id', $commentId)
            ->update(['content' => $newDetails['content']]);

        return $data;


    }
}
