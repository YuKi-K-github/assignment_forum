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
            <!-- Like -->
            @if($post->user()->where('user_id', Auth::id())->exists())
                <div class="col-md-3">
                <form action="{{ route('unfavorites', $post) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                </form>
                <div class="row justify-content-center">
                    <p>いいね数：{{ $post->user()->count() }}</p>
                </div>
                </div>
            @else
                <div class="col-md-3">
                <form action="{{ route('favorites', $post) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                </form>
                <div class="row justify-content-center">
                    <p>いいね数：{{ $post->user()->count() }}</p>
                </div>
                </div>
            @endif
        </div>
    @empty
        <p>投稿はありません</p>
    @endforelse
@endsection