
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">个人中心</div>
                    <ul class="list_group ul-t">
                        <li class="list-group-item"><a href="">我的收藏</a></li>
                        <li class="list-group-item"><a href="/venue/create">创建场馆</a></li>
                        <li class="list-group-item"><a href="/venue/show">我的场馆</a></li>
                        <li class="list-group-item"><a href="/photo/set">设置头像</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">创建场馆</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/ymq.jpg" width="100%">

                            </div>
                            <div class="col-md-6">
                                <h3>{{$venue->name}}</h3>
                                <p>场馆类型：{{$venue->type->name}}</p>
                                <p>场馆地址:{{$venue->address}}</p>
                                <p>场馆简介：{{$venue->des}}</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>id</th>
                                        <th>时段</th>
                                        <th>价格</th>
                                        <th>操作</th>

                                    </tr>
                                    @foreach($prices as $key=>$price)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$price->time}}</td>
                                        <td><input value="{{$price->price}}"/></td>
                                        <td><button class="btn btn-info btn-xs price-btn " data-id={{$price->id}}>保存</button></td>


                                    </tr>
                                        @endforeach
                                </table>
                            </div>
                            {{--<div class="col-md-6"></div>--}}

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
