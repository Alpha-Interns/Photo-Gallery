<x-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Create New Gallery</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="/gallery" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Gallery Name -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium mb-3">Gallery Name:</label>
                <input 
                    type="text" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm" 
                    placeholder="e.g., Nature" 
                    name="name" 
                    value="{{old('name')}}" 
                    required />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            
            
            <!-- Gallery Description -->
            <div class="mb-6">
                <label for="gallery_description" class="block text-lg font-medium mb-3">Gallery Description:</label>
                <input 
                    type="text"
                    class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm" 
                    name="gallery_description"
                    placeholder="e.g., Nature photos"
                    value="{{old('gallery_description')}}" 
                    required />
                @error('gallery_description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            
            <!-- Gallery Comments -->
            <div class="mb-6">
                <label for="gallery_comments" class="block text-lg font-medium mb-3">Gallery Comments:</label>
                <input 
                    type="text" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm" 
                    name="gallery_comments" 
                    placeholder="e.g., 👌😍 lovely" 
                    value="{{ old('gallery_comments') }}" />
                @error('gallery_comments')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <!-- Thumbnail -->
            <div class="mb-6">
                <label for="thumbnail" class="block text-lg font-medium mb-3">Thumbnail:</label>
                <input 
                    type="file" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm" 
                    name="thumbnail" 
                    required />
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <!-- Create and Back Button -->
            <div class="flex justify-between items-center">
                <button class="bg-blue-600 text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Create Gallery
                </button>
                <a href="/" class="text-blue-600 hover:underline">Back</a>
            </div>
        </form>
    </div>
</x-layout>
