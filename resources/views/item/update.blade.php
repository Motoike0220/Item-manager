@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')

<h1>更新</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
       @endforeach
    </ul>
</div>
@endif

<form method='post' action='/items/update'>
    @csrf
    <p><input name='name' type='text' value="{{old('name',$item->name)}}" placeholder='名前'></p>
    <p><select name='type'></p>
        <option>種類を選択してください</option>
        @foreach($type as $key => $value)
        <option value ="{{$key}}" {{$item->type == $key ? "selected" : "" }}>{{$value}}</option>
        @endforeach
    </select>
    <p><textarea name='detail' placeholder='詳細'>{{old('detail',$item->detail)}}</textarea></p>
    <p><button type='submit' class ='btn btn-info'>更新</button></p>
    <input type='hidden' name='id' value='{{$item->id}}'>
</form>

<form method='post' action='/items/delete'>
    @csrf
    <input type='hidden' name='id' value='{{$item->id}}'>
    <button type='submit' class='btn btn-warning'>削除</button>
</form>

@stop
