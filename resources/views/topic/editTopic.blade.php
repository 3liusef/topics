@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new topic') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <div class="card-body">
                            <form method="POST" action="{{url('topic'.'/'.$data['id'])}}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3"><label for="content"
                                                             class="col-md-4 col-form-label text-md-end">topic Content</label>
                                    <div class="col-md-6">
                                        <textarea id="content" type="text" class="form-control"
                                                  name="content"
                                                  required="" autocomplete="content"
                                                  autofocus="" rows="10" value="{{$data['content']}}">

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
                                        <button type="submit" class="btn btn-primary"> Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
