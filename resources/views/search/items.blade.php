@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品の検索</h1>
@stop

@section('content')

<form class ='form-inline my-2 my-lg-0 ml-2'>
    <div class ='form-group'>
    <input type ='search' class ='form-control mr-sm-2' name ='keyword' aria-label='検索'>
    </div>
    <input type='submit' value='検索' class='btn btn-info'>
</form>

@stop

@section('css')
@stop

@section('js')
@stop
