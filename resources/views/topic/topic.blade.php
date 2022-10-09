<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $data['user_name']."  ". $data['created_at']->diffForHumans() }} -
                    <a href="{{route('topic.show',$data['id'])}} "> Topic Link </a> -
                    @if( \Illuminate\Support\Facades\Auth::user()->id == $data['user_id'])
                        <a href="{{route('topic.edit',$data['id'])}} "> Edit Topic </a>

                    <form  style='display:inline;' method="POST"  action="{{url('topic').'/'.$data['id']}}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="asText" style='border:none; background-color:inherit; color:red ' > delete</button>
                    </form>



                    @endif

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body">
                        {{ $data['content'] }}
                    </div>

                </div>

                <div class="card-header">
                    <p> {{$data['likesCount']}} likes</p>
                    @if ($data['isLiked']==0)
                        <a href="{{route('topic.show',$data['id'])}}/like"> LIKE</a>
                    @else
                        <a href="{{route('topic.show',$data['id'])}}/unlike"> DISLIKE</a>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>


