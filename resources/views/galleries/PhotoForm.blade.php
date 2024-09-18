
<x-layout>
    <h1>Upload Images to {{ $gallery->name }}</h1>
    <form action="/gallery/{{ $gallery->id }}/images" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>

        @error('images.*')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <textarea name="photo_description" placeholder="Photo Description">{{old('photo_description')}}</textarea>
        @error('photo_description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <textarea name="photo_comment" placeholder="Photo Comment">{{old('photo_comment')}}</textarea>
        @error('photo_comment')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        
        <button type="submit">Upload</button>
    </form>
</x-layout>
