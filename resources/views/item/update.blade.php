@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')
<h1>更新</h1>

<form method='post' action='/item/update'>
    <p><input name='name' type='text' placeholder='名前'></p>
    <p><select name='type'></p>
        <option>種類を選択してください</option>
        @foreach($type as $key => $value)
        <option value ="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
    <p><textarea name='detail' placeholder='詳細'></textarea></p>
    <p><button type='submit' class ='btn btn-warning'>更新</button></p>
</form>
@stop
