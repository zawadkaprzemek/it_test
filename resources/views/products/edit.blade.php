@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">
                    <!-- Formularz -->

                   @include('products.form_errors')
                    {!! Form::model($products,['method'=>'PATCH','class'=>'form-horizontal','action'=>['ProductsController@update',$products->id]]) !!}

                    @include('products.form',['buttonText'=>'Zaaktualizuj produkt'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop