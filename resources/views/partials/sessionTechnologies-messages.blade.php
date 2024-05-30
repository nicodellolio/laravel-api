@if (session('message'))

<div class="alert alert-success alert-dismissible d-flex justify-content-center text-center fade show position-fixed w-75" role="alert" style="margin: 0% 25%; max-width: 1000px; z-index:99">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session('message') }}
</div>

@endif