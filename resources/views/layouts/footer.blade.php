
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: tim--}}
 {{--* Date: 1/10/18--}}
 {{--* Time: 10:25 AM--}}
 {{--*/--}}
<footer class="page-footer font-small" style="background-color:#f8fafc;">
    <div class="text-center text-md-left">
        <div class="row" style="padding: 0% 16%;">

            <div class="col-md-6 mt-md-0">
                <h5 class="text-uppercase">{{ config('app.name', 'Laravel') }}</h5>
                <p>We are a place to help you finding your travel partners.</p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">About</h5>
                <ul class="list-unstyled">
                    <li class="">
                        <a class="alert-link alert-light" href="{{ url('/admin') }}">Dashboard</a>
                    </li>

                    <li class="">
                        <a class="alert-link alert-light" href="{{url('/posts')}}">Posts</a>
                    </li>
                    <li class="">
                        <a class="alert-link alert-light" href="{{url('/images')}}">Images</a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Post your trip</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">My group</a>--}}
                    {{--</li>--}}
                    <li class="">
                        <a class="alert-link alert-light" href="{{url('/posts')}}">Help</a>
                    </li>
                    <li class="">
                        <a class="alert-link alert-light" href="#">About us</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">
                    Contact
                </h5>
                <address>
                    Room 2020 Level 2, Building 180, 139 Carrington Rd, Mount Albert, Auckland 1025
                </address>


            </div>
            <div class="container text-center">
                &copy; {{ date('Y') }}. <a href="https://traverse.bai.uno">{{ config('app.name', 'Laravel') }}</a>
                <br/>
            </div>
        </div>
    </div>



</footer>


