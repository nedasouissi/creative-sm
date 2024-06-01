@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Modal -->
    <div class="modal fade" id="modal-module" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="moduleModalLabel">Add New Module</h3>
                        </div>
                        <input type="hidden" id="moduleId" name="id">
                        <form id="moduleForm" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                                <label for="coefficient">Coefficient</label>
                                                <input type="number" class="form-control" name="coefficient"
                                                    id="coefficient">
                                                <span class="text-danger">
                                                    @error('coefficient')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject_id">Subject</label>
                                                <select class="form-control" id="subject_id" name="subject_id">
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('subject_id')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="grade_id">Grade</label>
                                                <select class="form-control" id="grade_id" name="grade_id">
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
                        <h1 class="text-center mb-20 font-size-20">Modules</h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Modules</h5>
                                                </div>
                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#modal-module" type="button"
                                                    onclick="openAddModuleModal()">+&nbsp; New Module</a>
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
                                                                Coefficient</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Grade</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Subject</th>
                                                            <th
                                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($modules as $module)
                                                            <tr>
                                                                <td class="text-center">{{ $module->name }}</td>
                                                                <td class="text-center">{{ $module->coefficient }}</td>
                                                                <td class="text-center">{{ $module->grade->name }}</td>
                                                                <td class="text-center">
                                                                    {{ $module->subjects->pluck('name')->implode(', ') }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="#" class="mx-3"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit module"
                                                                        onclick="openEditModuleModal({{ $module->id }})">
                                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                                    </a>
                                                                    <span onclick="deleteModule({{ $module->id }})">
                                                                        <i
                                                                            class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                    </span>
                                                                    <form id="delete-module-form-{{ $module->id }}"
                                                                        action="{{ route('modules.destroy', $module->id) }}"
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

    <script>
        function deleteModule(id) {
            if (confirm('Are you sure you want to delete this module?')) {
                document.getElementById('delete-module-form-' + id).submit();
            }
        }

        function openAddModuleModal() {
            $('#moduleModalLabel').text('Add Module');
            $('#moduleForm').attr('action', '{{ route('modules.store') }}');
            $('#moduleForm').trigger("reset");
            $('#moduleId').val('');
            $('#moduleForm').find('input[name="_method"]').remove();
            $('#modal-module').modal('show');
        }

        function openEditModuleModal(id) {
            console.log('Opening edit modal for module ID:', id);
            $.ajax({
                url: '/modules/' + id,
                method: 'GET',
                success: function(data) {
                    console.log('Data fetched successfully:', data);
                    $('#moduleModalLabel').text('Edit Module');
                    $('#moduleForm').attr('action', '/modules/' + id);
                    $('#moduleForm').append('<input type="hidden" name="_method" value="PUT">');
                    $('#moduleId').val(data.id);
                    $('#name').val(data.name);
                    $('#coefficient').val(data.coefficient);
                    $('#grade_id').val(data.grade_id);
                    $('#subject_id').val(data.subject_id);
                    $('#modal-module').modal('show');
                },
                error: function(xhr) {
                    console.error('Error fetching data:', xhr.responseText);
                    alert('Failed to fetch module details. Please try again.');
                }
            });
        }
    </script>
@endsection
