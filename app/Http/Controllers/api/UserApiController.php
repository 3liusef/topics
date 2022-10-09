<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Front\TopicService;
use App\Services\Front\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{

    private $topicService;
    private $userService   ;


    public function __construct(TopicService $ts , UserService $us)
    {

        $this->topicService = $ts;
        $this->userService =$us ;
    }

    public function index()
    {


    }


    public function store(Request $request)
    {

    }

    public function topicWithComments($id)
    {

        return response()->json($this->topicService->getTopicAndCommentsById($id));

    }

    public function show($id)
    {

        return response()->json($this->userService->getUserById($id));

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
