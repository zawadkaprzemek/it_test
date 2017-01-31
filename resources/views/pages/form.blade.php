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
        {!! Form::select('ProductList[]',$products, null,['class'=>'form-control','id'=>'produkty','multiple']) !!}
        <div id="variants">
            @if(isset($pages))
                @foreach($pages->products as $product)
                    <div id="prod_var">
                    <label for="variants">
                    {{$product->name}}
                    </label>
                    <select class="form-control" name="VariantList[]">
                        @if($product->pivot->variant=='Small')
                        <option value="Small" selected>Small</option>
                        <option value="Big">Big</option>
                        @else
                            <option value="Small">Small</option>
                            <option value="Big" selected>Big</option>
                        @endif
                    </select>
                    </div>
                @endforeach
            @endif
        </div>
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

    <script>
        $(document).ready(function () {
            console.log($('#produkty').val());
            $('#produkty option').click(function () {
                console.log($('#produkty').val());
                var val=$('#produkty').val();
                console.log(val);
                /*foreach(val as vl){
                    $('#variants').html($('#variants').html +' ' +vl);
                }*/
                $('#variants').html('');
                val.forEach(function (vl) {
                    var add='<div class="variants">' +
                            '<label for="variant'+vl+'">' + $('#produkty option[value='+vl+']').text()+
                            '<select class="form-control" name="VariantList[]">'+
                            '<option value="Small">Small</option>'+
                            '<option value="Big">Big</option>'+
                            '</select></div>'
                    $('#variants').html($('#variants').html()+add);
                });

            });
        });
    </script>