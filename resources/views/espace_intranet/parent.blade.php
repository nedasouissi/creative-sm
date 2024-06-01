@extends('espace_intranet.layouts.app')

@section('intranet_content')
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
                            <input type="hidden" id="student-id" name="id">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for="">Father Name</label>
                                                <input type="text" class="form-control" placeholder="" name="father_name"
                                                    id="father-name">
                                                <span class="text-danger">
                                                    @error('father_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Last name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="father_last_name" id="father-last-name">
                                                <span class="text-danger">
                                                    @error('father_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Job</label>
                                                <input type="text" class="form-control" placeholder="" name="father_job"
                                                    id="father-job">
                                                <span class="text-danger">
                                                    @error('father_job')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Father Phone Number</label>
                                                <input type="number" class="form-control" placeholder=""
                                                    name="father_phone" id="father-phone">
                                                <span class="text-danger">
                                                    @error('father_phone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Parent Email</label>
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
                                                <label for="">Mother Name</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_name"
                                                    id="mother-name">
                                                <span class="text-danger">
                                                    @error('mother_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Last name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="mother_last_name" id="mother-last-name">
                                                <span class="text-danger">
                                                    @error('mother_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Job</label>
                                                <input type="text" class="form-control" placeholder="" name="mother_job"
                                                    id="mother-job">
                                                <span class="text-danger">
                                                    @error('mother_job')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mother Phone Number</label>
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
                                                <label for="">Student Name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="student_name" id="student-name">
                                                <span class="text-danger">
                                                    @error('student_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student Last name</label>
                                                <input type="text" class="form-control" placeholder=""
                                                    name="student_last_name" id="student-last-name">
                                                <span class="text-danger">
                                                    @error('student_last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Student Phone Number</label>
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
                                                <label for="">Student Grade</label>
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
                                                <label for="">Student Birthdate</label>
                                                <input type="date" class="form-control" placeholder=""
                                                    name="birthdate" id="student-birthdate">
                                                <span class="text-danger">
                                                    @error('birthdate')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" class="form-control" id="avatar" name="avatar"
                                                    id="student-avatar">
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


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">
                            Parents List
                        </h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Parents</h5>
                                                </div>
                                                <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#modal-form" type="button">+&nbsp; New
                                                    Parent</button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Name
                                                            </th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Last Name
                                                            </th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Phone
                                                            </th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Email
                                                            </th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Child
                                                            </th>

                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($StudentParents as $StudentParent)
                                                            <tr class="parent-row {{ $StudentParent->status ? '' : 'table-inactive' }}"
                                                                data-id="{{ $StudentParent->id }}">
                                                                <td class="text-center">{{ $StudentParent->father_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $StudentParent->father_last_name }}</td>
                                                                <td class="text-center">{{ $StudentParent->father_phone }}
                                                                </td>
                                                                <td class="text-center">{{ $StudentParent->parent_email }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @foreach ($StudentParent->students as $student)
                                                                        {{ $student->student_name }}
                                                                        {{ $student->student_last_name }}
                                                                        <br>
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            data-id="{{ $StudentParent->id }}"
                                                                            {{ $StudentParent->status ? 'checked' : '' }}>
                                                                    </span>

                                                                    <a href="#" class="mx-3"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-form"
                                                                        onclick="editParent({{ $StudentParent }})"
                                                                        data-bs-original-title="Edit user">
                                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                                    </a>
                                                                    <span>
                                                                        <i class="cursor-pointer fas fa-trash text-secondary"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete user"></i>
                                                                    </span>

                                                            </tr>
                                                        @endforeach
                                                        @foreach ($StudentParents as $StudentParent)
                                                            <tr class="parent-row {{ $StudentParent->status ? '' : 'table-inactive' }}"
                                                                data-id="{{ $StudentParent->id }}">
                                                                <td class="text-center">{{ $StudentParent->mother_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $StudentParent->mother_last_name }}</td>
                                                                <td class="text-center">{{ $StudentParent->mother_phone }}
                                                                </td>
                                                                <td class="text-center">{{ $StudentParent->parent_email }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @foreach ($StudentParent->students as $student)
                                                                        {{ $student->student_name }}
                                                                        {{ $student->student_last_name }}
                                                                        <br>
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            data-id="{{ $StudentParent->id }}"
                                                                            {{ $StudentParent->status ? 'checked' : '' }}>
                                                                    </span>

                                                                    <a href="#" class="mx-3"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-form"
                                                                        onclick="editParent({{ $StudentParent }})"
                                                                        data-bs-original-title="Edit user">
                                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                                    </a>
                                                                    <span
                                                                        onclick="deleteParent({{ $StudentParent->id }})">
                                                                        <i
                                                                            class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                    </span>
                                                                    <form id="delete-parent-form-{{ $StudentParent->id }}"
                                                                        action="{{ route('parent.destroy', $StudentParent->id) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>

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
                const parentId = this.getAttribute('data-id');
                const status = this.checked ? 1 : 0;
                const row = this.closest('tr');

                fetch(`/parent/${parentId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        status
                    }),
                }).then(response => response.json()).then(data => {
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
    </script>
    <script>
        function deleteParent(id) {
            if (confirm('Are you sure you want to delete this parent?')) {
                document.getElementById('delete-parent-form-' + id).submit();
            }
        }

        function editParent(StudentParent) {
            document.getElementById('modal-form').reset(); // Reset the form
            document.getElementById('parent-id').value = StudentParent.id;
            document.getElementById('parent-method').value = 'PATCH';
            document.getElementById('father_name').value = StudentParent.father_name;
            document.getElementById('father_last_name').value = StudentParent.father_last_name;
            document.getElementById('father_job').value = StudentParent.father_job;
            document.getElementById('father_phone').value = StudentParent.father_phone;
            document.getElementById('parent_email').value = StudentParent.parent_email;
            document.getElementById('mother_name').value = StudentParent.mother_name;
            document.getElementById('mother_last_name').value = StudentParent.mother_last_name;
            document.getElementById('mother_job').value = StudentParent.mother_job;
            document.getElementById('mother_phone').value = StudentParent.mother_phone;
            document.getElementById('student_name').value = StudentParent.student.student_name;
            document.getElementById('student_last_name').value = StudentParent.student.student_last_name;
            document.getElementById('student_phone').value = StudentParent.student.student_phone;
            document.getElementById('student_grade').value = StudentParent.student.student_grade;
            document.getElementById('birthdate').value = StudentParent.student.birthdate;
        }

        document.getElementById('parent-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const parentId = formData.get('id');

            let url = form.action;
            if (parentId) {
                url = "/parent/" + parentId;
            }

            fetch(url, {
                    method: formData.get('_method'),
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Parent data saved successfully');
                        location.reload();
                    } else {
                        alert('Error saving parent data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving parent data');
                });
        });
    </script>
@endsection
