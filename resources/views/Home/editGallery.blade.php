<x-layout>
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="/gallery/{{$gallery->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name"
                    class="inline-block text-lg mb-2">Edit Gallery Name</label
                >
                <input type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name" value="{{$gallery->name}}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <label for="" class="inline-block text-lg mb-2"> Edit gallery_description</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="gallery_description"
                    placeholder="Example: Nature" 
                    value="{{$gallery->gallery_description}}"/>
                    @error('gallery_description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <label for="gallery_comments"
                    class="inline-block text-lg mb-2">Edit gallery_comments</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="gallery_comments"
                    placeholder="Example: 👌😍 lovely"
                    value="{{$gallery->gallery_comments}}"/>
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

                    <img src="{{$gallery->thumbnail ? asset('storage/'.$gallery->thumbnail) : asset('images/person_1.jpg')}}"
                    alt="Image" class="img-fluid">

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
        
            <div class="mb-6">
                <button class="bg-teal text-white rounded py-2 px-4 hover:bg-black">
                    Edit Gallery
                </button>
        
                <a href="/" class="text-white ml-4 hover:bg-teal"> Back </a>
            </div>
        </form>
    </div>
</x-layout>