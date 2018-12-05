
@extends('layouts.backend')

@section('content')


    <div class="container">
        <div class="row">
{{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User</div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID.</th> <th>Name</th><th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $user->id }}</td> <td> {{ $user->name }} </td><td> {{ $user->email }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <br/>
                @foreach($user->posts as $item)
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
            </div>
        </div>
    </div>


@endsection
