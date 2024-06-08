@extends('espace_intranet.layouts.general_structure')

@section('intranet_appcontent')
    @php
        $user = Auth::user();
    @endphp
    {{-- modal start here  --}}
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="modal-title">Add New Student</h3>
                        </div>
                        <form id="student-form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="student-id" name="id"> <!-- Updated ID -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for="father-name">Father Name</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder="" name="father_name"
                                                    id="father-name">
                                                <span class="text-danger">
                                                    @error('father_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father-last-name">Father Last name</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder=""
                                                    name="father_last_name" id="father-last-name">
                                                <span class="text-danger">
                                                    @error('father_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father-job">Father Job</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder="" name="father_job"
                                                    id="father-job">
                                                <span class="text-danger">
                                                    @error('father_job')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father-phone">Father Phone Number</label> <!-- Updated ID -->
                                                <input type="number" class="form-control" placeholder=""
                                                    name="father_phone" id="father-phone">
                                                <span class="text-danger">
                                                    @error('father_phone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="parent-email">Parent Email</label> <!-- Updated ID -->
                                                <input type="email" class="form-control" placeholder=""
                                                    name="parent_email" id="parent-email">
                                                <span class="text-danger">
                                                    @error('parent_email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Mother's Information -->
                                            <div class="form-group">
                                                <label for="mother-name">Mother Name</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder="" name="mother_name"
                                                    id="mother-name">
                                                <span class="text-danger">
                                                    @error('mother_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother-last-name">Mother Last name</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder=""
                                                    name="mother_last_name" id="mother-last-name">
                                                <span class="text-danger">
                                                    @error('mother_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother-job">Mother Job</label> <!-- Updated ID -->
                                                <input type="text" class="form-control" placeholder="" name="mother_job"
                                                    id="mother-job">
                                                <span class="text-danger">
                                                    @error('mother_job')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother-phone">Mother Phone Number</label> <!-- Updated ID -->
                                                <input type="number" class="form-control" placeholder=""
                                                    name="mother_phone" id="mother-phone">
                                                <span class="text-danger">
                                                    @error('mother_phone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Student's Information -->
                                            <div class="form-group">
                                                <label for="student-name">Student Name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="student_name" id="student-name">
                                                <span class="text-danger">
                                                    @error('student_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student-last-name">Student Last name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="student_last_name" id="student-last-name">
                                                <span class="text-danger">
                                                    @error('student_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student-phone">Student Phone Number</label>
                                                <input type="number" class="form-control" placeholder=""
                                                    name="student_phone" id="student-phone">
                                                <span class="text-danger">
                                                    @error('student_phone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="student-grade">Student Grade</label>
                                                <select class="form-control" name="student_grade" id="student-grade">
                                                    <option value="" selected>Select grade</option>
                                                    <option value="seven">7th grade</option>
                                                    <option value="eight">8th grade</option>
                                                    <option value="nine">9th grade</option>
                                                </select>
                                                <span class="text-danger">
                                                    @error('student_grade')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student-birthdate">Student Birthdate</label>
                                                <input type="date" class="form-control" placeholder=""
                                                    name="birthdate" id="student-birthdate">
                                                <span class="text-danger">
                                                    @error('birthdate')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student-avatar">Avatar</label>
                                                <input type="file" class="form-control" id="student-avatar"
                                                    name="avatar">
                                                <span class="text-danger">
                                                    @error('avatar')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-round bg-gradient-info btn-lg mt-4 mb-0">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal end here  --}}

    @include('espace_intranet.sidebar', ['user' => $user])
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                            <h6 class="font-weight-bolder mb-0 text-capitalize">
                                {{ str_replace('-', ' ', Request::path()) }}
                            </h6>
                        </li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">


                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('back_office_theme/assets/img/team-2.jpg') }}"
                                                    class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('back_office_theme/assets/img/small-logos/logo-spotify.svg') }}"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                @yield('intranet_content')
            </div>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-user py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Profile</h5>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            @auth
                <div class="mt-3 mb-0 float-start d-flex">
                    <div class="">
                        <img src="{{ Storage::url(@$user->avatar) }}" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class=" d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ @$user->name }} &nbsp; {{ @$user->last_name }}</h6>
                    </div>
                </div>
                <div class="mt-3 mb-0 float-start">
                    <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-sign-out"></i>
                        <span class="d-sm-inline d-none">Logout</span>
                    </a>
                </div>
                <div>


                    @if (@$user->role == 'teacher')
                        @php
                            $teacherData = \App\Models\User::find(@$user->id);
                        @endphp

                        <div class="card-body">
                            <div class="row">
                                <div class="mt-3 mb-0 col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="mt-3 mb-0 col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-placement="top"
                                            title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-3 mb-0">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Full
                                        Name:</strong>
                                    &nbsp; {{ $teacherData->name }} {{ $teacherData->last_name }}</li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Email:</strong>
                                    &nbsp; {{ $teacherData->email }}</li>
                                <!-- Add more teacher details as needed -->
                            </div>
                        </div>
                    @elseif (@$user->role == 'parent')
                        @php
                            $studentData = \App\Models\Student::where('user_id', @$user->id)->first();
                            // @dd($studentData)
                        @endphp
                        @if (@$studentData)
                            <div class="card-body">
                                <div class="row">
                                    <div class="mt-3 mb-0 col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class=" mt-3 mb-0 col-md-4 text-end">
                                        <a href="javascript:;">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-form"
                                                onclick="editParent(@json($studentData))" data-bs-placement="top"
                                                title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Father
                                            Name:</strong>
                                        &nbsp; {{ $studentData->father_name }} {{ $studentData->father_last_name }}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Father
                                            Job:</strong>
                                        &nbsp; {{ $studentData->father_job }} </li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Father
                                            Phone:</strong>
                                        &nbsp; {{ @$studentData->father_phone }} </li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Mother
                                            Name:</strong>
                                        &nbsp; {{ @$studentData->mother_name }} {{ @$studentData->mother_last_name }}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Mother
                                            Job:</strong>
                                        &nbsp; {{ $studentData->mother_job }} </li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Mother
                                            Phone:</strong>
                                        &nbsp; {{ $studentData->mother_phone }} </li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Parent
                                            Email:</strong>
                                        &nbsp; {{ $studentData->email }}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Student
                                            Grade:</strong>
                                        &nbsp; {{ $studentData->student_grade }}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark"> Student
                                            Phone:</strong>
                                        &nbsp; {{ $studentData->student_phone }} </li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Student
                                            Birthdate:</strong>
                                        &nbsp; {{ $studentData->student_birthdate }} </li>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>



            @endauth
        </div>
    </div>
    <script>
        function editParent(StudentParent) {
            console.log(StudentParent);
            document.getElementById('student-form').reset(); // Reset the form
            document.getElementById('student-id').value = StudentParent.id; // Corrected ID
            document.getElementById('parent-method').value = 'PATCH'; // Set method to PATCH
            // Corrected input element IDs
            document.getElementById('father-name').value = StudentParent.father_name;
            document.getElementById('father-last-name').value = StudentParent.father_last_name;
            document.getElementById('father-job').value = StudentParent.father_job;
            document.getElementById('father-phone').value = StudentParent.father_phone;
            document.getElementById('parent-email').value = StudentParent.parent_email;
            document.getElementById('mother-name').value = StudentParent.mother_name;
            document.getElementById('mother-last-name').value = StudentParent.mother_last_name;
            document.getElementById('mother-job').value = StudentParent.mother_job;
            document.getElementById('mother-phone').value = StudentParent.mother_phone;
            document.getElementById('student-name').value = StudentParent.student.student_name;
            document.getElementById('student-last-name').value = StudentParent.student.student_last_name;
            document.getElementById('student-phone').value = StudentParent.student.student_phone;
            document.getElementById('student-grade').value = StudentParent.student.student_grade;
            document.getElementById('student-birthdate').value = StudentParent.student.birthdate;
        }
        // document.getElementById('parent-form').addEventListener('submit', function(event) {
        //     event.preventDefault();

        //     const form = event.target;
        //     const formData = new FormData(form);
        //     const parentId = formData.get('id');

        //     let url = form.action;
        //     if (parentId) {
        //         url = "/parent/" + parentId;
        //     }

        //     fetch(url, {
        //             method: formData.get('_method'),
        //             body: formData,
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //             },
        //         })
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Parent data saved successfully');
        //                 location.reload();
        //             } else {
        //                 alert('Error saving parent data');
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Error saving parent data');
        //         });
        // });
    </script>
@endsection
