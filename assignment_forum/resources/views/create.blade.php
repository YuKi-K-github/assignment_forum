@extends('layouts.app')

@section('content')
    <!-- error display -->
    @foreach($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach
    <form class="create_form" method="post" action="{{ url('/forum') }}">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label>タイトル</label><br>
        <input class="create_column" type="text" name="title"><br>
        <label>コンテンツ</label><br>
        <textarea class="create_column_contents" type="text" name="contents"></textarea><br>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="submit" class="submit_new_post" value="新規投稿">
    </form>
@endsection
<!-- review request -->