@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')

<h1>ユーザーの編集</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
       @endforeach
    </ul>
</div>
@endif

<form method='post' action='/users/edit'>
    @csrf
    <p><input name='name' type='text' value="{{old('name',$user->name)}}"></p>
    <p><input name='email' type='text' value="{{old('email',$user->email)}}"></p>
    <select name='user_level'>
       <option value='1' @if( $user->user_level ==1 ) selected @endif >管理権限あり</option>
        <option value='0' @if( $user->user_level ==0 ) selected @endif >管理権限なし</option>
    </select>
    <p><button type='submit' class ='btn btn-warning'>更新</button></p>
    <input type='hidden' name='id' value='{{$user->id}}'>
</form>

<form method='post' action='{{route('deleteUser')}}'>
    @csrf
    <input type='hidden' name='id' value='{{$user->id}}'>
    <button type='submit' class='btn btn-danger'>削除</button>
</form>

@stop
