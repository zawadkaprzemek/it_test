@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">
                    <!-- Formularz -->

                   @include('domains.form_errors')
                    {!! Form::model($domains,['method'=>'PATCH','class'=>'form-horizontal','action'=>['DomainsController@update',$domains->id]]) !!}

                    @include('domains.form',['buttonText'=>'Zaaktualizuj domenę'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop