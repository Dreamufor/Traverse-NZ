@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Comment #{{ $comment->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/comments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($comment, [
                            'method' => 'PATCH',
                            'url' => ['/comments', $comment->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('comment.comments.form', ['formMode' => 'edit' , 'fromPost' => 'no' ])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection