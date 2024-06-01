@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Modal -->
    <div class="modal fade" id="modal-grade" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="gradeModalLabel">Add New Grade</h3>
                        </div>
                        <input type="hidden" id="gradeId" name="id">
                        <form id="gradeForm" method="POST">
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
                                        <label for="classe_id">Classe</label>
                                        <select class="form-control" id="classe_id" name="classe_id">
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('classe_id')
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

    <!-- End of Modal -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content" background-color= "blue">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20 ">
                            Grades
                        </h1>
                        <div class="card mb-4 mx-4">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">All Grades</h5>
                                    </div>

                                    <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                                        data-bs-target="#modal-grade" type="button">+&nbsp; New Grade</a>
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
                                                    Class</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($grades as $grade)
                                                <tr>
                                                    <td class="text-center">{{ $grade->name }}</td>
                                                    <td class="text-center">
                                                        @foreach ($grade->classe as $classe)
                                                            {{ $classe->name }}
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit user"
                                                            onclick="openEditGradeModal({{ $grade->id }})">
                                                            <i class="fas fa-user-edit text-secondary"></i>
                                                        </a>
                                                        <span onclick="deleteGrade({{ $grade->id }})">
                                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                        </span>
                                                        <form id="delete-grade-form-{{ $grade->id }}"
                                                            action="{{ route('grades.destroy', $grade->id) }}"
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
                <br>
                <script>
                    function deleteGrade(id) {
                        if (confirm('Are you sure you want to delete this grade?')) {
                            document.getElementById('delete-grade-form-' + id).submit();
                        }
                    }

                    function openAddGradeModal() {
                        $('#gradeModalLabel').text('Add Grade');
                        $('#gradeForm').attr('action', '{{ route('grades.store') }}');
                        $('#gradeForm').trigger("reset");
                        $('#gradeId').val('');
                        $('#gradeForm').find('input[name="_method"]').remove();
                        $('#modal-grade').modal('show');
                    }

                    function openEditGradeModal(id) {
                        console.log('Opening edit modal for grade ID:', id);
                        $.ajax({
                            url: '/grades/' + id,
                            method: 'GET',
                            success: function(data) {
                                console.log('Data fetched successfully:', data);
                                $('#gradeModalLabel').text('Edit Grade');
                                $('#gradeForm').attr('action', '/grades/' + id);
                                $('#gradeForm').append('<input type="hidden" name="_method" value="PUT">');
                                $('#gradeId').val(data.id);
                                $('#name').val(data.name);
                                $('#classe_id').val(data.classe_id);
                                $('#modal-grade').modal('show');
                            },
                            error: function(xhr) {
                                console.error('Error fetching data:', xhr.responseText);
                                alert('Failed to fetch grade details. Please try again.');
                            }
                        });
                    }

                    // Initialize the select2 plugin if used for multi-select
                    $(document).ready(function() {
                        $('#classe_id').select2();
                    });
                </script>
            @endsection
