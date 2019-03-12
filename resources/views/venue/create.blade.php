
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
                        <form method="post" action="/venue/save">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">场馆类型：</label>
                                <select class="form-control" name="type_id">
                                    @foreach($types as $type)
                                    <option name="type_id" value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆名称：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆地址：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆电话：</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="tel">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">场馆简介：</label>
                                <textarea class="form-control" rows="5" name="des"></textarea>
                            </div>
                            <div class="radio ">
                                <label>
                                    <input type="radio" name="state" id="optionsRadios3" value="1" checked>开放<br>
                                    <input type="radio" name="state" id="optionsRadios3" value="0" >闭馆

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
