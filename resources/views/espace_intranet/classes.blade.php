@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Modal -->
    <div class="modal fade" id="modal-classe" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="classeModalLabel">Add New Class</h3>
                        </div>
                        <input type="hidden" id="classeId" name="id">
                        <form id="classeForm" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="grade_id">Grade</label>

                                        <select class="form-control" id="grade_id" name="grade_id"
                                            data-placeholder="Choose one thing">
                                            <option></option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('grade_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    @php
                                        // dd($teachers);
                                    @endphp
                                    <div class="form-group">
                                        <label for="teacher_ids">Teachers</label>
                                        <select class="form-select" id="multiple-select-field-1" name="teacher_ids[]"
                                            data-placeholder="Choose anything" multiple>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">
                                                    {{ $teacher->name }}&nbsp;{{ $teacher->last_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('teacher_ids')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_ids">Students</label>
                                        {{-- @dd($students); --}}
                                        <select class="form-select" id="multiple-select-field-2" name="student_ids[]"
                                            data-placeholder="Choose anything" multiple>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">
                                                    {{ $student->name }}&nbsp;{{ $student->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('student_ids')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-round bg-gradient-info btn-lg mt-4 mb-0">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal  --}}
    <!-- Styles -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#multiple-select-field-1').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
    <script>
        $('#multiple-select-field-2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content" background-color= "blue">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                            Classes List
                        </h1>
                        <div class="card mb-4 mx-4">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">All Classes</h5>
                                    </div>

                                    <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                                        data-bs-target="#modal-classe" type="button">+&nbsp; New Class</a>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Grade</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Teachers</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Students
                                                </th>
                                            </tr>
                                        </thead>
                                        <!-- Modal -->

                                        <tbody>
                                            @foreach ($classes as $classe)
                                                <tr>
                                                    <td class="text-center">{{ $classe->name }}</td>
                                                    <td class="text-center">{{ $classe->grade->name }}</td>
                                                    <td class="text-center">
                                                        <a href="#" data-bs-toggle="modal-{{ $classe->id }}"
                                                            data-bs-target="#modal-classe-{{ $classe->id }}"
                                                            onclick="openEditteachersModal({{ $classe->id }})"
                                                            type="button"><i class="fa fa-eye "></i> </a>

                                                    </td>

                                                    <td class="text-center">
                                                        @if ($classe->students->count() > 0)
                                                            <a href="#" data-bs-toggle="modal-{{ $classe->id }}"
                                                                data-bs-target="#modal-classe-student-{{ $classe->id }}"
                                                                onclick="openEditstudentsModal({{ $classe->id }})"
                                                                type="button"><i class="fa fa-eye "></i> </a>
                                                        @endif

                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit classe"
                                                            onclick="openEditteachersModal({{ $classe->id }})">
                                                            <i class="fas fa-user-edit text-secondary"></i>
                                                        </a>
                                                        <span onclick="deleteClass({{ $classe->id }})">
                                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                        </span>
                                                        <form id="delete-class-form-{{ $classe->id }}"
                                                            action="{{ route('classes.destroy', $classe->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="modal-classe-{{ $classe->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="modal-form"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3 class="font-weight-bolder text-info text-gradient"
                                                                            id="classeModalLabel">Teachers</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @foreach ($classe->teachers as $teacher)
                                                                            <ul id="teacherList-{{ $classe->id }}">
                                                                                {{ $teacher->name }}&nbsp;{{ $teacher->last_name }}
                                                                                <br>
                                                                                {{ $teacher->email }}
                                                                            </ul>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal-classe-student-{{ $classe->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="modal-form"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3 class="font-weight-bolder text-info text-gradient"
                                                                            id="classeModalLabel">Class Students</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @if ($classe->students->count() > 0)
                                                                            {{-- @dd($classe->students); --}}
                                                                            @foreach ($classe->students as $student)
                                                                                <ul id="teacherList-{{ $classe->id }}">
                                                                                    {{ $student->name }}&nbsp;{{ $student->last_name }}
                                                                                    <br>
                                                                                    {{ $student->email }}
                                                                                </ul>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>


                                        <script>
                                            function openEditteachersModal(classId) {
                                                $('#modal-classe-' + classId).modal('show');

                                            }

                                            function openEditstudentsModal(classId) {
                                                $('#modal-classe-student-' + classId).modal('show');

                                            }

                                            function deleteClass(id) {
                                                if (confirm('Are you sure you want to delete this class?')) {
                                                    document.getElementById('delete-class-form-' + id).submit();
                                                }
                                            }



                                            function openAddClasseModal() {
                                                $('#classeModalLabel').text('Add Class');
                                                $('#classeForm').attr('action', '{{ route('classes.store') }}');
                                                $('#classeForm').trigger("reset");
                                                $('#classeId').val('');
                                                $('#classeForm').find('input[name="_method"]').remove();
                                                $('#modal-classe').modal('show');
                                            }

                                            function openEditClasseModal(id) {
                                                console.log('Opening edit modal for class ID:', id);
                                                $.ajax({
                                                    url: '/classes/' + id,
                                                    method: 'GET',
                                                    success: function(data) {
                                                        console.log('Data fetched successfully:', data);
                                                        $('#classeModalLabel').text('Edit Class');
                                                        $('#classeForm').attr('action', '/classes/' + id);
                                                        $('#classeForm').append('<input type="hidden" name="_method" value="PUT">');
                                                        $('#classeId').val(data.id);
                                                        $('#name').val(data.name);
                                                        $('#grade_id').val(data.grade_id);
                                                        $('#teacher_id').val(data.teacher_id);
                                                        $('#modal-classe').modal('show');
                                                    },
                                                    error: function(xhr) {
                                                        console.error('Error fetching data:', xhr.responseText);
                                                        alert('Failed to fetch class details. Please try again.');
                                                    }
                                                });
                                            }

                                            // $(document).ready(function() {
                                            //     $('#grade_id').select2();
                                            //     $('#multiple-select-field').select2();
                                            // });
                                        </script>
                                    @endsection
