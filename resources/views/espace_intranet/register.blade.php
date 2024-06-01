@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('back_office_theme/assets/img/curved-images/curved14.jpg') }}">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Use these awesome forms to login or create new account in your
                            project for free.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Teacher</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Parent</button>
                                    </li>

                                </ul>

                            </div>
                            <h5>Register with</h5>
                        </div>
                        {{-- teacher register --}}
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="card-body">
                                    <form action="{{ route('register.teacher') }}" method="POST" role="form text-left">
                                        @csrf
                                        <input type="hidden" name="role" value="teacher">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" placeholder="Name"
                                                aria-label="Name" aria-describedby="name-addon" required>
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="cin" placeholder="CIN"
                                                aria-label="CIN" aria-describedby="cin-addon" required>
                                            @error('cin')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name" aria-label="Last Name"
                                                aria-describedby="last_name-addon" required>
                                            @error('last_name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="birthdate"
                                                placeholder="Birthdate" aria-label="Birthdate"
                                                aria-describedby="birthdate-addon" required>
                                            @error('birthdate')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                aria-label="Email" aria-describedby="email-addon" required>
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" required>
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password" aria-label="Password Confirmation"
                                                aria-describedby="password_confirmation-addon" required>
                                            @error('password_confirmation')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                                up</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">Already have an account? <a
                                                href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign
                                                in</a></p>
                                    </form>
                                </div>
                            </div>
                            {{-- parent register --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h3 class="mt-5">Build Your Profile</h3>
                                        <h5 class="text-secondary font-weight-normal">This information will let us know
                                            more
                                            about you.</h5>
                                        <div class="multisteps-form mb-5">
                                            <!--progress bar-->
                                            <div class="row">
                                                <div class="col-12 col-lg-8 mx-auto my-5">
                                                    <div class="multisteps-form__progress">
                                                        <button class="multisteps-form__progress-btn js-active"
                                                            type="button" title="User Info">
                                                            <span>Parents information</span>
                                                        </button>
                                                        <button class="multisteps-form__progress-btn" type="button"
                                                            title="Address">
                                                            <span>Student information</span>
                                                        </button>
                                                        <button class="multisteps-form__progress-btn" type="button"
                                                            title="Order Info">
                                                            <span>Credentials</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--form panels-->
                                            <div class="row">
                                                <div class="col-12 col-lg-8 m-auto">
                                                    <form class="multisteps-form__form" style="height: 463px;">
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">parent information</h5>
                                                                    <p>parent text
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row mt-3">
                                                                    {{-- parentinfo content --}}
                                                                    <div class="col-md-6">
                                                                        <!-- Father's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Father Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="" wire:model="father_name">
                                                                            <span class="text-danger">
                                                                                @error('father_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Last name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="father_last_name">
                                                                            <span class="text-danger">
                                                                                @error('father_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Job</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="" wire:model="father_job">
                                                                            <span class="text-danger">
                                                                                @error('father_job')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder="" wire:model="father_phone">
                                                                            <span class="text-danger">
                                                                                @error('father_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Mother's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Mother Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="" wire:model="mother_name">
                                                                            <span class="text-danger">
                                                                                @error('mother_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Last name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="mother_last_name">
                                                                            <span class="text-danger">
                                                                                @error('mother_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Job</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="" wire:model="mother_job">
                                                                            <span class="text-danger">
                                                                                @error('mother_job')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder="" wire:model="mother_phone">
                                                                            <span class="text-danger">
                                                                                @error('mother_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-row d-flex mt-4">
                                                                    <button
                                                                        class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                        type="button" title="Next">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">student info</h5>
                                                                    <p>student info text</p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row mt-4">
                                                                    {{-- student info content --}}
                                                                    <div class="col-md-6">
                                                                        <!-- Student's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Student Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="" wire:model="student_name">
                                                                            <span class="text-danger">
                                                                                @error('student_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Student Last name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="student_last_name">
                                                                            <span class="text-danger">
                                                                                @error('student_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Student Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder="" wire:model="student_phone">
                                                                            <span class="text-danger">
                                                                                @error('student_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Student Grade</label>
                                                                            <select class="form-control"
                                                                                wire:model="student_grade">
                                                                                <option value="" selected>Select
                                                                                    grade</option>
                                                                                <option value="seven">7th grade</option>
                                                                                <option value="eight">8th grade</option>
                                                                                <option value="nine">9th grade</option>
                                                                            </select>
                                                                            <span class="text-danger">
                                                                                @error('student grade')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Student Birthdate</label>
                                                                            <input type="date" class="form-control"
                                                                                placeholder="" wire:model="birthdate">
                                                                            <span class="text-danger">
                                                                                @error('birthdate')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>



                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="avatar"> Avatar</label>
                                                                            <input type="file"
                                                                                class="form-control-file" id="avatar"
                                                                                wire:model="avatar">
                                                                            <span class="text-danger">
                                                                                @error('avatar')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-row d-flex mt-4">
                                                                    <button class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                        type="button" title="Prev">Prev</button>
                                                                    <button
                                                                        class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                        type="button" title="Next">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">credentials</h5>
                                                                    <p>credentials text</p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row text-start">
                                                                    {{-- credentials --}}
                                                                    <div class="col-md-12">
                                                                        <!-- auth -->
                                                                        <div class="form-group">
                                                                            <label for="">Parent Email</label>
                                                                            <input type="email" class="form-control"
                                                                                placeholder="" wire:model="parent_email">
                                                                            <span class="text-danger">
                                                                                @error('parent_email')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Password</label>
                                                                            <input type="password" class="form-control"
                                                                                placeholder="" wire:model="password">
                                                                            <span class="text-danger">
                                                                                @error('password')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="passwordConfirmation">Confirm
                                                                                Password</label>
                                                                            <input type="password" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="passwordConfirmation">
                                                                            <span class="text-danger">
                                                                                @error('passwordConfirmation')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="button-row d-flex mt-4 col-12">
                                                                        <button
                                                                            class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                            type="button" title="Prev">Prev</button>
                                                                        <button class="btn bg-gradient-dark ms-auto mb-0"
                                                                            type="button" title="Send">Send</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body">
                                    <form role="form text-left">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                                aria-describedby="email-addon">
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email"
                                                aria-label="Email" aria-describedby="email-addon">
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                                up</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;"
                                                class="text-dark font-weight-bolder">Sign in</a></p>
                                    </form>
                                </div> --}}
                        </div>

                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
