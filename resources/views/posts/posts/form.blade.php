<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('seats') ? 'has-error' : ''}}">
    {!! Form::label('seats', 'Seats', ['class' => 'control-label']) !!}
    {!! Form::number('seats', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('destination') ? 'has-error' : ''}}">
    {!! Form::label('destination', 'Destination', ['class' => 'control-label']) !!}
    {!! Form::text('destination', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('departure') ? 'has-error' : ''}}">
    {!! Form::label('departure', 'Departure', ['class' => 'control-label']) !!}
    {!! Form::text('departure', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('departure', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('departure_time') ? 'has-error' : ''}}">
    {!! Form::label('departure_time', 'Departure Time', ['class' => 'control-label']) !!}
    {!! Form::input('datetime-local', 'departure_time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('departure_time', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
