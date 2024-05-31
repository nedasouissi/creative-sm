@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="modal-teacher" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="teacherModalLabel">Add New Teacher</h3>
                        </div>
                        <input type="hidden" id="teacherId" name="id">
                        <form id="teacherForm" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name">
                                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" id="last_name">
                                                <span class="text-danger">@error('last_name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="teacher_birthdate">Birthdate</label>
                                                <input type="date" class="form-control" name="teacher_birthdate" id="teacher_birthdate">
                                                <span class="text-danger">@error('teacher_birthdate'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="teacher_phone">Phone</label>
                                                <input type="text" class="form-control" name="teacher_phone" id="teacher_phone">
                                                <span class="text-danger">@error('teacher_phone'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject_id">Subject</label>
                                                <select class="form-control" id="subject_id" name="subject_id">
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('subject_id'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="classe_id">Class</label>
                                                <select class="form-control" id="classe_id" name="classe_id">
                                                    @foreach($classes as $classe)
                                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('classe_id'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg mt-4 mb-0">Save</button>
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
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">Teachers List</h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Teachers</h5>
                                                </div>
                                                <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-teacher" onclick="openAddTeacherModal()">+&nbsp; New Teacher</button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthdate</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Classes</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($teachers as $teacher)
                                                        <tr class="{{ $teacher->status ? '' : 'table-inactive' }}">
                                                            <td class="text-center">{{ $teacher->name }}</td>
                                                            <td class="text-center">{{ $teacher->last_name }}</td>
                                                            <td class="text-center">{{ $teacher->teacher_birthdate }}</td>
                                                            <td class="text-center">{{ $teacher->teacher_phone }}</td>
                                                            <td class="text-center">{{ optional($teacher->subject)->name }}</td>
                                                            <td class="text-center">
                                                                @foreach ($teacher->classes as $classe)
                                                                    {{ $classe->name }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-id="{{ $teacher->id }}" {{ $teacher->status ? 'checked' : '' }}>
                                                                </span>
                                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit teacher" onclick="openEditTeacherModal({{ $teacher->id }})">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span onclick="deleteTeacher({{ $teacher->id }})">
                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                </span>
                                                                <form id="delete-teacher-form-{{ $teacher->id }}" action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display: none;">
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
        document.querySelectorAll('.form-check-input').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const teacherId = this.getAttribute('data-id');
                const status = this.checked ? 1 : 0;
                const row = this.closest('tr');

                fetch(`/teacher/${teacherId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ status }),
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                    if (data.success) {
                        if (status) {
                            row.classList.remove('table-inactive');
                        } else {
                            row.classList.add('table-inactive');
                        }
                    } else {
                        alert('Error updating status');
                    }
                }).catch(error => {
                    alert('Error: ' + error.message);
                });
            });
        });

        function deleteTeacher(id) {
            if (confirm('Are you sure you want to delete this teacher?')) {
                document.getElementById('delete-teacher-form-' + id).submit();
            }
        }

        function openAddTeacherModal() {
            $('#teacherModalLabel').text('Add Teacher');
            $('#teacherForm').attr('action', '{{ route('teacher.store') }}');
            $('#teacherForm').trigger("reset");
            $('#teacherId').val('');
            $('#teacherForm').find('input[name="_method"]').remove();
            $('#modal-teacher').modal('show');
        }

        function openEditTeacherModal(id) {
            $.ajax({
                url: '/teacher/' + id,
                method: 'GET',
                success: function(data) {
                    $('#teacherModalLabel').text('Edit Teacher');
                    $('#teacherForm').attr('action', '/teacher/' + id);
                    if (!$('#teacherForm').find('input[name="_method"]').length) {
                        $('#teacherForm').append('<input type="hidden" name="_method" value="PUT">');
                    }
                    $('#teacherId').val(data.id);
                    $('#name').val(data.name);
                    $('#last_name').val(data.last_name);
                    $('#teacher_birthdate').val(data.teacher_birthdate);
                    $('#teacher_phone').val(data.teacher_phone);
                    $('#subject_id').val(data.subject_id);
                    $('#classe_id').val(data.classe_id);
                    $('#modal-teacher').modal('show');
                },
                error: function(xhr) {
                    alert('Failed to fetch teacher details. Please try again.');
                }
            });
        }

        $(document).ready(function() {
            $('#subject_id').select2();
            $('#classe_id').select2();
        });
    </script>
@endsection
