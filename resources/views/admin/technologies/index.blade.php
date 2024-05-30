@extends('layouts.admin')

@section('content')
    @include('partials.sessionTechnologies-messages')

    <div class="container container-technologies_crud d-flex gap-5 mx-auto mt-5">
        <div class="row crud-left-side border border-warning rounded-5 p-3 w-50">

            <h1 class="display-2 mt-5 _create-title fw-bolder text-warning">
                Add a new technology
            </h1>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                @include('partials.validation-messages')

                <div class="mb-3">
                    <label class="form-label text-light fw-light" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp"
                        placeholder="ex.html, css, php..." value="{{ old('name') }}">
                </div>

                <button type="submit"
                    class="btn btn-warning rounded-3 fw-light text-secondary btn-sm fs-2 px-3 py-1">Submit
                </button>

            </form>

        </div>


        <div class="row row-cols-1 crud-right-side border border-warning rounded-2 w-50 py-2 overflow-scroll" style="max-height: 500px">
            @forelse ($technologies as $technology)

            <div class="col gy-2 gx-2 px-3  rounded rounded -5">
                <div class="card text-light p-bg-lighter ps-2 d-flex flex-row justify-content-between">
                    <div class="title">

                        <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                            @csrf
                            @method('PUT')

                            <h4 class="card-title">
                                <input type="text" class="form-control bg-transparent border-0 text-light fs-4" name="name" id="name" aria-describedby="nameHelp"
                                placeholder="ex.HTML, CSS, PHP..." value="{{$technology->name}}">
                            </h4>

                            <small class="card-subtitle ms-3">
                                {{$technology->slug}}
                            </small>

                        </form>
                        
                    </div>
                    <div class="card-body text-end align-items-center pt-4">
                        Used on {{$technology->projects->count()}} projects
                    </div>
                    <div class="delete align-self-center me-2">
                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="post">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-light border px-1 px-2" data-bs-toggle="modal"
                            data-bs-target="#modalId-{{ $technology->id }}">
                            <i class="fas fa-trash text-danger fs-6"></i>

                        </form>
                    </button>
                    </div>

                </div>
            </div>
                
            @empty
                
            <div class="col">
                <div class="card">
                    <h1 class="card-title">
                        Nothing to show, sorry
                    </h1>
                </div>
            </div>

            @endforelse
        </div>
    </div>
@endsection
