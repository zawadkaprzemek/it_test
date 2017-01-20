@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('ProductsController@create')}}" class="btn btn-primary btn-s">Dodaj produkt</a>
        </div>
        <div class="col-lg-12" style="border-bottom: 2px solid black;">
        <div class="col-md-5">Nazwa</div>
        <div class="col-md-5">Code</div>
        <div class="col-md-2">Akcje</div>
        </div>

    @foreach($products as $product)
        <div class="col-lg-12" style="padding-top:5px;">
        <div class="col-md-5"><a href="{{ action('ProductsController@show',$product->id) }}">{{$product->name}}</a></div>
        <div class="col-md-5">{{$product->code}}</div>
        <div class="col-md-2">
        {{ Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) }}
        <a href="{{ action('ProductsController@edit',$product->id) }}" class="btn btn-primary btn-s">Edycja</a>
        {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
        {{ Form::close() }}
        </div>
        </div>
    @endforeach
    </div>
@stop