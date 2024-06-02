@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content" background-color= "blue">
                <div class="row ">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                            ESPACE ADMINISTRATEUR
                        </h1>
                        <div class="mt-5">
                            <div class="row ">
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Parents
                                                            Enrolled </p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{ $parentCount }} --}}

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-money-coins text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Students
                                                            Enrolled</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{ $studentCount }}  --}}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Teachers
                                                        </p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{
                                                             $teacherCount
                                                            }} --}}

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-paper-diploma text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="row ">
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total
                                                            Modules </p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{ $modulesCount }} --}}

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-money-coins text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total
                                                            Subjects</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{ $subjectsCount }} </h5> --}}
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total
                                                            Classes</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            {{-- {{ $classesCount }} --}}

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-paper-diploma text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <br>
        </div>

    </div>

    </div>
@endsection
