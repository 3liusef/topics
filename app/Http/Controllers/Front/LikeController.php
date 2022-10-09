<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\LikeRepositoryInterface;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $likeRepository;

    public function __construct(likeRepositoryInterface $lr)
    {

        $this->likeRepository = $lr;
    }


    public function like($id)
    {
         $this->likeRepository->LikeTopicById($id) ;
        return redirect(route('topic.show',$id)) ;
    }
    public function unlike($id)
    {
        $this->likeRepository->unLikeTopicById($id) ;
        return redirect(route('topic.show',$id)) ;
    }




}
