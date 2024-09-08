@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Image</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Image Title</label>
                <input type="text" name="title" class="form-control" value="{{ $image->title }}" required>
            </div>

            <div class="form-group">
                <label for="image">Change Image (optional)</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update Image</button>
        </form>
    </div>
@endsection
