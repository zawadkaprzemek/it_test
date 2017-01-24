<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('domain_id','Domena:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::select('domain_id',$domains, null,['class'=>'form-control','placeholder' => 'Wybierz domenę']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('type','Typ:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::text('type',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('status','Status:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::text('status',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('ProductList','Produkty:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::select('ProductList[]',$products, null,['class'=>'form-control','multiple']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('note','Notatka:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::textarea('note',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($buttonText,['class'=>'btn btn-primary']) !!}
    </div>
</div>