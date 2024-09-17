@extends('layouts.app')

@section('title', 'Create Gallery')

@section('content')
    <h1>Create Gallery</h1>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Gallery Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="gallery_description">Description</label>
            <textarea class="form-control" id="gallery_description" name="gallery_description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Gallery</button>
    </form>
@endsection
