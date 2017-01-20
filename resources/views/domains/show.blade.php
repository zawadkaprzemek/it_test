@extends('master')
@section('content')
    <div class="row">
    <div class="col-lg-12" style="border-bottom: 2px solid black;">
        <div class="col-md-3">Nazwa</div>
        <div class="col-md-3">Opis</div>
        <div class="col-md-2">Robots</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Akcje</div>
    </div>
    <div class="col-lg-12" style="padding-top:5px;">
        <div class="col-md-3">{{$domains->name}}</div>
        <div class="col-md-3">{{$domains->description}}</div>
        <div class="col-md-2">{{$domains->robots}}</div>
        <div class="col-md-2">{{$domains->status}}</div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['domains.destroy', $domains->id], 'method' => 'delete']) }}
            <a href="{{ action('DomainsController@edit',$domains->id) }}" class="btn btn-primary btn-s">Edycja</a>
            {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
    </div>
@stop