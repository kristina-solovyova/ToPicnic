@extends('front.layouts.main-layout')

@section('content')
    <div class="sidebar" data-background-color="white" data-active-color="success">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}" class="simple-text">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> ToPicnic
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="ti-bag"></i>
                        <p>My picnics</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user/bills') }}">
                        <i class="ti-ticket"></i>
                        <p>My bills</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user/friends') }}">
                        <i class="fa fa-users"></i>
                        <p>My friends</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/picnic/add')}}">
                        <i class="ti-plus"></i>
                        <p>Add picnic</p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ url('/user/invites')}}">
                        <i class="ti-bell"></i>
                        <p>Invitations</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users')}}">
                        <i class="fa fa-user-plus"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user/debtors')}}">
                        <i class="ti-wallet"></i>
                        <p>My debtors</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="{{ url('/picnic/history')}}">
                        <i class="ti-archive"></i>
                        <p>Picnic history</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">My invitations</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <div class="input-group" style="float: left; margin-top: 15px;">
                            <input type="text" placeholder="Search" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p>{{ Auth::user()->nickname }}</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li><a href="#"><i class="ti-settings"></i> Settings</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                @foreach($invitations as $invitation)
                    <div class="row">
                        <div class="col-md-10">
                            <a href="{{ url('/picnic/'.$picnic->id) }}">
                                <div class="card">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <h3 class="title">{{ $picnic->name }}</h3>
                                                <p class="category">{{ $picnic->place }}</p>
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="numbers">
                                                    <a href="{{ url('/picnic/'.$picnic->id.'/members') }}">
                                                        <p><i class="ti-user"></i> Members</p>
                                                        {{ $picnic->membersCount() }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>{{ $picnic->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
@endsection