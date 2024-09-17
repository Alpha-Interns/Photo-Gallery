@extends('layouts.app')

@section('title', 'Galleries')

@section('content')
    <h1>Galleries</h1>
    {{-- <a href="{{ route('galleries.create') }}" class="btn btn-primary">Create New Gallery</a> --}}

    <div class="row">
        @foreach($galleries as $gallery)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $gallery->thumbnail) }}" class="card-img-top" alt="{{ $gallery->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->name }}</h5>
                        <p class="card-text">{{ $gallery->gallery_description }}</p>
                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-primary">View Gallery</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
