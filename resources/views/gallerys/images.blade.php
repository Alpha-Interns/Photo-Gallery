<h2>Image Details</h2>

@if ($image)
    <div>
        <h3>Image Path: {{ $image->path }}</h3>
        {{-- <img src="{{ asset('storage/' . $image->path) }}" alt="Image" width="500"> --}}
    </div>
@else
    <p>No image found</p>
@endif