@extends('layouts.app')

@section('content')

@foreach($allTopics as $data)
                        @include('topic.topic')
                        @endforeach


@endsection
