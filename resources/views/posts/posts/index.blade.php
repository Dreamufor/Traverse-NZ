@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}
            <div class="col-md-8">
                <div class="d-inline-block">
                    {{--<button class="btn btn-success btn-sm mb-2" type="button">+ Add New</button>--}}
                    <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm" title="Create Your own travel plan">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>

            </div>

            <div class="col-md-4">
                {!! Form::open(['method' => 'GET', 'url' => '/posts', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="search" placeholder="Search place" value="{{ request('search') }}">
                    <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                {!! Form::close() !!}

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            @foreach($posts as $item)
                <div class="card mt-2" style="height:300px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 " style="height:250px;width:250px;">
                                    {{--@for ($i = 0; $i < $item->images->count; $i++)--}}
                                        {{--The current value is {{ $i }}--}}
                                    {{--@endfor--}}
                                    {{--<img src="{{$item->images}}">--}}
                                    @forelse($item->images as $image)
                                        @if ($loop->first)
                                            <img src="{{$image->url}}" class="img-fluid img-rounded" style="height:250px;width:250px;">
                                        @endif
                                    @empty
                                        <p>No picture</p>
                                    @endforelse
                                </div>
                                <div class="col-md-9">
                                    <div>
                                        <h5 class="card-title d-inline-block">
                                            <a href="{{ url('/posts/' . $item->id) }}">
                                                {{ $loop->iteration or $item->id }} : {{ $item->title }}
                                            </a>

                                        </h5>
                                        <p class="card-text float-right">Departure : {{ $item->departure }} </p>
                                    </div>
                                    <div>
                                        <p class="card-text d-inline-block"> Seats : {{ $item->seats }}</p>
                                        <p class="card-text float-right">Destination : {{ $item->destination }} </p>
                                    </div>
                                    <div>
                                        <p class="card-text">{{str_limit( $item->content,$limit = 132, $end = '...' ) }}</p>
                                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                                        <a href="{{ url('/posts/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/posts/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'url' => ['/posts', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Delete Post',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                        {{--<a href="{{ url('/posts/' . $item->id) }}" class="btn btn-primary float-right">Go</a>--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

            {{--<div class="col-md-4">--}}
                {{--<div class="card  mt-2" style="width: 18rem;">--}}
                    {{--<div class="card-header">--}}
                        {{--More journeys--}}
                    {{--</div>--}}
                    {{--<ul class="list-group list-group-flush">--}}
                        {{--<li class="list-group-item">Link-1</li>--}}
                        {{--<li class="list-group-item">Link-2</li>--}}
                        {{--<li class="list-group-item">Link-3</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>




@endsection
