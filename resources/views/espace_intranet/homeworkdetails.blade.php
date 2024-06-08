@extends('espace_intranet.layouts.app')

@section('intranet_content')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-20 font-size-20">Homework Details</h1>
                        <div class="card mb-4 mx-4">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">{{ $homework->title }}</h5>
                                    </div>
                                    @if (auth()->user()->role == 'parent')
                                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;
                                            Submit Homework</a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col md-6">
                                        <p>Description: {{ $homework->description }}</p>
                                        <p>Deadline: {{ $homework->deadline }}</p>
                                        <p>Classes:</p>
                                        <ul>
                                            @foreach ($homework->classes as $classe)
                                                <li>{{ $classe->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col md-6">
                                        @if ($homework->pdf)
                                            <p>PDF: <a href="{{ asset('storage/' . $homework->pdf) }}" download>Download
                                                    PDF</a>
                                            </p>
                                        @endif
                                        @if ($homework->image)
                                            <p>Image: <a href="{{ asset('storage/' . $homework->image) }}" download>Download
                                                    Image</a></p>
                                        @endif
                                        @if ($homework->video)
                                            <p>Video: <a href="{{ asset('storage/' . $homework->video) }}" download>Download
                                                    Video</a></p>
                                        @endif

                                    </div>
                                </div>
                                <a href="{{ route('homework.index') }}"
                                    class="btn bg-gradient-light mb-0 js-btn-prev">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
