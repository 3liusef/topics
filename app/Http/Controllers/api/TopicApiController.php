<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\TopicRepositoryInterface;
use App\Services\Front\TopicService;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicApiController extends Controller
{

    private $topicService;
    private $userRepository ;


    public function __construct(TopicService $ts)
    {

        $this->topicService = $ts;
    }

    public function index()
    {

        return response()->json($this->topicService->getAllTopics())  ;
    }


    public function store(Request $request)
    {
        $request['user_id']=$this->user ;
        return response()->json($this->topicService->createTopic($request)) ;

    }
    public function topicWithComments($id)
    {

        return response()->json($this->topicService->getTopicAndCommentsById($id)) ;

    }

    public function show($id)
    {

        return response()->json($this->topicService->getTopicById($id) ) ;

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
