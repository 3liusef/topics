<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Front\TopicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{

    private $topicService;


    public function __construct(TopicService $ts)
    {

        $this->topicService = $ts;
    }

    public function index()
    {

        return view('topic.index', ['allTopics' => $this->topicService->getAllTopics()]);
    }

    public function create()
    {
        return view('topic.create');
    }

    public function store(Request $request)
    {

        $data = $this->topicService->createTopic($request);
        return redirect(route('topic.index') . "/" . $data['id']);

    }

    public function show($id)
    {

        return view('topic.show', ['data' => $this->topicService->getTopicAndCommentsById($id)]);
    }

    public function edit($id)
    {
        $data = $this->topicService->getTopicById($id);
        if (Auth::user()->id == $data['user_id'])
            return view('topic.editTopic', ['data' => $this->topicService->getTopicById($id)]);
        else
            return abort(403);

    }

    public function update(Request $request, $id)
    {

        $this->topicService->updateTopicById($id, $request);
        return view('topic.show', ['data' => $this->topicService->getTopicAndCommentsById($id)]);

    }

    public function destroy($id)
    {
        $data = $this->topicService->getTopicById($id);
        if (Auth::user()->id == $data['user_id']) {
            $this->topicService->deleteTopic($id);
            return view('topic.index', ['allTopics' => $this->topicService->getAllTopics()]);
        }
        else
            return abort(403) ;

    }
}
