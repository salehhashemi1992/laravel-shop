@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                                   href="{{route('profile.index')}}" )>Index</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/two_factor_auth') ? 'active' : '' }}" href="{{route('profile.two_factor')}}">TwoFactorAuth</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @yield('profile.body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
