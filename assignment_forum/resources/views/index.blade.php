@extends('layouts.app')

@section('content')
    @forelse($posts as $post)
        <div class="posts">
            <p class="post_title">{{ $post->title }}</p>
            <p class="post_contents">{{ $post->contents }}</p>
            <p class="post_user">投稿者: {{ $post->user->name }}</p>
            @if(\Auth::user()->name === $post->user->name)
                <form class="edit_form" method="get" action="{{ url('/forum/'.$post->id.'/edit') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input class="edit_submit" type="submit" value="編集する">
                </form>
                <form class="delete_form" method="post" action="{{ url('/forum/'.$post->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="delete_submit" type="submit" value="削除する">
                </form>
            @endif
        </div>
    @empty
        <p>投稿はありません</p>
    @endforelse
@endsection
<!-- review request -->