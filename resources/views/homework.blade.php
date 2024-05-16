@extends('layouts.app')

@section('content')
    {{-- modal start here  --}}

    <div class="modal fade" id="modal-teacher" tabindex="-1" role="dialog" aria-labelledby="modal-form"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Add New Homework</h3>
                        </div>
                        <form action="{{ action('Dashboard\HomeworkController@store')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for=""> Title</label>
                                                <input type="text" class="form-control" placeholder=""name="title">
                                                <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Content</label>
                                                <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
                                                <span class="text-danger">@error('content'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label for=""> Deadline</label>
                                                <input type="date" class="form-control" placeholder="" name="deadline" >
                                                <span class="text-danger">@error('deadline'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">classes</label>
                                                <select class="form-control" id="classe_id" name="classe_id">
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
            <section class="content" background-color= "blue">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                          Homework
                        </h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Homework</h5>
                                                </div>


                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-teacher" type="button">+&nbsp; New Homework</a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>

                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Title
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Content
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                           Deadline
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Classes
                                                        </th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($homework as $Homework)
                                                        <tr>
                                                            <td class="text-center">{{ $Homework->title }}</td>
                                                            <td class="text-center">{{ $Homework->content }}</td>
                                                            <td class="text-center">{{ $Homework->deadline }}</td>
                                                            <td class="text-center">
                                                                @foreach ($Homework->classes as $Classe)
                                                                    {{ $Classe->name }}
                                                                    <br>
                                                                @endforeach
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
