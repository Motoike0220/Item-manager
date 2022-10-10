@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                @can ('Admin')
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <form method='get' action='/items'  class ='form-inline my-2 my-lg-0 ml-2'>
                        @if($errors->has('keyword'))<br><span>{{$errors->first('keyword')}}</span>@endif
                        <p>検索条件</p>
                        <select name="column">
                            <option value='' selected disable>検索条件を選んでください</option>
                            <option value='id'>ID</option>
                            <option value='user_name'>作成者</option>
                            <option value='name'>商品名</option>
                        </select>
                        
                        <select name ='types'>
                            <option value='' selected disable>種別を選んでください</option>
                            @foreach($type as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                           
                        <div class ='form-group'>
                        <input type ='search' class ='form-control mr-sm-2' name ='keyword' aria-label='検索'>
                        </div>
                        <input type='submit' value='検索' class='btn btn-info'>
                        <button type='submit' value='クリア'><a href={{route('items')}}>クリア</a></button>
                    </form>

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>作成者</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                @can ('Admin')
                                <th>更新</th>
                                @endcan
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
                                    @can ('Admin')
                                    <td class="btn btn-info"><a href ="/items/update{{$item->id}}">更新</a></td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $items->appends(request()->query())->links() !!}
    
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
