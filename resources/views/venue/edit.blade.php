
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <side_bar></side_bar>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">创建场馆</div>
                    <div class="panel-body">
                        <form method="post" action="/venue/update/{{$venue->id}}">
                            {{csrf_field()}}
                            {{--<input type="text" value="{{$types->id}}">--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">场馆类型：</label>
                                <select class="form-control" name="type_id">
                                    @foreach($types as $type)
                                    <option name="type_id" value="{{$type->id}}" @if($venue->type_id==$type->id) selected @endif>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆名称：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$venue->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆地址：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{$venue->address}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆电话：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="tel" value="{{$venue->tel}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆简介：</label>
                                <textarea class="form-control" rows="5" name="des">{{$venue->des}}</textarea>
                            </div>
                            <div class="radio ">
                                <label>
                                    <input type="radio" name="state" id="optionsRadios3" value="1" @if($venue->state=='1') checked @endif >开放<br>
                                    <input type="radio" name="state" id="optionsRadios3" value="0" @if($venue->state=='0') checked @endif >闭馆

                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">保存场馆</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
