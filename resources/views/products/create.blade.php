@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
                <!-- Formularz -->

                @include('products.form_errors')
                {!! Form::open(['url'=>'products','class'=>'form-horizontal']) !!}

                @include('products.form',['buttonText'=>'Dodaj produkt'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@stop