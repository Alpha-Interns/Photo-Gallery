@extends('layouts.app')

@section('title', 'Add Photos to ' . $gallery->name)

@section('content')
    <h1>Add Photos to {{ $gallery->name }}</h1>

    <form action="{{ route('galleries.store-photos', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Photo Description -->
        <div class="form-group">
            <label for="photo_description">Photo Description</label>
            <input type="text" name="photo_description" id="photo_description" class="form-control" value="{{ old('photo_description') }}" placeholder="Enter photo description">
        </div>

        <!-- Photo Comment -->
        <div class="form-group">
            <label for="photo_comment">Photo Comment</label>
            <textarea name="photo_comment" id="photo_comment" class="form-control" placeholder="Enter a comment">{{ old('photo_comment') }}</textarea>
        </div>

        <!-- File Upload -->
        <div class="form-group">
            <label for="photo_path">Upload Photo</label>
            <input type="file" name="photo_path" id="photo_path" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Upload Photo</button>
    </form>
@endsection
