@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <!-- Modal -->
    <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient" id="infoModalLabel">Add New Information
                            </h3>
                        </div>
                        <form id="infoForm" method="POST" action="{{ route('information.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" name="author" id="author">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg mt-4 mb-0">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal  --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">Information</h1>
                        <div class="d-flex flex-row justify-content-between mb-5">
                            <div>
                                <!-- Empty div for future use -->
                            </div>
                            @if (auth()->user()->role == 'admin')
                                <a href="#" class="btn bg-gradient-info btn-sm mb-0" data-bs-toggle="modal"
                                    data-bs-target="#modal-info" style="font-size: 15px; padding: 10px ;" type="button">
                                    +&nbsp; Add Information
                                </a>
                            @endif
                        </div>
                        <div class="row mb-3">
                            @foreach ($informations as $information)
                                <div class="card bg-gradient-default" style="margin-bottom: 20px;">
                                    <div class="card-body">
                                        <h3 class="card-title text-info text-gradient">{{ $information->title }}</h3>
                                        <blockquote class="blockquote text-white mb-0">
                                            <p class="text-dark ms-3">{{ $information->content }}</p>
                                            <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                                                {{ $information->author }}</footer>
                                        </blockquote>
                                    </div>
                                    </instance_end>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            </section>
        </div>
    </div>
@endsection
