@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="border-bottom: 2px solid black;">
            <div class="col-md-5">Nazwa</div>
            <div class="col-md-5">Code</div>
            <div class="col-md-2">Akcje</div>
    </div>
    <div class="col-lg-12" style="padding-top:5px;">
        <div class="col-md-5">{{$products->name}}</div>
        <div class="col-md-5">{{$products->code}}</div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) }}
            <a href="{{ action('ProductsController@edit',$products->id) }}" class="btn btn-primary btn-s">Edycja</a>
            {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
    </div>
@stop