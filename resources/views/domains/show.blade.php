@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3">Nazwa</div>
        <div class="col-md-3">Opis</div>
        <div class="col-md-2">Robots</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Akcje</div>
    </div>
    <hr style="background: black;height: 2px;">
    <div class="row">
        <div class="col-md-3">{{$domains->name}}</div>
        <div class="col-md-3">{{$domains->description}}</div>
        <div class="col-md-2">{{$domains->robots}}</div>
        <div class="col-md-2">{{$domains->status}}</div>
        <div class="col-md-2">
            <a href="{{ action('DomainsController@edit',$domains->id) }}" class="btn btn-primary btn-s">Edycja</a>
            {{ Form::open(['route' => ['domain_destroy', $domains->id], 'method' => 'delete']) }}
            {{ Form::submit('Usuń',['class'=>'btn btn-xs btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop