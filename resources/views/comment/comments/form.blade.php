
@if ($fromPost === 'yes')


    <div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
        {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
        {!! Form::textarea('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>


    @if (Auth::check())

        <div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
{{--            {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}--}}
            {!! Form::hidden('user_id', Auth::user()->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group{{ $errors->has('reply_to') ? 'has-error' : ''}}">
{{--            {!! Form::label('reply_to', 'Reply To', ['class' => 'control-label']) !!}--}}
            {!! Form::hidden('reply_to', $post->user->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('reply_to', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group{{ $errors->has('post_id') ? 'has-error' : ''}}">
{{--            {!! Form::label('post_id', 'Post to', ['class' => 'control-label']) !!}--}}
            {!! Form::hidden('post_id', $post->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
        </div>

    @else

        <div><a  href="{{ url('/login') }}">Login</a> to contact the organiser! 😄</div>

    @endif
@else



<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('reply_to') ? 'has-error' : ''}}">
    {!! Form::label('reply_to', 'Reply To', ['class' => 'control-label']) !!}
    {!! Form::number('reply_to', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('reply_to', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('post_id') ? 'has-error' : ''}}">
    {!! Form::label('post_id', 'Post to', ['class' => 'control-label']) !!}
    {!! Form::text('post_id', $post->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
</div>

@endif

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>



