@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                @foreach($types as $type)
                <li class="list-group-item"><a href="/venue/type/{{$type->id}}">{{$type->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-heading">场馆列表</div>
                <div class="panel-body">
                    @foreach($venues as $venue)
                    <div class="panel panel-info">
                        <div class="panel-heading"><a href="">{{$venue->name}}</a></div>
                        <div class="panel-body">
                            {{$venue->des}}
                        </div>
                    </div>
                    @endforeach
                        {{$venues->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
