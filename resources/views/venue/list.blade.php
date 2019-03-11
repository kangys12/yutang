@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list_group">
                @foreach($types as $type)
                    <li><img src="/images/icon.jpg"><a href="/venue/type/{{$type->id}}">{{$type->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                @foreach($venues as $venue)
                    <div class="media media_item">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/images/list_icon2.jpg" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="/venue/detail/{{$venue->id}}">{{$venue->name}}</a></h4>
                            <p>{{$venue->des}}</p>
                        </div>
                    </div>
                @endforeach
                    {{$venues->links()}}
            </div>
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4>最新公告</h4></div>
                    <div class="panel-body">
                    网球俱乐部全球锦标赛推广服务公开招标

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="display: inline-block">推荐场馆</h4><a href="#" style="float: right;line-height: 44px">全部></a></div>
                    <div class="panel-body">
                        <div>
                            <img src="/images/menu_icon.jpg">
                        </div>
                        <div>
                            <h5 style="display: inline-block">乒乓球俱乐部</h5>
                            <img src="/images/menu_icon.jpg">
                        </div>
                        <div>
                            <h5 style="display: inline-block">蓝球俱乐部</h5>
                            <img src="/images/menu_icon.jpg">
                        </div>
                        <div>
                            <h5 style="display: inline-block">网球俱乐部</h5>
                            <img src="/images/menu_icon.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
