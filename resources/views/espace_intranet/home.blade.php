@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header"> {{ __('You are logged in!') }} as {{ $user->role }}</div>



                <div class="card-body">
                    @include('espace_intranet.widgets.news')
                    @include('espace_intranet.widgets.events')
                </div>

            </div>
        </div>
    </div>
@endsection
