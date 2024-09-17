@extends('layouts.app')

@section('title', $gallery->name)

@section('content')
    <h1>{{ $gallery->name }}</h1>
    <p>{{ $gallery->gallery_description }}</p>
    
    <a href="{{ route('galleries.add-photos', $gallery->id) }}" class="btn btn-primary">Add Photos</a>

    <div class="row mt-4">
        @foreach($photos as $photo)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="card-img-top" alt="Photo">
                    <div class="card-body">
                        <form action="{{ route('photos.delete', $photo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $photos->links() }} <!-- Pagination links -->
@endsection
