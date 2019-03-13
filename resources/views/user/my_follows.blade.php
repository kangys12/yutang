
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-top: 20px">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading panel-info">个人中心</div>
                    <ul class="list_group ul-t">
                        <li class="list-group-item"><a href="">我的收藏</a></li>
                        <li class="list-group-item"><a href="/venue/create">创建场馆</a></li>
                        <li class="list-group-item info"><a href="/venue/show">我的场馆</a></li>
                        <li class="list-group-item"><a href="">设置头像</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">创建场馆</div>
                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>场馆分类</th>
                            <th>场馆名称</th>
                            <th>场馆地址</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($my_follows as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->type->name}}</td>
                                <td>{{$type->name}}</td>
                                <td>{{$type->address}}</td>
                                <td>{{$type->created_at}}</td>
                                <td><a href="/venue/detail/{{$type->id}}">查看详情</a></td>

                            </tr>
                            @endforeach
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
