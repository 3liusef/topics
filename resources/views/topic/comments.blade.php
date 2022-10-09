<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($data['comments'] as $comment)
                    <div class="card-header">
                        {{ $comment['user_name']. "  " .$comment['created_at']->diffForHumans() }}

                        <div class="card-body">
                            {{$comment['content']}}
                        </div>

                        @if( \Illuminate\Support\Facades\Auth::user()->id == $comment['user_id'])
                        <!--  TODO: EDIT COMMENT -->
                        @endif

                    </div>
                @endforeach

            </div>

                </div>

            </div>
        </div>
    </div>


</div>


