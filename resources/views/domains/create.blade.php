@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
                <!-- Formularz -->

                @include('domains.form_errors')
                {!! Form::open(['url'=>'domains','class'=>'form-horizontal']) !!}

                @include('domains.form',['buttonText'=>'Dodaj domenę'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@stop