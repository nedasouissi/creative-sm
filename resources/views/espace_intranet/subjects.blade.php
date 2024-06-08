@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Modal -->
    <div class="modal fade" id="modal-subject" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="subjectModalLabel">Add New Subject
                            </h3>
                        </div>
                        <input type="hidden" id="subjectId" name="id">
                        <form id="subjectForm" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
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
                                                <label for="module_id">Module</label>
                                                <select class="form-control" id="module_id" name="module_id">
                                                    @foreach ($modules as $module)
                                                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('module_id')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="teacher_id">Teacher</label>
                                                <select class="form-control" id="teacher_id" name="teacher_id">
                                                    <option value="">Select Teacher</option>
                                                    <!-- Empty state option -->
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('teacher_id')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="class_id">Classe</label>
                                                <select class="form-control" id="class_id" name="class_id">
                                                    @foreach ($classes as $classe)
                                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('class_id')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
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

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">Subjects</h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Subjects</h5>
                                                </div>
                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#modal-subject" type="button"
                                                    onclick="openAddSubjectModal()">+&nbsp; New Subject</a>
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
                                                                Module</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Teachers</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Classes</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($subjects as $subject)
                                                            {{-- @dd($subject); --}}
                                                            <tr>
                                                                <td class="text-center">{{ $subject->name }}</td>
                                                                <td class="text-center">{{ $subject->module->name }}</td>
                                                                <td class="text-center">
                                                                    {{ $subject->teacher->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $subject->class->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="#" class="mx-3"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit subject"
                                                                        onclick="openEditSubjectModal({{ $subject->id }})">
                                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                                    </a>
                                                                    <span onclick="deleteSubject({{ $subject->id }})">
                                                                        <i
                                                                            class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                    </span>
                                                                    <form id="delete-subject-form-{{ $subject->id }}"
                                                                        action="{{ route('subjects.destroy', $subject->id) }}"
                                                                        method="POST" style="display: none;">
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function deleteSubject(id) {
            if (confirm('Are you sure you want to delete this subject?')) {
                document.getElementById('delete-subject-form-' + id).submit();
            }
        }

        function openAddSubjectModal() {
            $('#subjectModalLabel').text('Add Subject');
            $('#subjectForm').attr('action', '{{ route('subjects.store') }}');
            $('#subjectForm').trigger("reset");
            $('#subjectId').val('');
            $('#subjectForm').find('input[name="_method"]').remove();
            $('#modal-subject').modal('show');
        }

        function openEditSubjectModal(id) {
            console.log('Opening edit modal for subject ID:', id);
            $.ajax({
                url: '/subjects/' + id,
                method: 'GET',
                success: function(data) {
                    console.log('Data fetched successfully:', data);
                    $('#subjectModalLabel').text('Edit Subject');
                    $('#subjectForm').attr('action', '/subjects/' + id);
                    $('#subjectForm').append('<input type="hidden" name="_method" value="PUT">');
                    $('#subjectId').val(data.id);
                    $('#name').val(data.name);
                    $('#module_id').val(data.module_id);
                    $('#teacher_id').val(data.teacher_id);
                    $('#modal-subject').modal('show');
                },
                error: function(xhr) {
                    console.error('Error fetching data:', xhr.responseText);
                    alert('Failed to fetch subject details. Please try again.');
                }
            });
        }
    </script>
@endsection
