@extends('layouts.app')

@section('content')
    <div class="container venue_detail">
        <div class="row">
            <ul class="list_group sty">
                @foreach($types as $type)
                    <li><img src="/images/icon.jpg"><a href="/venue/type/{{$type->id}}">{{$type->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-md-5">
                <img src="/images/ymq.jpg">
            </div>
            <div class="col-md-7">
                <h3>{{$venue->name}}</h3>
                <p>场馆类型：{{$venue->type->name}}</p>
                <p>场馆地址:{{$venue->address}}</p>
                <p>场馆简介：{{$venue->des}}</p>
            </div>
        </div>
        <div class="row order_wrap">
            <div class="col-md-9">
                <div class="venue_header">
                    @foreach($dates as $date)
                        <dl>
                            <dt>{{$date['date']}}</dt>
                            <dd>{{$date['week']}}</dd>
                        </dl>
                    @endforeach
                </div>
                <div class="venue_body">
                    <ul class="time_list">
                        @foreach($times as $time)
                            <li>{{$time}}</li>
                        @endforeach
                    </ul>
                    @foreach($date_fields as $date=>$fields)
                        <div class="day_list">
                            @foreach($fields as $field=>$time_list)
                                <dl class="tab">
                                    <dt class="tab-item">场地编号{{$field}}</dt>
                                    <dd>
                                        <ul>
                                        @foreach($time_list as $time=>$price)
                                            <li data-field="{{$field}}" data-time="{{$time}}" @if($price['is_ordered']) class="ordered" @endif>{{$price['price']}}</li>
                                        @endforeach
                                        </ul>
                                    </dd>
                                </dl>


                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="template">
                    <dl class="item">
                        <dt class="dt">时间：11</dt>
                        <dd class="dd">场地：</dd>
                    </dl>
                </div>
                <div class="order_box">
                    <div>
                        <input type="hidden" value="{{$venue->id}}" class="venue_id"/>
                        <p>订单类型：羽毛球</p>
                        <p>订单时间：<span class="order-date">{{$today}}</span></p>
                    </div>
                    <div class="order-detail">
                    </div>
                    <div class="order-btn">
                        <h5>总价</h5>
                        <button style="position: absolute; right: -200px" class="btn btn-default order_btn">下单</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">提示信息</h4>
                    </div>
                    <div class="modal-body">
                        亲，一次最多选择4个时段
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
