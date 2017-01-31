@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('PagesController@create')}}" class="btn btn-primary btn-s">Dodaj stronę</a>
        </div>
        <div class="col-lg-12" style="border-bottom: 2px solid black;">
        <div class="col-md-2">Domena</div>
        <div class="col-md-2">Typ</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Produkty</div>
        <div class="col-md-2">Notatka</div>
        <div class="col-md-2">Akcje</div>
        </div>
    @foreach($pages as $page)
        <div class="col-lg-12" style="padding-top:5px;">
        <div class="col-md-2"><a href="{{ action('PagesController@show',$page->id) }}">{{$page->domain->name}}</a></div>
        <div class="col-md-2">{{$page->type}}</div>
        <div class="col-md-2">{{$page->status}}</div>
        <div class="col-md-2">
            @foreach($page->products as $product)
                {{$product->name}}
                {{$product->pivot->variant}},<br>
            @endforeach</div>
        <div class="col-md-2">{{$page->note}}</div>
        <div class="col-md-2">
        {{ Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) }}
        <a href="{{ action('PagesController@edit',$page->id) }}" class="btn btn-primary btn-s">Edycja</a>
        {{ Form::submit('Usuń',['class'=>'btn btn-s btn-danger']) }}
        {{ Form::close() }}
        </div>
        </div>
    @endforeach
    </div>
@stop