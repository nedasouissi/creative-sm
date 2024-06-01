@extends('espace_intranet.layouts.general_structure')

@section('intranet_appcontent')
    @include('espace_intranet.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ps ps--active-y">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                            {{ str_replace('-', ' ', Request::path()) }}</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end"
                    id="navbar">
                    <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center" style="margin-left: 15px;">
                            <a href="{{ url('/profile') }}" class="nav-link text-body p-0">
                                <i class="fa fa-user me-sm-1"></i>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center" style="margin-left: 15px;">
                            <a href="{{ url('/login') }}" class="nav-link text-body font-weight-bold px-0">
                                <span class="d-sm-inline d-none">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('intranet_content')
    </main>
@endsection
