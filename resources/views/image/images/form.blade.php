<div class="form-group{{ $errors->has('post_id') ? 'has-error' : ''}}">
    {!! Form::label('post_id', 'Post Id', ['class' => 'control-label']) !!}
    {!! Form::number('post_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('img') ? 'has-error' : ''}}">
    {!! Form::label('img', 'The Image', ['class' => 'control-label']) !!}
    {!! Form::file('img', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
