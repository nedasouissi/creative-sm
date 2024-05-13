@extends('layouts.app')

@section('content')
    {{-- modal start here  --}}

    <div class="modal fade" id="modal-teacher" tabindex="-1" role="dialog" aria-labelledby="modal-form"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Add New Parent</h3>
                        </div>
                        <form action="{{ action('Dashboard\TeacherController@store')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for=""> Name</label>
                                                <input type="text" class="form-control" placeholder=""name="name">
                                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="last_name" >
                                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Subjects</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('subject_id'){{ $message }}@enderror</span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="teacher_phone">
                                                <span class="text-danger">@error('teacher_phone'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Birthdate</label>
                                                <input type="date" class="form-control" placeholder="" name="teacher_birthdate" >
                                                <span class="text-danger">@error('teacher_birthdate'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">classes</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    @foreach($classes as $classe)
                                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('classe_id'){{ $message }}@enderror</span>

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
            <section class="content" background-color="blue">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                            Teachers List
                        </h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Teachers</h5>
                                                </div>


                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-teacher" type="button">+&nbsp; New Teacher</a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>

                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Name
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Last Name
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                           Birthdate
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Phone
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($teachers as $teacher)
                                                        <tr>
                                                            <td class="text-center">{{ $teacher->name }}</td>
                                                            <td class="text-center">{{ $teacher->last_name }}</td>
                                                            <td class="text-center">{{ $teacher->teacher_birthdate }}</td>
                                                            <td class="text-center">{{ $teacher->teacher_phone }}</td>

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
            </section>
        </div>
    </div>
@endsection
