@extends('layouts.app')

@section('content')
    {{-- modal start here  --}}
    <div class="modal fade" id="modal-student" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="studentModalLabel">Add New Student</h3>
                        </div>
                        <input type="hidden" id="studentId" name="id">
                        <form id="studentForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" class="form-control" placeholder="" name="father_name" id="father_name">
                                                <span class="text-danger">@error('father_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father_last_name">Father Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="father_last_name" id="father_last_name" >
                                                <span class="text-danger">@error('father_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father_job">Father Job</label>
                                                <input type="text" class="form-control" placeholder="" name="father_job" id="father_job">
                                                <span class="text-danger">@error('father_job'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="father_phone">Father Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="father_phone" id="father_phone">
                                                <span class="text-danger">@error('father_phone'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="parent_email">Parent Email</label>
                                                <input type="email" class="form-control" placeholder="" name="parent_email" id="parent_email">
                                                <span class="text-danger">@error('parent_email'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Mother's Information -->
                                            <div class="form-group">
                                                <label for="mother_name">Mother Name</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_name" id="mother_name">
                                                <span class="text-danger">@error('mother_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother_last_name">Mother Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_last_name" id="mother_last_name">
                                                <span class="text-danger">@error('mother_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother_job">Mother Job</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_job" id="mother_job">
                                                <span class="text-danger">@error('mother_job'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="mother_phone">Mother Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="mother_phone" id="mother_phone">
                                                <span class="text-danger">@error('mother_phone'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Student's Information -->
                                            <div class="form-group">
                                                <label for="student_name">Student Name</label>
                                                <input type="text" class="form-control" placeholder="" name="student_name" id="student_name">
                                                <span class="text-danger">@error('student_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student_last_name">Student Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="student_last_name" id="student_last_name">
                                                <span class="text-danger">@error('student_last_name'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="student_phone">Student Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="student_phone" id="student_phone">
                                                <span class="text-danger">@error('student_phone'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="student_grade">Student Grade</label>
                                                <select class="form-control" name="student_grade" id="student_grade">
                                                    <option value="" selected>Select grade</option>
                                                    <option value="seven">7th grade</option>
                                                    <option value="eight">8th grade</option>
                                                    <option value="nine">9th grade</option>
                                                </select>
                                                <span class="text-danger">@error('student_grade'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="birthdate">Student Birthdate</label>
                                                <input type="date" class="form-control" placeholder="" name="birthdate" id="birthdate">
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
                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg mt-4 mb-0">SAVE</button>
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

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content" >
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">
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
                                                <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-student" onclick="openAddModal()">+&nbsp; New Student</button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Avatar</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthdate</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($students as $student)
                                                        <tr class="{{ $student->studentParent->status ? '' : 'table-inactive' }}">
                                                            <td class="text-center">
                                                                <img src="{{ $student->avatar_url }}" alt="{{ $student->student_name }}'s Avatar" class="avatar avatar-sm me-3">
                                                            </td>
                                                            <td class="text-center">{{ $student->student_name }}</td>
                                                            <td class="text-center">{{ $student->student_last_name }}</td>
                                                            <td class="text-center">{{ $student->student_grade }}</td>
                                                            <td class="text-center">{{ $student->student_phone }}</td>
                                                            <td class="text-center">{{ $student->birthdate }}</td>
                                                            <td class="text-center">
                                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit student" onclick="openEditModal({{ $student->id }})">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span onclick="deleteStudent({{ $student->id }})">
                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                </span>
                                                                <form id="delete-student-form-{{ $student->id }}" action="{{ route('student.destroy', $student->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
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
            </section>
        </div>
    </div>

    <script>
        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                document.getElementById('delete-student-form-' + id).submit();
            }
        }

        function openAddModal() {
            $('#studentModalLabel').text('Add Student');
            $('#studentForm').attr('action', '/student');
            $('#studentForm').trigger("reset");
            $('#studentId').val('');
            $('#studentForm').find('input[name="_method"]').remove();
            $('#modal-student').modal('show');
        }
        function openEditModal(id) {
            $.ajax({
                url: '/student/' + id,
                method: 'GET',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    $('#studentModalLabel').text('Edit Student');
                    $('#studentForm').attr('action', '/student/' + id);
                    if (!$('#studentForm').find('input[name="_method"]').length) {
                        $('#studentForm').append('<input type="hidden" name="_method" value="PUT">');
                    }
                    $('#studentId').val(data.id);
                    $('#father_name').val(data.studentParent.father_name || '');
                    $('#father_last_name').val(data.studentParent.father_last_name || '');
                    $('#father_phone').val(data.studentParent.father_phone || '');
                    $('#father_job').val(data.studentParent.father_job || '');
                    $('#mother_name').val(data.studentParent.mother_name || '');
                    $('#mother_last_name').val(data.studentParent.mother_last_name || '');
                    $('#mother_phone').val(data.studentParent.mother_phone || '');
                    $('#mother_job').val(data.studentParent.mother_job || '');
                    $('#parent_email').val(data.studentParent.parent_email || '');
                    $('#student_name').val(data.student_name || '');
                    $('#student_last_name').val(data.student_last_name || '');
                    $('#student_phone').val(data.student_phone || '');
                    $('#student_grade').val(data.student_grade || '');
                    $('#birthdate').val(data.birthdate || '');
                    $('#modal-student').modal('show');
                },
                error: function(xhr) {
                    alert('Failed to fetch student details. Please try again.');
                }
            });
        }


    </script>
@endsection
