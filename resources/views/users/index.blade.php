@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ユーザー一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                <form method='get' action='/users/'  class ='form-inline my-2 my-lg-0 ml-2'>
                        <p>検索条件</p>
                        <select name="column">
                            <option value='id'>ID</option>
                            <option value='name'>ユーザー名</option>
                            <option value='email'>メールアドレス</option>
                            <option value='user_level'>管理権限</option>
                        </select>
                        <div class ='form-group'>
                        <input type ='search' class ='form-control mr-sm-2' name ='keyword' aria-label='検索'>
                        </div>
                        <input type='submit' value='検索' class='btn btn-info'>
                        <button type='submit' value='クリア'><a href={{route('users')}}>クリア</a></button>
                    </form>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>管理レベル</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->user_level }}</td>
                                    <td class="btn btn-warning"><a href ="/users/edit{{$user->id}}">更新</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $users->appends(request()->query())->links() !!}
    <p><a href ="{{route('items')}}">ホーム</a></p>

    @can ('Admin')
        <p><a href ="/items/deletedItems">削除された商品</a></p>
        <p><a href ="{{route('users')}}">ユーザー一覧</a></p>
        <p><a href ="{{route('searchUsers')}}">ユーザー検索</a></p>
    @endcan
@stop

@section('css')
@stop

@section('js')
@stop
