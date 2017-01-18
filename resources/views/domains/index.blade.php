@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3">Nazwa</div>
        <div class="col-md-3">Opis</div>
        <div class="col-md-2">Robots</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Akcje</div>
    </div>
    @foreach($domains as $domain)
        <div class="row">
    <div class="col-md-3">{{$domain->name}}</div>
    <div class="col-md-3">{{$domain->description}}</div>
    <div class="col-md-2">{{$domain->robots}}</div>
    <div class="col-md-2">{{$domain->status}}</div>
    <div class="col-md-2">
        <div class="edit-button">
            <a href="{{ action('DomainsController@edit',$domain->id) }}" class="btn btn-primary btn-lg">
                Edytuj Domenę
            </a>
        </div></div>
        </div>
    @endforeach
@stop