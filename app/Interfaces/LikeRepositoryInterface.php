<?php


namespace App\Interfaces;


interface LikeRepositoryInterface
{

    public Function getTopicLikesById($topicId) ;
    public Function unlikeTopicById($topicId) ;
    public Function likeTopicById($topicId) ;

}
