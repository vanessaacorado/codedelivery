<div id="form-group">
        {!! Form::label('name','Nome: ') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        
</div>

<div id="form-group">
        {!! Form::label('category','Categoria: ') !!}
        {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
        
</div>

<div id="form-group">
        {!! Form::label('description','Decrição: ') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        
</div>

<div id="form-group">
        {!! Form::label('price','Preço: ') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
        
</div>