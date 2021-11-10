@extends('layout')

@section('title')
Post
@endsection

@section('content')
    <article>
        <h1> {{$post->title}} </h1>
        <div>
            {!!$post->body!!}
        </div>
    </article>

    <a href="/">Go back</a>
@endsection

    

    