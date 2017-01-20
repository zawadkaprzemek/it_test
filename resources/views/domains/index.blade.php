@extends('master')
@section('content')
    <div class="row">
    <div class="col-md-4">
    <a href="{{ action('DomainsController@create')}}" class="btn btn-primary btn-s">Dodaj domenę</a>
    </div>
    <div class="col-lg-12" style="border-bottom: 2px solid black;">
        <div class="col-md-3">Nazwa</div>
        <div class="col-md-3">Opis</div>
        <div class="col-md-2">Robots</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Akcje</div>
    </div>
        @foreach($domains as $domain)
    <div class="col-lg-12" style="padding-top:5px;">
    <div class="col-md-3"><a href="{{ action('DomainsController@show',$domain->id) }}">{{$domain->name}}</a></div>
    <div class="col-md-3">{{$domain->description}}</div>
    <div class="col-md-2">{{$domain->robots}}</div>
    <div class="col-md-2">{{$domain->status}}</div>
    <div class="col-md-2">
        {{ Form::open(['route' => ['domains.destroy', $domain->id], 'method' => 'delete']) }}
        <a href="{{ action('DomainsController@edit',$domain->id) }}" class="btn btn-primary btn-s">Edycja</a>
        {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
        {{ Form::close() }}
        </div>
        </div>
    @endforeach
    </div>
@stop