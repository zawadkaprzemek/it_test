@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="panel-body">
                    <!-- Formularz -->

                   @include('pages.form_errors')
                    {!! Form::model($pages,['method'=>'PATCH','class'=>'form-horizontal','action'=>['PagesController@update',$pages->id]]) !!}

                    @include('pages.form',['buttonText'=>'Zaaktualizuj stronę'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop