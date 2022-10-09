<?php


namespace App\Interfaces;


interface CommentRepositoryInterface
{

    public Function getCommentById($id) ;
    public Function deleteCommentById($commentId) ;
    public function getCommentsByTopicId($userId) ;
    public Function createComment($commentDetails) ;
    public Function updateCommentById($commentId ,  $newDetails) ;
}
