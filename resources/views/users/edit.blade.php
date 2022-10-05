@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')

<h1>ユーザーの編集</h1>

<form method='post' action='/users/edit'>
    @csrf
    <p><input name='name' type='text' value="{{old('name',$user->name)}}" placeholder='名前'></p>
    <p><button type='submit' class ='btn btn-warning'>更新</button></p>
    <input type='hidden' name='id' value='{{$user->id}}'>
</form>

<form method='post' action='/items/delete'>
    @csrf
    <input type='hidden' name='id' value='{{$user->id}}'>
    <button type='submit' class='btn btn-danger'>削除</button>
</form>


@stop