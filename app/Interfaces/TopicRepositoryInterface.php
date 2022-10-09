<?php


namespace App\Interfaces;


interface TopicRepositoryInterface
{
    public function getAllTopics() ;
    public Function getTopicById($topicId) ;
    public Function deleteTopic($topicId) ;
    public Function createTopic($topicDetails) ;
    public Function updateTopicById($topicId ,  $newDetails) ;


}
