@extends('layouts.admin')

@section('content')
    <div class="container edit-form">

        <h1 class="display-2 mt-5 mb-3 _create-title fw-bolder text-warning">
            Add a new project
        </h1>

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('partials.validation-messages')

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp"
                    placeholder="ex.laravel-post-office" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="description">Description</label>
                <textarea type="text" class="form-control" rows="4" name="description" id="description"
                    aria-describedby="DescriptionHelp"
                    placeholder="ex. The project collects the entire source code for the creation of a web app of a real post office...">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="type_id">Project Type</label>
                <select class="form-select form-select" name="type_id" id="type_id">
                    <option selected>Select a type</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                </select>
            </div>

            <label class="form-label text-light fw-light" for="technology">Project Type</label>
            <div class="mb-3 d-flex border border-light rounded gap-1 py-2">

                @foreach ($technologies as $technology)
                
                <div class="form-check ">
                    
                    <input name="technologies[]" type="checkbox" class="btn-check" id="tag-{{$technology->id}}" value="{{$technology->id}}" autocomplete="off" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="btn text-light" for="tag-{{$technology->id}}">{{$technology->name}}</label>
                    
                </div>
                
                @endforeach
            </div>


            <div class="mb-3">
                <label class="form-label text-light fw-light" for="project_start_date">Project Start Date</label>
                <input type="text" class="form-control" name="project_start_date" id="project_start_date"
                    aria-describedby="project_start_dateHelp" placeholder="Type here the Project Start Date"
                    value="{{ old('project_start_date') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="project_end_date">Project End Date</label>
                <input type="text" class="form-control" name="project_end_date" id="project_end_date"
                    aria-describedby="project_end_dateHelp" placeholder="Type here the Project End Date"
                    value="{{ old('project_end_date') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="link_to_source_code">Link to the Source Code</label>
                <input type="text" class="form-control" name="link_to_source_code" id="link_to_source_code"
                    aria-describedby="link_to_source_codeHelp" placeholder="Type here the project Link to the Source Code"
                    value="{{ old('link_to_source_code') }}">
            </div>

            <div class="mb-3">
                <label class="form-label text-light fw-light" for="link_to_project_view">Link to the Project
                    View</label>
                <input type="text" class="form-control" name="link_to_project_view" id="link_to_project_view"
                    aria-describedby="link_to_project_viewHelp" placeholder="Type here the Link to the Project View"
                    value="{{ old('link_to_project_view') }}">
            </div>

            <div class="mb-3">
                <label for="preview_image" class="form-label text-light fw-light">Choose an image</label>
                <input type="file" class="form-control" name="preview_image" id="preview_image" placeholder=""
                    aria-describedby="fileHelpId" />
            </div>


            <div class="mx-auto d-flex justify-content-between text-end mt-3">
                <button type="submit"
                    class="btn btn-warning rounded-3 fw-light text-secondary btn-sm fs-2 px-3 py-1">Submit</button>

                <a class="btn btn-secondary rounded-3 fw-light text-light btn-sm fs-2 px-3 py-1"
                    href="{{ route('admin.projects.index') }}" role="button">
                    Go back
                </a>
            </div>

        </form>

    </div>
@endsection
