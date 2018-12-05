@extends('layouts.base')

@section('content')



        <div id="demo" class="position-relative">
            <img src="{{ asset('img/home_bg.jpg') }}" style="width:100%">
                    <div class="position-absolute" style="z-index: 2;left:20%;top:40%;">
                        {!! Form::open(['method' => 'GET', 'url' => '/posts', 'class' => 'form-inline mr-auto ml-auto', 'role' => 'search'])  !!}

                            <div class="input-group" class="embed-responsive">

                                <input class="form-control"
                                       name="search"
                                       type="text"
                                       placeholder="Mt Cook"
                                >
                                <button
                                    class="btn btn-dark input-group-append align-items-center"
                                >
                                    <i class="fas fa-search"
                                    ></i>
                                </button>
                            </div>
                        {!! Form::close() !!}

            </div>

        </div>
        <br>
        <div class="container body-content">
            <div class="row">

                @foreach($posts as $post)
                <div class="col-12 col-sm-6 col-md-3 mt-2">
                    <div class="card" style="width:auto;height:auto;">
                        <a href="{{ url('/posts/' . $post->id) }}">
                            <img class="card-img-top"

                                 @if (substr($post->url, 0,5)==='https' )

                                 src="{{$post->url}}"
                                 @else
                                 src="{{ asset($post->url)}}"
                                 @endif

                                 alt="Card image"
                                 style="width:100%"
                            >
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ url('/posts/' . $post->id) }}">
                                {{$post->title}}
                                </a>
                            </h5>
                            <p class="card-text">
{{--                                {{ $post->content }}--}}
                                {{str_limit( $post->content,$limit = 66, $end = '...' ) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
@endsection
