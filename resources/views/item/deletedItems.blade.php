@extends('adminlte::page')

@section('title', '削除された商品')

@section('content_header')
    <h1>削除された商品</h1>
@stop

@section('content')
<div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>作成者</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $type[$item->type] }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <form method='get' action='/items/delete'>
                                        @csrf
                                        <input type='hidden' name='id' value='{{$item->id}}'>
                                        <td><button type='submit' class='btn btn-danger'>削除</button></td>
                                    </form>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
@stop

@section('css')
@stop

@section('js')
@stop
