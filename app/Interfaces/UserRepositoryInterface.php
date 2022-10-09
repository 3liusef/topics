<?php


namespace App\Interfaces;


interface UserRepositoryInterface
{

    public function getUserByApiToken($token) ;
    public Function getUserById($topicId) ;
    public Function deleteUser($topicId) ;
    public Function createUser($topicDetails) ;
    public Function updateUser($topicId ,  $newDetails) ;
}
