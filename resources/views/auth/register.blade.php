@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('Father Name') }}</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name" autofocus>

                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_last_name" class="col-md-4 col-form-label text-md-right">{{ __('Father Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="father_last_name" type="text" class="form-control @error('father_last_name') is-invalid @enderror" name="father_last_name" value="{{ old('father_last_name') }}" required autocomplete="father_last_name" autofocus>

                                @error('father_last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_job" class="col-md-4 col-form-label text-md-right">{{ __('Father Job') }}</label>

                            <div class="col-md-6">
                                <input id="father_job" type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" value="{{ old('father_job') }}" required autocomplete="father_job" autofocus>

                                @error('father_job')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_phone" class="col-md-4 col-form-label text-md-right">{{ __('Father Phone') }}</label>

                            <div class="col-md-6">
                                <input id="father_phone" type="text" class="form-control @error('father_phone') is-invalid @enderror" name="father_phone" value="{{ old('father_phone') }}" required autocomplete="father_phone" autofocus>

                                @error('father_phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __('Mother Name') }}</label>

                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required autocomplete="mother_name" autofocus>

                                @error('mother_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_last_name" class="col-md-4 col-form-label text-md-right">{{ __('Mother Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="mother_last_name" type="text" class="form-control @error('mother_last_name') is-invalid @enderror" name="mother_last_name" value="{{ old('mother_last_name') }}" required autocomplete="mother_last_name" autofocus>

                                @error('mother_last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_job" class="col-md-4 col-form-label text-md-right">{{ __('Mother Job') }}</label>

                            <div class="col-md-6">
                                <input id="mother_job" type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" value="{{ old('mother_job') }}" required autocomplete="mother_job" autofocus>

                                @error('mother_job')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_phone" class="col-md-4 col-form-label text-md-right">{{ __('Mother Phone') }}</label>

                            <div class="col-md-6">
                                <input id="mother_phone" type="text" class="form-control @error('mother_phone') is-invalid @enderror" name="mother_phone" value="{{ old('mother_phone') }}" required autocomplete="mother_phone" autofocus>

                                @error('mother_phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="parent_email" type="email" class="form-control @error('parent_email') is-invalid @enderror" name="parent_email" value="{{ old('parent_email') }}" required autocomplete="parent_email">

                                @error('parent_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
