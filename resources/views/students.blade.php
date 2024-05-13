@extends('layouts.app')

@section('content')
    {{-- modal start here  --}}

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Add New Parent</h3>
                        </div>
                        <form action="{{ action('Dashboard\StudentController@store')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for="">Father Name</label>
                                                <input type="text" class="form-control" placeholder="" name="father_name">
                                                <span class="text-danger">@error('father_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="father_last_name">
                                                <span class="text-danger">@error('father_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Job</label>
                                                <input type="text" class="form-control" placeholder="" name="father_job">
                                                <span class="text-danger">@error('father_job'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="father_phone">
                                                <span class="text-danger">@error('father_phone'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Parent Email</label>
                                                <input type="email" class="form-control" placeholder="" name="parent_email">
                                                <span class="text-danger">@error('parent_email'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Mother's Information -->
                                            <div class="form-group">
                                                <label for="">Mother Name</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_name">
                                                <span class="text-danger">@error('mother_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_last_name">
                                                <span class="text-danger">@error('mother_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Job</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_job">
                                                <span class="text-danger">@error('mother_job'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="mother_phone">
                                                <span class="text-danger">@error('mother_phone'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Student's Information -->
                                            <div class="form-group">
                                                <label for="">Student Name</label>
                                                <input type="text" class="form-control" placeholder="" name="student_name">
                                                <span class="text-danger">@error('student_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="student_last_name">
                                                <span class="text-danger">@error('student_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="student_phone">
                                                <span class="text-danger">@error('student_phone'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Student Grade</label>
                                                <select class="form-control" name="student_grade">
                                                    <option value="" selected>Select grade</option>
                                                    <option value="seven">7th grade</option>
                                                    <option value="eight">8th grade</option>
                                                    <option value="nine">9th grade</option>
                                                </select>
                                                <span class="text-danger">@error('student_grade'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student Birthdate</label>
                                                <input type="date" class="form-control" placeholder="" name="birthdate">
                                                <span class="text-danger">@error('birthdate'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" class="form-control" id="avatar" name="avatar">
                                                <span class="text-danger">@error('avatar'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg  mt-4 mb-0" >ADD</button>
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content" background-color= "blue">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                            Students List
                        </h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Students</h5>
                                                </div>
                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-form" type="button">+&nbsp; New Student</a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Avatar
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Name
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Last Name
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Grade
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Phone
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Birthdate
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($students as $student)
                                                        <tr>

                                                            <td class="text-center">                                                                <div>
                                                                    <img src="{{ asset('storage/avatars/' . $student->avatar) }}" class="avatar avatar-sm me-3">
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">{{ $student->student_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">{{ $student->student_last_name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">{{ $student->student_grade }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">{{ $student->student_phone }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">{{ $student->birthdate }}</span>
                                                            </td>

                                                            <td class="text-center">
                                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <br>
@endsection
