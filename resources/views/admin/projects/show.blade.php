@extends('layouts.admin')

@section('content')
    <div class="container my-5">

        <div class="row">

            <div class="col">
                <div class="card p-1">
                    <div class="title_box d-flex bg-gradient justify-content-between bg-secondary p-3">
                        <h3 class="card-title text-light fw-bolder pt-2">
                            {{ $project->title }}
                        </h3>
                        <div class="right-side d-flex gap-4 align-items-center">

                            <a class="text-decoration-none text-dark btn btn-light border fs-6 py-1 align-items-center"
                                href="{{ route('admin.projects.edit', $project) }}">
                                <span class="btn btn-light">Edit your project</span>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-light text-decoration-none text-secondary py-2"
                                href="{{ route('admin.projects.index') }}">
                                <i class="fa-solid fa-circle-left"></i>
                                Back to the projects
                            </a>

                        </div>
                    </div>



                    <div class="card-body text-secondary">
                        <h5 class="d-inline-block">Description:</h5>
                        <p class="card-text">
                            {{ $project->description }}
                        </p>
                        <hr>
                        <div class="type">
                            <h5 class="d-inline-block">Type:</h5>
                            {{ $project->type->name }}
                        </div>

                        <div class="technology">

                            <h5 class="d-inline-block">Technology:</h5>

                            <div class="ms-2 technologies d-inline-block">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge p-bg-light">{{ $technology->name }}</span>

                                @empty

                                    <span class="badge p-bg-light">n/a</span>
                                @endforelse
                            </div>
                        </div>

                        <hr>

                        <div class="project-duration">
                            <h5 class="d-inline-block">Project Duration: </h5>
                            {{ $project->project_duration }}
                        </div>
                    </div>

                    <div class="card-footer d-flex bg-dark text-light d-flex justify-content-evenly">
                        <a class="btn rounded text-decoration-none text-light p-bg-light px-3 py-1 fs-5"
                            href="{{ $project->link_to_project_view }}">
                            Preview
                        </a>
                        <a class="btn rounded text-decoration-none text-light p-bg-light px-3 -py1 fs-5"
                            href="{{ $project->link_to_source_code }}">
                            View Source Code
                        </a>
                    </div>


                    <div class="img_box">
                        <img class="card-img-bottom" src="{{ asset('storage/' . $project->preview_image) }}" alt="">
                        <span class="position-absolute bottom-0 start-0 text-dark bg-info rounded px-3 py-1 m-2">
                            Website preview
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
