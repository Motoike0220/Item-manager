@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')

<h1>ユーザーの編集</h1>

<form method='post' action='/users/edit'>
    @csrf
    <p><input name='name' type='text' value="{{old('name',$user->name)}}"></p>
    <p><input name='email' type='text' value="{{old('email',$user->email)}}"></p>
    <p><span>ユーザー権限</span><input name='user_level' type='radio' @if {{$user->user_level}} == 1 checked @endif ></p>
    <p><button type='submit' class ='btn btn-warning'>更新</button></p>
    <input type='hidden' name='id' value='{{$user->id}}'>
</form>

<form method='post' action='{{route('deleteUser')}}'>
    @csrf
    <input type='hidden' name='id' value='{{$user->id}}'>
    <button type='submit' class='btn btn-danger'>削除</button>
</form>

<p><a href ="{{route('items')}}">ホーム</a></p>
@stop
