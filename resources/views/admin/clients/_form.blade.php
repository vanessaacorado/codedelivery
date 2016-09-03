<div id="form-group">
        {!! Form::label('name','Nome: ') !!}
        {!! Form::text('users[name]', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('email','Email: ') !!}
        {!! Form::text('users[email]', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('phone','Telefone: ') !!}
        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('address','Endereço: ') !!}
        {!! Form::textarea('address', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('city','Cidade: ') !!}
        {!! Form::text('city', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('state','Estado: ') !!}
        {!! Form::text('state', null, ['class'=>'form-control']) !!}
        
</div>
<div id="form-group">
        {!! Form::label('zipcode','CEP: ') !!}
        {!! Form::text('zipcode', null, ['class'=>'form-control']) !!}
        
</div>