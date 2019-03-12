
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
                        <form method="post" action="/photo/bao" enctype="multipart/form-data">
                            {{csrf_field()}}
                           <div class="form-group">
                               上传头像：<input type="file" name="icon">
                           </div>
                            <div class="form-group">
                                <button class="btn  btn-default" type="submit">保存</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
