
<x-layout>
    <h1>Upload Images to {{ $gallery->name }}</h1>
    <form action="/gallery/{{ $gallery->id }}/images" method="POST" enctype="multipart/form-data">
        @csrf

        @method("PUT")
        <input type="file" name="images[]" multiple >

        @error('images.*')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <textarea name="photo_description" placeholder="Photo Description">{{$photo->photo_description}}</textarea>
        @error('photo_description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <textarea name="photo_comment" placeholder="Photo Comment"> {{$photo->photo_comment}}</textarea>
        @error('photo_comment')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        
        <button type="submit">Upload</button>
    </form>
</x-layout>