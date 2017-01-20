<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('name','Nazwa:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('description','Opis:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
        {!! Form::label('robots','Robots:') !!}
    </div>
    <div class="col-md-6">
        {!! Form::textarea('robots',null,['class'=>'form-control']) !!}
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
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($buttonText,['class'=>'btn btn-primary']) !!}
    </div>
</div>