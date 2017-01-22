@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
                <!-- Formularz -->

                @include('pages.form_errors')
                {!! Form::open(['url'=>'pages','class'=>'form-horizontal']) !!}

                @include('pages.form',['buttonText'=>'Dodaj stronę'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@stop