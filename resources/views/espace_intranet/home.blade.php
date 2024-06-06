@extends('espace_intranet.layouts.app')

@section('intranet_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} as {{ $user->role }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
