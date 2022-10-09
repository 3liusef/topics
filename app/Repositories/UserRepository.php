<?php


namespace App\Repositories;


use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function getUserById($userId)
    {
        return User::find($userId);
    }

    public function getUserByApiToken($token)
    {

        return User::where('api_token',$token)->firstOrFail() ;

    }



    public function deleteUser($userId)
    {
        return User::destroy($userId);
    }

    public function createUser($userDetails)
    {

       return User::create([
                'name', $userDetails['name'],
                'password', $userDetails['password'],
                'api_token', $userDetails['api_token'],
                'email', $userDetails['email'],
            ]

        );
    }

    public function updateUser($userId, $newDetails)
    {
        return User::find($userId)->update([
                'name', $newDetails['name'],
                'password', $newDetails['password'],
                'api_token', $newDetails['api_token'],
                'email', $newDetails['email'],
            ]

        );
    }
}
