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
    @foreach($domains as $domain)
        <div class="row">
    <div class="col-md-3"><a href="{{ action('DomainsController@show',$domain->id) }}">{{$domain->name}}</a></div>
    <div class="col-md-3">{{$domain->description}}</div>
    <div class="col-md-2">{{$domain->robots}}</div>
    <div class="col-md-2">{{$domain->status}}</div>
    <div class="col-md-2">
            <a href="{{ action('DomainsController@edit',$domain->id) }}" class="btn btn-primary btn-s">Edycja</a>
        {{ Form::open(['route' => ['domain_destroy', $domain->id], 'method' => 'delete']) }}
        {{ Form::submit('Usuń',['class'=>'btn btn-xs btn-danger']) }}
        {{ Form::close() }}
        </div>
        </div>
    @endforeach

@stop