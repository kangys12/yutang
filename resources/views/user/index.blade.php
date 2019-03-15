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
                        <form method="post" action="/photo/bao" enctype="multipart/form-data">
                            {{csrf_field()}}
                           <div class="form-group">
                               <img src="/upload/{{\Auth::user()->icon}}" style="width: 100px;margin-bottom: 20px">
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
