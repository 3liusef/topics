<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Topic\Topic;
use App\Services\Front\CommentService;
use App\Services\Front\TopicService ;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{

    private $topicService;
    private $commentService;


    public function __construct(TopicService $tr , commentService $cr)
    {

        $this->topicService = $tr;
        $this->commentService =$cr ;
    }
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort(404);
    }

    public function store(Request $request)
    {
       return response()->json($this->commentService->createComment($request)) ;

    }


    public function show($id)
    {
        abort(404);
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
