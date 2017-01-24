@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="border-bottom: 2px solid black;">
            <div class="col-md-2">Domena</div>
            <div class="col-md-2">Typ</div>
            <div class="col-md-2">Status</div>
            <div class="col-md-2">Produkty</div>
            <div class="col-md-2">Notatka</div>
            <div class="col-md-2">Akcje</div>
    </div>
    <div class="col-lg-12" style="padding-top:5px;">
        <div class="col-md-2">{{$pages->domain->name}}</div>
        <div class="col-md-2">{{$pages->type}}</div>
        <div class="col-md-2">{{$pages->status}}</div>
        <div class="col-md-2">
            @foreach($pages->products as $product)
                {{$product->name}},
            @endforeach</div>
        <div class="col-md-2">{{$pages->note}}</div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['pages.destroy', $pages->id], 'method' => 'delete']) }}
            <a href="{{ action('PagesController@edit',$pages->id) }}" class="btn btn-primary btn-s">Edycja</a>
            {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
    </div>
@stop