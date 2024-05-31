@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="modal-homework" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="homeworkModalLabel">Add New Homework</h3>
                        </div>
                        <input type="hidden" id="homeworkId" name="id">
                        <form id="homeworkForm" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title" id="title">
                                                <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                                <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="deadline">Deadline</label>
                                                <input type="date" class="form-control" name="deadline" id="deadline">
                                                <span class="text-danger">@error('deadline'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="classe_id">Classes</label>
                                                <select class="form-control" id="classe_id" name="classes[]" multiple>
                                                    @foreach($classes as $classe)
                                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('classes'){{ $message }}@enderror</span>
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

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">Homework</h1>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4 mx-4">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">All Homework</h5>
                                                </div>
                                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-homework" type="button" onclick="openAddModal()">+&nbsp; New Homework</a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Classes</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($homework as $Homework)
                                                        <tr>
                                                            <td class="text-center">{{ $Homework->title }}</td>
                                                            <td class="text-center">{{ $Homework->description }}</td>
                                                            <td class="text-center">{{ $Homework->deadline }}</td>
                                                            <td class="text-center">
                                                                @foreach ($Homework->classes as $Classe)
                                                                    {{ $Classe->name }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit homework" onclick="openEditModal({{ $Homework->id }})">
                                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                                </a>
                                                                <span onclick="deleteHomework({{ $Homework->id }})">
                                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                                </span>
                                                                <form id="delete-homework-form-{{ $Homework->id }}" action="{{ route('homework.destroy', $Homework->id) }}" method="POST" style="display: none;">
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

        function deleteHomework(id) {
            if (confirm('Are you sure you want to delete this homework?')) {
                document.getElementById('delete-homework-form-' + id).submit();
            }
        }

        function openAddModal() {
            $('#homeworkModalLabel').text('Add Homework');
            $('#homeworkForm').attr('action', '{{ route('homework.store') }}');
            $('#homeworkForm').trigger("reset");
            $('#homeworkId').val('');
            $('#homeworkForm').find('input[name="_method"]').remove();
            $('#classe_id').val([]).trigger('change'); // Clear the classes selection
            $('#modal-homework').modal('show');
        }

        function openEditModal(id) {
            console.log('Opening edit modal for homework ID:', id);
            $.ajax({
                url: '/homework/' + id,
                method: 'GET',
                success: function(data) {
                    console.log('Data fetched successfully:', data);
                    $('#homeworkModalLabel').text('Edit Homework');
                    $('#homeworkForm').attr('action', '/homework/' + id);
                    $('#homeworkForm').append('<input type="hidden" name="_method" value="PUT">');
                    $('#homeworkId').val(data.id);
                    $('#title').val(data.title);
                    $('#description').val(data.description);
                    $('#deadline').val(data.deadline);

                    var selectedClasses = data.classes.map(function(classe) {
                        return classe.id;
                    });
                    $('#classe_id').val(selectedClasses).trigger('change');

                    $('#modal-homework').modal('show');
                },
                error: function(xhr) {
                    console.error('Error fetching data:', xhr.responseText);
                    alert('Failed to fetch homework details. Please try again.');
                }
            });
        }

        $(document).ready(function() {
            $('#classe_id').select2();
        });
    </script>
@endsection
