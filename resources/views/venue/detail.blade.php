
@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection
