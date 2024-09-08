@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload New Image</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Image Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>
@endsection
