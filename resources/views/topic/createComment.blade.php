    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Comment') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="card-body">
                            <form method="POST" action="{{url('comments')}}">
                                @csrf

                                <input type="hidden" name="topic_id" value="{{$data['id']}}">
                                <div class="row mb-3"><label for="ontent"
                                                             class="col-md-4 col-form-label text-md-end"></label>
                                    <div class="col-md-10 r-md-50">
                                        <textarea id="content" type="text" class="form-control"
                                                  name="content"
                                                  required="" autocomplete="ontent"
                                                  autofocus="" value="" >

                                        </textarea>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary"> comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

