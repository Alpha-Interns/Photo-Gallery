
<x-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Upload Images to {{ $gallery->name }}</h1>
        
        <form action="/gallery/{{ $gallery->id }}/images" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- File Input -->
            <div>
                <label for="images" class="block text-lg font-medium mb-2">Select Images:</label>
                <input 
                    type="file" 
                    name="images[]" 
                    multiple 
                    class="block w-full border border-gray-300 rounded-lg p-2 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-blue-600 hover:file:bg-gray-200" 
                    required 
                />
                @error('images.*')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>

            <!-- Photo Description -->
            <div>
                <label for="photo_description" class="block text-lg font-medium mb-3">Photo Description:</label>
                <textarea 
                    name="photo_description" 
                    rows="2" 
                    placeholder="Add a description for the photo" 
                    class="w-full border border-gray-300 rounded-lg p-2 text-sm" required
                >{{ old('photo_description') }}</textarea>
                @error('photo_description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>

            <!-- Photo Comment -->
            <div>
                <label for="photo_comment" class="block text-lg font-medium mb-2">Photo Comment:</label>
                <textarea 
                    name="photo_comment" 
                    rows="3" 
                    placeholder="Add a comment for the photo" 
                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                >{{ old('photo_comment') }}</textarea>
                @error('photo_comment')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>

            <!-- Submit Button -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-blue-600 text-black font-bold py-2 px-6 rounded-lg hover:bg-blue-700"
                >
                    Upload
                </button>
            </div>
        </form>
    </div>
</x-layout>
