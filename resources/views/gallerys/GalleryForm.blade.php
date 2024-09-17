<x-layout>
    <div class="container">
        <h1>Upload New Image</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="/gallery" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name"
                    class="inline-block text-lg mb-2">Gallery Name</label
                >
                <input type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name" value="{{old('name')}}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <label for="" class="inline-block text-lg mb-2">gallery_description</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="gallery_description"
                    placeholder="Example: Nature" 
                    value="{{old('gallery_description')}}"/>
                    @error('gallery_description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <label for="gallery_comments"
                    class="inline-block text-lg mb-2">gallery_comments</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="gallery_comments"
                    placeholder="Example: 👌😍 lovery"
                    value="{{old('gallery_comments')}}"/>
                    @error('gallery_comments')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    thumbnail
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="thumbnail"/>
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <button class="bg-#923B26 text-white rounded py-2 px-4 hover:bg-black">
                    Create Gallery
                </button>
        
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>