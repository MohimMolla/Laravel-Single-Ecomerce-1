@extends('user_templete.layouts.templete')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('userprofile')}}">Dashborder</a></li>
                        <li><a href="{{route('pendingsorders')}}">Pending Orders</a></li
                        <li><a href="{{route('history')}}">History</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('userprofile')
                </div>
            </div>
        </div>
    </div>
@endsection
