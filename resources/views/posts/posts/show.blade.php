@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Post {{ $post->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['posts', $post->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $post->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $post->title }} </td></tr><tr><th> Content </th><td> {{ $post->content }} </td></tr><tr><th> Seats </th><td> {{ $post->seats }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                        @foreach($post->images as $img)
                            <img
                                class="img-fluid img-thumbnail"
                                style="width: auto; height: 150px;"

                            @if (substr($img->url, 0,5)==='https' )

                                src="{{$img->url}}"
                            @else
                                src="{{ asset($img->url)}}"
                            @endif
                            >
                        @endforeach
                        <h5> Comments</h5>

{{--                        @if (!Auth::check())--}}

{{--                        {!! Form::open(['url' => '/comments', 'class' => 'form-horizontal', 'files' => true]) !!}--}}


{{--                        {!! Form::close() !!}--}}



                        {!! Form::open(['url' => '/comments', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('comment.comments.form', ['formMode' => 'create', 'fromPost' => 'yes'])

                        {!! Form::close() !!}














                        {{--@else--}}

                            {{--<div>--}}
                                {{--Be the first one to talk to the organiser!😄--}}
                            {{--</div>--}}

                        {{--@endif--}}

    {{--@foreach($post->comments as $comment)--}}

        {{--<p>User{{$comment->user->name}}  send comment id {{$comment->id}}  content {{$comment->content}} to comment by--}}

            {{--@if($comment->replying)--}}
            {{--{{$comment->replying -> user->name}}--}}

            {{--@endif--}}
        {{--</p>--}}
    {{--@endforeach--}}

    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
            <tr>
                {{--<th>#</th><th>Content</th><th>User Id</th><th>Reply To</th><th>Actions</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($post->comments as $item)
                <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->content }}</td>
                    {{--<td>{{ $item->user_id }}</td>--}}
                    {{--<td>{{ $item->reply_to }}</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{ url('/comments/' . $item->id) }}" title="View Comment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>--}}
                        {{--<a href="{{ url('/comments/' . $item->id . '/edit') }}" title="Edit Comment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>--}}

                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--<div class="pagination-wrapper"> {!! $comments->appends(['search' => Request::get('search')])->render() !!} </div>--}}
    </div>


</div>
</div>
</div>
</div>
</div>
@endsection
