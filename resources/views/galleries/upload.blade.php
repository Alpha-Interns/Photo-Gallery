<h1>Upload Image</h1>
<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>
